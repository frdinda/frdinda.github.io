<?php

namespace App\Controllers\IzinPelantikan;

use App\Controllers\BaseController;
use App\Models\UserPelantikanModel;
use App\Models\PelantikanModel;

use function PHPUnit\Framework\isNull;

class IzinPelantikan extends BaseController
{
    protected $userpelantikanModel;
    protected $pelantikanModel;
    public function __construct()
    {
        // parent::__construct();
        $this->userpelantikanModel = new UserPelantikanModel();
        $this->pelantikanModel = new PelantikanModel();
    }

    public function index()
    {
        $status = $this->session->status;
        if (isset($status) && $status == "login_pelantikan") {
            return redirect()->to('/brdpln');
        } else {
            return view('izin_pelantikan/login');
        }
    }

    public function login()
    {
        $email = $this->request->getVar('email');
        // nanti ganti passwordnya jadi md5
        $password = md5($this->request->getVar('password'));
        $user = $this->userpelantikanModel->get_detail_user($email);
        // dd($user);

        if ($user['password'] == $password && $user['auth'] != 0) {
            $this->session->set('jenis_akses', $user['jenis_akses']);
            $this->session->set('email', $user['email']);
            $this->session->set('nama', $user['nama']);
            $this->session->set('status', 'login_pelantikan');
            return redirect()->to('/brdpln');
        } else if (empty($user['email']) || $user['password'] != $password) {
            echo "<script>
            alert('Email Atau Password Salah, Silahkan Login Kembali');
            window.location.href='/pelantikan';
            </script>";
        } else if ($user['auth'] == 0) {
            echo "<script>
            alert('Harap Lakukan Verifikasi Melalui Email yang Telah Dikirim');
            window.location.href='/pelantikan';
            </script>";
        }
    }

    public function form_registrasi()
    {
        return view('izin_pelantikan/registrasi');
    }

