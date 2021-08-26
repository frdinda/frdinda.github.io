<?php

namespace App\Controllers\IzinMagang;

use App\Controllers\BaseController;
use App\Models\UserMagangModel;
use App\Models\MagangModel;

use function PHPUnit\Framework\isNull;

class IzinMagang extends BaseController
{
    protected $usermagangModel;
    protected $magangModel;
    public function __construct()
    {
        // parent::__construct();
        $this->usermagangModel = new UserMagangModel();
        $this->magangModel = new MagangModel();
        // $this->load->library('email');
    }
    public function index()
    {
        $status = $this->session->status;
        if (isset($status)) {
            return redirect()->to('/brdmg');
        } else {
            return view('izin_magang/login');
        }
    }

    public function login()
    {
        $email = $this->request->getVar('email');
        // nanti ganti passwordnya jadi md5
        $password = md5($this->request->getVar('password'));
        $user = $this->usermagangModel->get_detail_user($email);
        // dd($user);

        if ($user['password'] == $password && $user['auth'] != 0) {
            $this->session->set('jenis_akses', $user['jenis_akses']);
            $this->session->set('email', $user['email']);
            $this->session->set('nama', $user['nama']);
            $this->session->set('instansi', $user['instansi_asal']);
            $this->session->set('status', 'login_magang');
            return redirect()->to('/brdmg');
        } else if (empty($user['email']) || $user['password'] != $password) {
            echo "<script>
            alert('Email Atau Password Salah, Silahkan Login Kembali');
            window.location.href='/magang';
            </script>";
        } else if ($user['auth'] == 0) {
            echo "<script>
            alert('Harap Lakukan Verifikasi Melalui Email yang Telah Dikirim');
            window.location.href='/magang';
            </script>";
        }
    }

    public function form_registrasi()
    {
        return view('izin_magang/registrasi');
    }

    public function registrasi()
    {
        $email = $this->request->getVar('email');
        $user = $this->usermagangModel->get_detail_user($email);

        if (isset($user['email'])) {
            echo "<script>
            alert('Email Sudah Terdaftar, Silahkan Login');
            window.location.href='/magang';
            </script>";
        } else {
            $nama = $this->request->getVar('nama');
            $authcode = md5(time() . $email);
            $this->usermagangModel->insert([
                'email' => $email,
                'nama' => $nama,
                'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                'alamat_tinggal' => $this->request->getVar('alamat'),
                'instansi_asal' => $this->request->getVar('instansi'),
                'nomor_telepon' => strval($this->request->getVar('no_telp')),
                'password' => md5($this->request->getVar('password')),
                'jenis_akses' => "user",
                'auth' => 0,
                'auth_code' => $authcode
            ]);
            $message = "Selamat Anda telah berhasil melakukan registrasi pada Aplikasi Permohonan Izin Magang Kantor Wilayah Kementerian Hukum dan HAM Sumatera Utara. Silahkan klik link di bawah ini untuk menyelesaikan proses verifikasi.";
            $path = base_url('/33b3/' . $authcode);
            $data = [
                'email' => $email,
                'nama' => $nama,
                'authcode' => $authcode,
                'message' => $message,
                'path' => $path
            ];
            $this->_sendEmail($data);
            // email verifikasi sudah dikirim ke email anda, silahkan lanjutkan verifikasi melalui link pada email tersebut
            // return redirect()->to('/brdmg');
        }
    }

    private function _sendEmail($data)
    {
        $to = $data['email'];
        $subject = 'Verifikasi Akun Permohonan Izin Magang';
        // bagia a-nya masih menyebalkan yaa
        $message = 'Hai, ' . $data['nama'] . '. ' . $data['message'] . ' <br><br> <a href="' . $data['path'] . '" >VERIFIKASI</a>';
        // $message = "LOL";
        $email = \Config\Services::email();
        $email->setSubject($subject);
        $email->setTo($to);
        $email->setMessage($message);
        if ($email->send()) {
            // ganti
            echo $email->printDebugger();
        } else {
            // pas production, matikan atau ganti echo lain
            echo $email->printDebugger();
        }
    }

