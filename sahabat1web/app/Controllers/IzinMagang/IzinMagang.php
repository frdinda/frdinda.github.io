<?php

namespace App\Controllers\IzinMagang;

use App\Controllers\BaseController;
use App\Models\UserMagangModel;

use function PHPUnit\Framework\isNull;

class IzinMagang extends BaseController
{
    protected $usermagangModel;
    public function __construct()
    {
        // parent::__construct();
        $this->usermagangModel = new UserMagangModel();
        // $this->load->library('email');
    }
    public function index()
    {
        return view('izin_magang/login');
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
            $data = [
                'email' => $email,
                'nama' => $nama,
                'authcode' => $authcode
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
        $message = "Hai, " . $data['nama'] . ". Selamat Anda telah berhasil melakukan registrasi pada Aplikasi Permohonan Izin Magang Kantor Wilayah Kementerian Hukum dan HAM Sumatera Utara. Silahkan klik link di bawah ini untuk menyelesaikan proses verifikasi. <br><br> <a href='" . base_url('/33b3/' . $data['authcode']) . ">VERIFIKASI</a>";
        $email = \Config\Services::email();
        $email->setSubject($subject);
        $email->setTo($to);
        $email->setMessage($message);
        if ($email->send()) {
            // ganti
            echo "sukses";
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
            $data = [
                'email' => $this->session->email,
                'nama' => $this->session->nama,
                'jenis_akses' => $this->session->jenis_akses
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

            $data = [
                'email' => $this->session->email,
                'nama' => $this->session->nama,
                'jenis_akses' => $this->session->jenis_akses
            ];

            return view('izin_magang/semua_magang', $data);
        }
    }

    public function table_magang()
    {
        $status = $this->session->status;
        if ($status != 'login_magang') {
            echo "<script>
            alert('Harap Login');
            window.location.href='/magang';
            </script>";
        } else {

            $data = [
                'email' => $this->session->email,
                'nama' => $this->session->nama,
                'jenis_akses' => $this->session->jenis_akses
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

            $data = [
                'email' => $this->session->email,
                'nama' => $this->session->nama,
                'jenis_akses' => $this->session->jenis_akses
            ];

            return view('izin_magang/table_penelitian', $data);
        }
    }

    public function form_ajukan_magang()
    {
        $status = $this->session->status;
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
                'instansi' => $this->session->instansi
            ];

            return view('izin_magang/ajukan_magang', $data);
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