    public function registrasi()
    {
        $email = $this->request->getVar('email');
        $user = $this->userpelantikanModel->get_detail_user($email);

        if (isset($user['email'])) {
            echo "<script>
            alert('Email Sudah Terdaftar, Silahkan Login');
            window.location.href='/pelatikan';
            </script>";
        } else {
            $nama = $this->request->getVar('nama');
            $authcode = md5(time() . $email);
            $this->userpelantikanModel->insert([
                'email' => $email,
                'nama' => $nama,
                'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                'alamat_tinggal' => $this->request->getVar('alamat'),
                'nomor_telepon' => strval($this->request->getVar('no_telp')),
                'password' => md5($this->request->getVar('password')),
                'jenis_akses' => "user",
                'auth' => 0,
                'auth_code' => $authcode
            ]);
            $message = "Selamat Anda telah berhasil melakukan registrasi pada Aplikasi Permohonan Pelantikan Notaris, PPNS, dan Kewarganegaraan Kantor Wilayah Kementerian Hukum dan HAM Sumatera Utara. Silahkan klik link di bawah ini untuk menyelesaikan proses verifikasi.";
            $path = base_url('/8m4r/' . $authcode);
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
        $subject = 'Verifikasi Akun Permohonan Pelantikan';
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
        $user = $this->userpelantikanModel->get_detail_user_by_authcode($authcode);
        if (isset($user)) {
            $this->userpelantikanModel->save([
                'email' => $user['email'],
                'auth' => 1
            ]);
            $this->session->set('jenis_akses', $user['jenis_akses']);
            $this->session->set('email', $user['email']);
            $this->session->set('nama', $user['nama']);
            $this->session->set('status', 'login_pelantikan');
            return redirect()->to('/brdpln');
        } else {
            echo "<script>
            alert('Mohon Maaf, Terjadi Kesalahan');
            window.location.href='/pelantikan';
            </script>";
        }
    }

    public function beranda_pelantikan()
    {
        $status = $this->session->status;
        if ($status != 'login_pelantikan') {
            echo "<script>
            alert('Harap Login');
            window.location.href='/pelantikan';
            </script>";
        } else {
            $jenis_akses = $this->session->jenis_akses;
            $email = $this->session->email;
            if ($jenis_akses == 'admin') {
                $all_pelantikan = $this->pelantikanModel->get_pelantikan();
            } else {
                $all_pelantikan = $this->pelantikanModel->get_pelantikan_spesifik($email);
            }

            // dd($all_pelantikan);

            $jumlah_ny = 0;
            $jumlah_wl = 0;
            $jumlah_rs = 0;
            $jumlah_ok = 0;
            $jumlah_total_n = 0;
            $jumlah_total_np = 0;
            $jumlah_total_p = 0;
            $jumlah_total_k = 0;
            $jumlah_total = 0;
            $jumlah_ny_n = 0;
            $jumlah_wl_n = 0;
            $jumlah_rs_n = 0;
            $jumlah_ok_n = 0;
            $jumlah_ny_np = 0;
            $jumlah_wl_np = 0;
            $jumlah_rs_np = 0;
            $jumlah_ok_np = 0;
            $jumlah_ny_p = 0;
            $jumlah_wl_p = 0;
            $jumlah_rs_p = 0;
            $jumlah_ok_p = 0;
            $jumlah_ny_k = 0;
            $jumlah_wl_k = 0;
            $jumlah_rs_k = 0;
            $jumlah_ok_k = 0;

            foreach ($all_pelantikan as $m) :
                if ($m['status_permohonan'] == 'v-ny') {
                    $jumlah_ny = $jumlah_ny + 1;
                    if ($m['jenis_permohonan'] == 'notaris') {
                        $jumlah_total_n = $jumlah_total_n + 1;
                        if ($m['status_permohonan'] == 'v-ny') {
                            $jumlah_ny_n = $jumlah_ny_n + 1;
                        } else if ($m['status_permohonan'] == 'v-wl') {
                            $jumlah_wl_n = $jumlah_wl_n + 1;
                        } else if ($m['status_permohonan'] == 'v-rs') {
                            $jumlah_rs_n = $jumlah_rs_n + 1;
                        } else if ($m['status_permohonan'] == 'v-ok') {
                            $jumlah_ok_n = $jumlah_ok_n + 1;
                        }
                    } else if ($m['jenis_permohonan'] == 'notaris pengganti') {
                        $jumlah_total_np = $jumlah_total_np + 1;
                        if ($m['status_permohonan'] == 'v-ny') {
                            $jumlah_ny_np = $jumlah_ny_np + 1;
                        } else if ($m['status_permohonan'] == 'v-wl') {
                            $jumlah_wl_np = $jumlah_wl_np + 1;
                        } else if ($m['status_permohonan'] == 'v-rs') {
                            $jumlah_rs_np = $jumlah_rs_np + 1;
                        } else if ($m['status_permohonan'] == 'v-ok') {
                            $jumlah_ok_np = $jumlah_ok_np + 1;
                        }
                    } else if ($m['jenis_permohonan'] == 'ppns') {
                        $jumlah_total_p = $jumlah_total_p + 1;
                        if ($m['status_permohonan'] == 'v-ny') {
                            $jumlah_ny_p = $jumlah_ny_p + 1;
                        } else if ($m['status_permohonan'] == 'v-wl') {
                            $jumlah_wl_p = $jumlah_wl_p + 1;
                        } else if ($m['status_permohonan'] == 'v-rs') {
                            $jumlah_rs_p = $jumlah_rs_p + 1;
                        } else if ($m['status_permohonan'] == 'v-ok') {
                            $jumlah_ok_p = $jumlah_ok_p + 1;
                        }
                    } else if ($m['jenis_permohonan'] == 'kewarganegaraan') {
                        $jumlah_total_k = $jumlah_total_k + 1;
                        if ($m['status_permohonan'] == 'v-ny') {
                            $jumlah_ny_k = $jumlah_ny_k + 1;
                        } else if ($m['status_permohonan'] == 'v-wl') {
                            $jumlah_wl_k = $jumlah_wl_k + 1;
                        } else if ($m['status_permohonan'] == 'v-rs') {
                            $jumlah_rs_k = $jumlah_rs_k + 1;
                        } else if ($m['status_permohonan'] == 'v-ok') {
                            $jumlah_ok_k = $jumlah_ok_k + 1;
                        }
                    }
                } else if ($m['status_permohonan'] == 'v-wl') {
                    $jumlah_wl = $jumlah_wl + 1;
                    if ($m['jenis_permohonan'] == 'notaris') {
                        $jumlah_total_n = $jumlah_total_n + 1;
                        if ($m['status_permohonan'] == 'v-ny') {
                            $jumlah_ny_n = $jumlah_ny_n + 1;
                        } else if ($m['status_permohonan'] == 'v-wl') {
                            $jumlah_wl_n = $jumlah_wl_n + 1;
                        } else if ($m['status_permohonan'] == 'v-rs') {
                            $jumlah_rs_n = $jumlah_rs_n + 1;
                        } else if ($m['status_permohonan'] == 'v-ok') {
                            $jumlah_ok_n = $jumlah_ok_n + 1;
                        }
                    } else if ($m['jenis_permohonan'] == 'notaris pengganti') {
                        $jumlah_total_np = $jumlah_total_np + 1;
                        if ($m['status_permohonan'] == 'v-ny') {
                            $jumlah_ny_np = $jumlah_ny_np + 1;
                        } else if ($m['status_permohonan'] == 'v-wl') {
                            $jumlah_wl_np = $jumlah_wl_np + 1;
                        } else if ($m['status_permohonan'] == 'v-rs') {
                            $jumlah_rs_np = $jumlah_rs_np + 1;
                        } else if ($m['status_permohonan'] == 'v-ok') {
                            $jumlah_ok_np = $jumlah_ok_np + 1;
                        }
                    } else if ($m['jenis_permohonan'] == 'ppns') {
                        $jumlah_total_p = $jumlah_total_p + 1;
                        if ($m['status_permohonan'] == 'v-ny') {
                            $jumlah_ny_p = $jumlah_ny_p + 1;
                        } else if ($m['status_permohonan'] == 'v-wl') {
                            $jumlah_wl_p = $jumlah_wl_p + 1;
                        } else if ($m['status_permohonan'] == 'v-rs') {
                            $jumlah_rs_p = $jumlah_rs_p + 1;
                        } else if ($m['status_permohonan'] == 'v-ok') {
                            $jumlah_ok_p = $jumlah_ok_p + 1;
                        }
                    } else if ($m['jenis_permohonan'] == 'kewarganegaraan') {
                        $jumlah_total_k = $jumlah_total_k + 1;
                        if ($m['status_permohonan'] == 'v-ny') {
                            $jumlah_ny_k = $jumlah_ny_k + 1;
                        } else if ($m['status_permohonan'] == 'v-wl') {
                            $jumlah_wl_k = $jumlah_wl_k + 1;
                        } else if ($m['status_permohonan'] == 'v-rs') {
                            $jumlah_rs_k = $jumlah_rs_k + 1;
                        } else if ($m['status_permohonan'] == 'v-ok') {
                            $jumlah_ok_k = $jumlah_ok_k + 1;
                        }
                    }
                } else if ($m['status_permohonan'] == 'v-rs') {
                    $jumlah_rs = $jumlah_rs + 1;
                    if ($m['jenis_permohonan'] == 'notaris') {
                        $jumlah_total_n = $jumlah_total_n + 1;
                        if ($m['status_permohonan'] == 'v-ny') {
                            $jumlah_ny_n = $jumlah_ny_n + 1;
                        } else if ($m['status_permohonan'] == 'v-wl') {
                            $jumlah_wl_n = $jumlah_wl_n + 1;
                        } else if ($m['status_permohonan'] == 'v-rs') {
                            $jumlah_rs_n = $jumlah_rs_n + 1;
                        } else if ($m['status_permohonan'] == 'v-ok') {
                            $jumlah_ok_n = $jumlah_ok_n + 1;
                        }
                    } else if ($m['jenis_permohonan'] == 'notaris pengganti') {
                        $jumlah_total_np = $jumlah_total_np + 1;
                        if ($m['status_permohonan'] == 'v-ny') {
                            $jumlah_ny_np = $jumlah_ny_np + 1;
                        } else if ($m['status_permohonan'] == 'v-wl') {
                            $jumlah_wl_np = $jumlah_wl_np + 1;
                        } else if ($m['status_permohonan'] == 'v-rs') {
                            $jumlah_rs_np = $jumlah_rs_np + 1;
                        } else if ($m['status_permohonan'] == 'v-ok') {
                            $jumlah_ok_np = $jumlah_ok_np + 1;
                        }
                    } else if ($m['jenis_permohonan'] == 'ppns') {
                        $jumlah_total_p = $jumlah_total_p + 1;
                        if ($m['status_permohonan'] == 'v-ny') {
                            $jumlah_ny_p = $jumlah_ny_p + 1;
                        } else if ($m['status_permohonan'] == 'v-wl') {
                            $jumlah_wl_p = $jumlah_wl_p + 1;
                        } else if ($m['status_permohonan'] == 'v-rs') {
                            $jumlah_rs_p = $jumlah_rs_p + 1;
                        } else if ($m['status_permohonan'] == 'v-ok') {
                            $jumlah_ok_p = $jumlah_ok_p + 1;
                        }
                    } else if ($m['jenis_permohonan'] == 'kewarganegaraan') {
                        $jumlah_total_k = $jumlah_total_k + 1;
                        if ($m['status_permohonan'] == 'v-ny') {
                            $jumlah_ny_k = $jumlah_ny_k + 1;
                        } else if ($m['status_permohonan'] == 'v-wl') {
                            $jumlah_wl_k = $jumlah_wl_k + 1;
                        } else if ($m['status_permohonan'] == 'v-rs') {
                            $jumlah_rs_k = $jumlah_rs_k + 1;
                        } else if ($m['status_permohonan'] == 'v-ok') {
                            $jumlah_ok_k = $jumlah_ok_k + 1;
                        }
                    }
                } else if ($m['status_permohonan'] == 'v-ok') {
                    $jumlah_ok = $jumlah_ok + 1;
                    if ($m['jenis_permohonan'] == 'notaris') {
                        $jumlah_total_n = $jumlah_total_n + 1;
                        if ($m['status_permohonan'] == 'v-ny') {
                            $jumlah_ny_n = $jumlah_ny_n + 1;
                        } else if ($m['status_permohonan'] == 'v-wl') {
                            $jumlah_wl_n = $jumlah_wl_n + 1;
                        } else if ($m['status_permohonan'] == 'v-rs') {
                            $jumlah_rs_n = $jumlah_rs_n + 1;
                        } else if ($m['status_permohonan'] == 'v-ok') {
                            $jumlah_ok_n = $jumlah_ok_n + 1;
                        }
                    } else if ($m['jenis_permohonan'] == 'notaris pengganti') {
                        $jumlah_total_np = $jumlah_total_np + 1;
                        if ($m['status_permohonan'] == 'v-ny') {
                            $jumlah_ny_np = $jumlah_ny_np + 1;
                        } else if ($m['status_permohonan'] == 'v-wl') {
                            $jumlah_wl_np = $jumlah_wl_np + 1;
                        } else if ($m['status_permohonan'] == 'v-rs') {
                            $jumlah_rs_np = $jumlah_rs_np + 1;
                        } else if ($m['status_permohonan'] == 'v-ok') {
                            $jumlah_ok_np = $jumlah_ok_np + 1;
                        }
                    } else if ($m['jenis_permohonan'] == 'ppns') {
                        $jumlah_total_p = $jumlah_total_p + 1;
                        if ($m['status_permohonan'] == 'v-ny') {
                            $jumlah_ny_p = $jumlah_ny_p + 1;
                        } else if ($m['status_permohonan'] == 'v-wl') {
                            $jumlah_wl_p = $jumlah_wl_p + 1;
                        } else if ($m['status_permohonan'] == 'v-rs') {
                            $jumlah_rs_p = $jumlah_rs_p + 1;
                        } else if ($m['status_permohonan'] == 'v-ok') {
                            $jumlah_ok_p = $jumlah_ok_p + 1;
                        }
                    } else if ($m['jenis_permohonan'] == 'kewarganegaraan') {
                        $jumlah_total_k = $jumlah_total_k + 1;
                        if ($m['status_permohonan'] == 'v-ny') {
                            $jumlah_ny_k = $jumlah_ny_k + 1;
                        } else if ($m['status_permohonan'] == 'v-wl') {
                            $jumlah_wl_k = $jumlah_wl_k + 1;
                        } else if ($m['status_permohonan'] == 'v-rs') {
                            $jumlah_rs_k = $jumlah_rs_k + 1;
                        } else if ($m['status_permohonan'] == 'v-ok') {
                            $jumlah_ok_k = $jumlah_ok_k + 1;
                        }
                    }
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
                'jumlah_total_n' => $jumlah_total_n,
                'jumlah_total_np' => $jumlah_total_np,
                'jumlah_total_p' => $jumlah_total_p,
                'jumlah_total_k' => $jumlah_total_k,
                'jumlah_total' => $jumlah_total,
                'jumlah_ny_n' => $jumlah_ny_n,
                'jumlah_wl_n' => $jumlah_wl_n,
                'jumlah_rs_n' => $jumlah_rs_n,
                'jumlah_ok_n' => $jumlah_ok_n,
                'jumlah_ny_np' => $jumlah_ny_np,
                'jumlah_wl_np' => $jumlah_wl_np,
                'jumlah_rs_np' => $jumlah_rs_np,
                'jumlah_ok_np' => $jumlah_ok_np,
                'jumlah_ny_p' => $jumlah_ny_p,
                'jumlah_wl_p' => $jumlah_wl_p,
                'jumlah_rs_p' => $jumlah_rs_p,
                'jumlah_ok_p' => $jumlah_ok_p,
                'jumlah_ny_k' => $jumlah_ny_k,
                'jumlah_wl_k' => $jumlah_wl_k,
                'jumlah_rs_k' => $jumlah_rs_k,
                'jumlah_ok_k' => $jumlah_ok_k,
            ];

            // dd($data);

            return view('izin_pelantikan/beranda', $data);
        }
    }

    public function semua_pelantikan()
    {
        $status = $this->session->status;
        if ($status != 'login_pelantikan') {
            echo "<script>
            alert('Harap Login');
            window.location.href='/pelantikan';
            </script>";
        } else {
            $jenis_akses = $this->session->jenis_akses;
            $email = $this->session->email;
            if ($jenis_akses == 'admin') {
                $all_pelantikan = $this->pelantikanModel->get_pelantikan();
            } else {
                $all_pelantikan = $this->pelantikanModel->get_pelantikan_spesifik($email);
            }
            // dd($all_pelantikan);

            $data = [
                'email' => $email,
                'nama' => $this->session->nama,
                'jenis_akses' => $jenis_akses,
                'all_pelantikan' => $all_pelantikan
            ];

            return view('izin_pelantikan/semua_pelantikan', $data);
        }
    }

    public function table_notaris()
    {
        $status = $this->session->status;
        if ($status != 'login_pelantikan') {
            echo "<script>
            alert('Harap Login');
            window.location.href='/pelantikan';
            </script>";
        } else {
            $jenis_akses = $this->session->jenis_akses;
            $email = $this->session->email;
            if ($jenis_akses == 'admin') {
                $all_pelantikan = $this->pelantikanModel->get_pelantikan();
            } else {
                $all_pelantikan = $this->pelantikanModel->get_pelantikan_spesifik($email);
            }

            $data = [
                'email' => $email,
                'nama' => $this->session->nama,
                'jenis_akses' => $jenis_akses,
                'all_pelantikan' => $all_pelantikan
            ];

            return view('izin_pelantikan/table_notaris', $data);
        }
    }

    public function table_notaris_pengganti()
    {
        $status = $this->session->status;
        if ($status != 'login_pelantikan') {
            echo "<script>
            alert('Harap Login');
            window.location.href='/pelantikan';
            </script>";
        } else {
            $jenis_akses = $this->session->jenis_akses;
            $email = $this->session->email;
            if ($jenis_akses == 'admin') {
                $all_pelantikan = $this->pelantikanModel->get_pelantikan();
            } else {
                $all_pelantikan = $this->pelantikanModel->get_pelantikan_spesifik($email);
            }

            $data = [
                'email' => $email,
                'nama' => $this->session->nama,
                'jenis_akses' => $jenis_akses,
                'all_pelantikan' => $all_pelantikan
            ];

            return view('izin_pelantikan/table_notaris_pengganti', $data);
        }
    }

    public function table_ppns()
    {
        $status = $this->session->status;
        if ($status != 'login_pelantikan') {
            echo "<script>
            alert('Harap Login');
            window.location.href='/pelantikan';
            </script>";
        } else {
            $jenis_akses = $this->session->jenis_akses;
            $email = $this->session->email;
            if ($jenis_akses == 'admin') {
                $all_pelantikan = $this->pelantikanModel->get_pelantikan();
            } else {
                $all_pelantikan = $this->pelantikanModel->get_pelantikan_spesifik($email);
            }

            $data = [
                'email' => $email,
                'nama' => $this->session->nama,
                'jenis_akses' => $jenis_akses,
                'all_pelantikan' => $all_pelantikan
            ];

            return view('izin_pelantikan/table_ppns', $data);
        }
    }

    public function table_kewarganegaraan()
    {
        $status = $this->session->status;
        if ($status != 'login_pelantikan') {
            echo "<script>
            alert('Harap Login');
            window.location.href='/pelantikan';
            </script>";
        } else {
            $jenis_akses = $this->session->jenis_akses;
            $email = $this->session->email;
            if ($jenis_akses == 'admin') {
                $all_pelantikan = $this->pelantikanModel->get_pelantikan();
            } else {
                $all_pelantikan = $this->pelantikanModel->get_pelantikan_spesifik($email);
            }

            $data = [
                'email' => $email,
                'nama' => $this->session->nama,
                'jenis_akses' => $jenis_akses,
                'all_pelantikan' => $all_pelantikan
            ];

            return view('izin_pelantikan/table_kewarganegaraan', $data);
        }
    }

    public function form_ajukan_pelantikan()
    {
        $status = $this->session->status;
        // session();
        if ($status != 'login_pelantikan') {
            echo "<script>
            alert('Harap Login');
            window.location.href='/pelantikan';
            </script>";
        } else {

            $data = [
                'email' => $this->session->email,
                'nama' => $this->session->nama,
                'jenis_akses' => $this->session->jenis_akses,
                'validation' => \Config\Services::validation()
            ];

            return view('izin_pelantikan/ajukan_pelantikan', $data);
        }
    }

    public function upload_file()
    {
        $jenis_permohonan = $this->request->getVar('select_izin');
        if ($jenis_permohonan == "notaris") {
            $code_permohonan = "n";
        } else if ($jenis_permohonan == "notaris_pengganti") {
            $code_permohonan = "np";
            $jenis_permohonan = "notaris pengganti";
        } else if ($jenis_permohonan == "ppns") {
            $code_permohonan = "p";
        } else if ($jenis_permohonan == "kewarganegaraan") {
            $code_permohonan = "k";
        }
        if (isset($jenis_permohonan)) {
            helper('text');
            $nama_arsip = date('dmY') . '-' . $code_permohonan . '-' . random_string('alnum', 7);
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
            window.location.href='/ajkpln';
            </script>";
        }
    }

    private function _uploadFile($data)
    {
        if (!$this->validate([
            'dokumen_permohonan' => [
                'label' => 'Dokumen Permohonan',
                'rules' => 'uploaded[dokumen_persyaratan]|max_size[dokumen_persyaratan,50000]|ext_in[dokumen_persyaratan,pdf]',
                'errors' => [
                    'uploaded' => '{field} Harap Mengupload Dokumen Persyaratan',
                    'max_size' => '{field} Ukuran melebihi 50MB',
                    'ext_in' => '{field} Format dokumen bukan PDF'
                ]
            ]
        ])) {
            echo "<script>
            alert('Dokumen Persyaratan harus dalam format PDF dan tidak melebihi 50MB');
            window.location.href='/ajkpln';
            </script>";
        } else {
            $nama_arsip = $data['nama_arsip'] . '.pdf';
            $dokumen_persyaratan = $this->request->getFile('dokumen_persyaratan');
            // dd($dokumen_persyaratan);
            $dokumen_persyaratan->move('dokumen_persyaratan', $nama_arsip);
            // dd($dokumen_persyaratan);
            $this->pelantikanModel->insert([
                'email' => $data['email'],
                'tanggal_input' => date('Y-m-d'),
                'jenis_permohonan' => $data['jenis_permohonan'],
                'dokumen_permohonan' => $nama_arsip,
                'status_permohonan' => 'v-ny'
            ]);
            echo "<script>
            alert('Dokumen Berhasil di Upload');
            window.location.href='/allpln';
            </script>";
        }
    }

    public function form_proses_permohonan($code)
    {
        $status = $this->session->status;
        if ($status != 'login_pelantikan') {
            echo "<script>
            alert('Harap Login');
            window.location.href='/pelantikan';
            </script>";
        } else {
            $detail_pelantikan_spesifik = $this->pelantikanModel->get_detail_pelantikan($code);
            // dd($detail_pelantikan_spesifik);
            $data = [
                'email' => $this->session->email,
                'nama' => $this->session->nama,
                'jenis_akses' => $this->session->jenis_akses,
                'data_pelantikan' => $detail_pelantikan_spesifik
            ];

            return view('izin_pelantikan/proses_pelantikan', $data);
        }
    }

    public function proses_permohonan()
    {
        $status_permohonan = $this->request->getVar('status_permohonan');
        $dokumen_persyaratan = $this->request->getVar('dokumen_persyaratan');
        $detail_pelantikan_spesifik = $this->pelantikanModel->get_detail_pelantikan($dokumen_persyaratan);
        // dd($detail_pelantikan_spesifik);
        $id_npk = (int)$this->request->getVar('id_npk');
        if (isset($status_permohonan)) {
            if ($status_permohonan == 'v-ok') {
                if (!$this->validate([
                    'dokumen_balasan' => [
                        'label' => 'Dokumen Balasan',
                        'rules' => 'uploaded[dokumen_balasan]|max_size[dokumen_balasan,50000]|ext_in[dokumen_balasan,pdf]',
                        'errors' => [
                            'uploaded' => '{field} Harap Mengupload Dokumen Balasan',
                            'max_size' => '{field} Ukuran melebihi 50MB',
                            'ext_in' => '{field} Format dokumen bukan PDF'
                        ]
                    ]
                ])) {
                    echo "<script>
                alert('Dokumen Balasan harus diupload untuk menyetujui permohonan. Dokkumen harus dalam format PDF dan tidak melebihi 50MB');
                window.location.href='/vpln/" . $dokumen_persyaratan . "';
                </script>";
                } else {
                    helper('text');
                    $keterangan = $this->request->getVar('keterangan');
                    if (isset($keterangan)) {
                        $keterangan = $keterangan;
                    } else {
                        $keterangan = "Permohonan Anda Diterima";
                    }
                    $nama_arsip = date('dmY') . '-blspln-' . random_string('alnum', 7) . '.pdf';
                    $dokumen_balasan = $this->request->getFile('dokumen_balasan');
                    $tanggal_pelantikan = $this->request->getVar('tanggal_pelantikan');
                    // dd($dokumen_balasan);
                    $dokumen_balasan->move('dokumen_balasan', $nama_arsip);
                    // dd($dokumen_balasan);
                    $data = [
                        'dokumen_permohonan' => $dokumen_persyaratan,
                        'tanggal_update' => date('Y-m-d'),
                        'tanggal_pelantikan' => $tanggal_pelantikan,
                        'dokumen_balasan' => $nama_arsip,
                        'keterangan_balasan' => $keterangan,
                        'status_permohonan' => $status_permohonan
                    ];
                    $this->pelantikanModel->update_pelantikan($id_npk, $data);
                    // email
                    $email = $this->request->getVar('email');
                    $nama = $this->request->getVar('nama');
                    $message = "Permohonan Anda Sudah Kami Setujui. Klik link untuk melihat dokumen.";
                    // $authcode = md5("login lihat verif");
                    $path = base_url('/pelantikan');
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
                    window.location.href='/allpln';
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
                $this->pelantikanModel->update_pelantikan($id_npk, $data);
                if ($status_permohonan == 'v-rs') {
                    // email
                    $email = $this->request->getVar('email');
                    $nama = $this->request->getVar('nama');
                    $message = "Permohonan Anda Ditolak, silahkan mengajukan ulang melalui link berikut.";
                    // $authcode = md5("login lihat verif");
                    $path = base_url('/pelantikan');
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
                window.location.href='/allpln';
                </script>";
            }
        } else {
            echo "<script>
            alert('Pilih Status Permohonan');
            window.location.href='/vpln/" . $dokumen_persyaratan . "';
            </script>";
        }
    }

    public function logout()
    {
        if ($this->session->jenis_akses == "user") {
            $jenis_akses = 1;
        } else {
            $jenis_akses = 0;
        }

        unset($_SESSION['nama']);
        unset($_SESSION['status']);
        unset($_SESSION['email']);
        unset($_SESSION['jenis_akses']);

        if ($jenis_akses == 1) {
            return redirect()->to('https://survei.balitbangham.go.id/ly/h5J068jb');
        } else {
            return redirect()->to('/');
        }
    }
}