    public function verify_registrasi($authcode)
    {
        $user = $this->usermagangModel->get_detail_user_by_authcode($authcode);
        if (isset($user)) {
            $this->usermagangModel->save([
                'email' => $user['email'],
                'auth' => 1
            ]);
            $this->session->set('jenis_akses', $user['jenis_akses']);
            $this->session->set('email', $user['email']);
            $this->session->set('nama', $user['nama']);
            $this->session->set('instansi', $user['instansi_asal']);
            $this->session->set('status', 'login_magang');
            return redirect()->to('/brdmg');
        } else {
            echo "<script>
            alert('Mohon Maaf, Terjadi Kesalahan');
            window.location.href='/magang';
            </script>";
        }
    }

    public function beranda_magang()
    {
        $status = $this->session->status;
        if ($status != 'login_magang') {
            echo "<script>
            alert('Harap Login');
            window.location.href='/magang';
            </script>";
        } else {
            $jenis_akses = $this->session->jenis_akses;
            $email = $this->session->email;
            if ($jenis_akses == 'admin') {
                $all_magang = $this->magangModel->get_magang();
            } else {
                $all_magang = $this->magangModel->get_magang_spesifik($email);
            }

            $jumlah_ny = 0;
            $jumlah_wl = 0;
            $jumlah_rs = 0;
            $jumlah_ok = 0;
            $jumlah_mg = 0;
            $jumlah_pn = 0;
            $jumlah_total = 0;

            foreach ($all_magang as $m) :
                if ($m['status_permohonan'] == 'v-ny') {
                    $jumlah_ny = $jumlah_ny + 1;
                } else if ($m['status_permohonan'] == 'v-wl') {
                    $jumlah_wl = $jumlah_wl + 1;
                } else if ($m['status_permohonan'] == 'v-rs') {
                    $jumlah_rs = $jumlah_rs + 1;
                } else if ($m['status_permohonan'] == 'v-ok') {
                    $jumlah_ok = $jumlah_ok + 1;
                } else if ($m['jenis_permohonan'] == 'magang') {
                    $jumlah_mg = $jumlah_mg + 1;
                } else if ($m['jenis_permohonan'] == 'penelitian') {
                    $jumlah_pn = $jumlah_pn + 1;
                }
                $jumlah_total = $jumlah_total + 1;
            endforeach;

            $data = [
                'email' => $email,
                'nama' => $this->session->nama,
                'jenis_akses' => $jenis_akses,
                'jumlah_ny' => $jumlah_ny,
                'jumlah_wl' => $jumlah_wl,
                'jumlah_rs' => $jumlah_rs,
                'jumlah_ok' => $jumlah_ok,
                'jumlah_mg' => $jumlah_mg,
                'jumlah_pn' => $jumlah_pn,
                'jumlah_total' => $jumlah_total
            ];

            return view('izin_magang/beranda', $data);
        }
    }

    public function semua_magang()
    {
        $status = $this->session->status;
        if ($status != 'login_magang') {
            echo "<script>
            alert('Harap Login');
            window.location.href='/magang';
            </script>";
        } else {
            $jenis_akses = $this->session->jenis_akses;
            $email = $this->session->email;
            if ($jenis_akses == 'admin') {
                $all_magang = $this->magangModel->get_magang();
            } else {
                $all_magang = $this->magangModel->get_magang_spesifik($email);
            }

            $data = [
                'email' => $email,
                'nama' => $this->session->nama,
                'jenis_akses' => $jenis_akses,
                'all_magang' => $all_magang
            ];

            return view('izin_magang/semua_magang', $data);
        }
    }

    // public function view_pdf($dokumen_persyaratan)
    // {
    //     $filepath = '../public/dokumen_persyaratan/' . $dokumen_persyaratan;
    //     header('Content-type: application/pdf');
    //     header('Content-Disposition: inline; filename="' . $dokumen_persyaratan . '"');
    //     header('Content-Transfer-Encoding: binary');
    //     header('Accept-Ranges: bytes');
    //     readfile($filepath);
    // }

    public function table_magang()
    {
        $status = $this->session->status;
        if ($status != 'login_magang') {
            echo "<script>
            alert('Harap Login');
            window.location.href='/magang';
            </script>";
        } else {
            $jenis_akses = $this->session->jenis_akses;
            $email = $this->session->email;
            if ($jenis_akses == 'admin') {
                $all_magang = $this->magangModel->get_magang();
            } else {
                $all_magang = $this->magangModel->get_magang_spesifik($email);
            }

            $data = [
                'email' => $email,
                'nama' => $this->session->nama,
                'jenis_akses' => $jenis_akses,
                'all_magang' => $all_magang
            ];

            return view('izin_magang/table_magang', $data);
        }
    }

    public function table_penelitian()
    {
        $status = $this->session->status;
        if ($status != 'login_magang') {
            echo "<script>
            alert('Harap Login');
            window.location.href='/magang';
            </script>";
        } else {
            $jenis_akses = $this->session->jenis_akses;
            $email = $this->session->email;
            if ($jenis_akses == 'admin') {
                $all_magang = $this->magangModel->get_magang();
            } else {
                $all_magang = $this->magangModel->get_magang_spesifik($email);
            }

            $data = [
                'email' => $email,
                'nama' => $this->session->nama,
                'jenis_akses' => $jenis_akses,
                'all_magang' => $all_magang
            ];

            return view('izin_magang/table_penelitian', $data);
        }
    }

    public function form_ajukan_magang()
    {
        $status = $this->session->status;
        // session();
        if ($status != 'login_magang') {
            echo "<script>
            alert('Harap Login');
            window.location.href='/magang';
            </script>";
        } else {

            $data = [
                'email' => $this->session->email,
                'nama' => $this->session->nama,
                'jenis_akses' => $this->session->jenis_akses,
                'instansi' => $this->session->instansi,
                'validation' => \Config\Services::validation()
            ];

            return view('izin_magang/ajukan_magang', $data);
        }
    }

    public function upload_file()
    {
        $jenis_permohonan = $this->request->getVar('select_izin');
        if (isset($jenis_permohonan)) {
            helper('text');
            $nama_arsip = date('dmY') . '-' . random_string('alnum', 7);
            $email = $this->request->getVar('email');
            $data = [
                'nama_arsip' => $nama_arsip,
                'email' => $email,
                'jenis_permohonan' => $jenis_permohonan
            ];
            $this->_uploadFile($data);
        } else {
            echo "<script>
            alert('Pilih Jenis Permohonan');
            window.location.href='/ajkmg';
            </script>";
        }
    }

    private function _uploadFile($data)
    {
        if (!$this->validate([
            'dokumen_permohonan' => [
                'label' => 'Dokumen Permohonan',
                'rules' => 'uploaded[dokumen_persyaratan]|max_size[dokumen_persyaratan,5000]|ext_in[dokumen_persyaratan,pdf]',
                'errors' => [
                    'uploaded' => '{field} Harap Mengupload Dokumen Persyaratan',
                    'max_size' => '{field} Ukuran melebihi 5MB',
                    'ext_in' => '{field} Format dokumen bukan PDF'
                ]
            ]
        ])) {
            echo "<script>
            alert('Dokumen Persyaratan harus dalam format PDF dan tidak melebihi 5MB');
            window.location.href='/ajkmg';
            </script>";
        } else {
            $nama_arsip = $data['nama_arsip'] . '.pdf';
            $dokumen_persyaratan = $this->request->getFile('dokumen_persyaratan');
            // dd($dokumen_persyaratan);
            $dokumen_persyaratan->move('dokumen_persyaratan', $nama_arsip);
            // dd($dokumen_persyaratan);
            $this->magangModel->insert([
                'email' => $data['email'],
                'tanggal_input' => date('Y-m-d'),
                'jenis_permohonan' => $data['jenis_permohonan'],
                'dokumen_permohonan' => $nama_arsip,
                'status_permohonan' => 'v-ny'
            ]);
            echo "<script>
            alert('Dokumen Berhasil di Upload');
            window.location.href='/allmg';
            </script>";
        }
    }

    public function form_proses_permohonan($code)
    {
        $status = $this->session->status;
        if ($status != 'login_magang') {
            echo "<script>
            alert('Harap Login');
            window.location.href='/magang';
            </script>";
        } else {
            $detail_magang_spesifik = $this->magangModel->get_detail_magang($code);
            // dd($detail_magang_spesifik);
            $data = [
                'email' => $this->session->email,
                'nama' => $this->session->nama,
                'jenis_akses' => $this->session->jenis_akses,
                'data_magang' => $detail_magang_spesifik
            ];

            return view('izin_magang/proses_magang', $data);
        }
    }

    public function proses_permohonan()
    {
        $status_permohonan = $this->request->getVar('status_permohonan');
        $dokumen_persyaratan = $this->request->getVar('dokumen_persyaratan');
        $detail_magang_spesifik = $this->magangModel->get_detail_magang($dokumen_persyaratan);
        // dd($detail_magang_spesifik);
        $id_mgpn = (int)$this->request->getVar('id_mgpn');
        if (isset($status_permohonan)) {
            if ($status_permohonan == 'v-ok') {
                if (!$this->validate([
                    'dokumen_balasan' => [
                        'label' => 'Dokumen Balasan',
                        'rules' => 'uploaded[dokumen_balasan]|max_size[dokumen_balasan,5000]|ext_in[dokumen_balasan,pdf]',
                        'errors' => [
                            'uploaded' => '{field} Harap Mengupload Dokumen Balasan',
                            'max_size' => '{field} Ukuran melebihi 5MB',
                            'ext_in' => '{field} Format dokumen bukan PDF'
                        ]
                    ]
                ])) {
                    echo "<script>
                alert('Dokumen Balasan harus diupload untuk menyetujui permohonan. Dokkumen harus dalam format PDF dan tidak melebihi 5MB');
                window.location.href='/vmg/" . $dokumen_persyaratan . "';
                </script>";
                } else {
                    helper('text');
                    $keterangan = $this->request->getVar('keterangan');
                    if (isset($keterangan)) {
                        $keterangan = $keterangan;
                    } else {
                        $keterangan = "Permohonan Anda Diterima";
                    }
                    $nama_arsip = date('dmY') . '-bls-' . random_string('alnum', 7);
                    $dokumen_balasan = $this->request->getFile('dokumen_balasan');
                    // dd($dokumen_balasan);
                    $dokumen_balasan->move('dokumen_balasan', $nama_arsip);
                    // dd($dokumen_balasan);
                    $data = [
                        'dokumen_permohonan' => $dokumen_persyaratan,
                        'tanggal_update' => date('Y-m-d'),
                        'dokumen_balasan' => $nama_arsip,
                        'keterangan_balasan' => $keterangan,
                        'status_permohonan' => $status_permohonan
                    ];
                    $this->magangModel->update_magang($id_mgpn, $data);
                    // email
                    $email = $this->request->getVar('email');
                    $nama = $this->request->getVar('nama');
                    $message = "Permohonan Anda Sudah Kami Setujui. Klik link untuk melihat dokumen.";
                    // $authcode = md5("login lihat verif");
                    $path = base_url('/magang');
                    $data_email = [
                        'email' => $email,
                        'nama' => $nama,
                        // 'authcode' => $authcode,
                        'message' => $message,
                        'path' => $path
                    ];
                    $this->_sendEmail($data_email);
                    echo "<script>
                    alert('Permohonan Berhasil Disetujui');
                    window.location.href='/allmg';
                    </script>";
                }
            } else if ($status_permohonan == 'v-wl' || $status_permohonan == 'v-rs') {
                $dokumen_persyaratan = $this->request->getVar('dokumen_persyaratan');
                $keterangan = $this->request->getVar('keterangan');
                if (isset($keterangan)) {
                    $keterangan = $keterangan;
                } else if ($status_permohonan == 'v-wl') {
                    $keterangan = "Permohonan Anda Sedang Diproses";
                } else if ($status_permohonan == 'v-rs') {
                    $keterangan = "Mohon Maaf, Permohonan Anda Ditolak";
                }
                $data = [
                    'tanggal_update' => date('Y-m-d'),
                    'keterangan_balasan' => $keterangan,
                    'status_permohonan' => $status_permohonan
                ];
                $this->magangModel->update_magang($id_mgpn, $data);
                if ($status_permohonan == 'v-rs') {
                    // email
                    $email = $this->request->getVar('email');
                    $nama = $this->request->getVar('nama');
                    $message = "Permohonan Anda Ditolak, silahkan mengajukan ulang melalui link berikut.";
                    // $authcode = md5("login lihat verif");
                    $path = base_url('/magang');
                    $data_email = [
                        'email' => $email,
                        'nama' => $nama,
                        // 'authcode' => $authcode,
                        'message' => $message,
                        'path' => $path
                    ];
                    $this->_sendEmail($data_email);
                }
                echo "<script>
                alert('Permohonan Berhasil Diupdate');
                window.location.href='/allmg';
                </script>";
            }
        } else {
            echo "<script>
            alert('Pilih Status Permohonan');
            window.location.href='/vmg/" . $dokumen_persyaratan . "';
            </script>";
        }
    }

    public function logout()
    {
        unset($_SESSION['nama']);
        unset($_SESSION['status']);
        unset($_SESSION['email']);
        unset($_SESSION['jenis_akses']);
        return redirect()->to('/');
    }
}
