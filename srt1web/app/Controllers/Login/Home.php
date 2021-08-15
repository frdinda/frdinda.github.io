<?php

namespace App\Controllers\Login;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\SuratModel;
use App\Models\RevisiModel;
use CodeIgniter\Controllers;

class Home extends BaseController
{
    protected $userModel;
    protected $suratModel;
    protected $revisiModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->suratModel = new SuratModel();
        $this->revisiModel = new RevisiModel();
    }
    public function index()
    {
        // $user = $this->userModel->findAll();
        $data = [
            'status_user' => 'logout',
            'page' => 'login'
        ];
        $no_surat_terakhir = $this->suratModel->get_last_no_surat();
        $no_surat_terakhir = (int)$no_surat_terakhir['no_surat'];
        $tanggal_surat_terakhir = $this->suratModel->get_detail_surat($no_surat_terakhir);
        $tanggal_hari_ini = date('Y-m-d');
        $day = strtotime($tanggal_hari_ini);
        $day = date('D', $day);
        if ($day == 'Sat' || $day == 'Sun') {
            return view('login/login', $data);
        } else {
            if (strtotime($tanggal_hari_ini) > strtotime($tanggal_surat_terakhir['tanggal_surat'])) {
                $no_surat_terakhir = $no_surat_terakhir + 1;
                for ($i = 0; $i < 5; $i++) {
                    $this->suratModel->insert([
                        'no_surat' => $no_surat_terakhir,
                        'tanggal_surat' => $tanggal_surat_terakhir['tanggal_surat'],
                        'tanggal_pengambilan' => $tanggal_surat_terakhir['tanggal_surat']
                    ]);
                    $this->revisiModel->insert([
                        'no_surat' => $no_surat_terakhir
                    ]);
                    $no_surat_terakhir = $no_surat_terakhir + 1;
                    if ($i == 4) {
                        $this->suratModel->insert([
                            'no_surat' => $no_surat_terakhir,
                            'tanggal_surat' => $tanggal_hari_ini,
                            'tanggal_pengambilan' => $tanggal_hari_ini
                        ]);
                        $this->revisiModel->insert([
                            'no_surat' => $no_surat_terakhir
                        ]);
                    }
                }
            }
            return view('login/login', $data);
        }
        // dd($data['div']);
        // nanti diubah

        // catatan:
        // $userModel = new \App\Models\UserModel();
        // $userModel = new UserModel();
    }
    public function login()
    {
        $user_id = $this->request->getVar('user_id');
        $password = md5($this->request->getVar('password'));
        $user = $this->userModel->get_detail_user($user_id);
        if ($user['password'] == $password) {
            $this->session->set('status', $user['id_akses']);
            $this->session->set('ket_user', $user['jenis_akses']);
            $this->session->set('user_id', $user['user_id']);
            $this->session->set('page', "home");
            if ($user['id_akses'] == "sbg") {
                $this->session->set('nama', $user['nama_subbag']);
                return redirect()->to('/pegawai');
            } else if ($user['id_akses'] == "kbg") {
                $this->session->set('nama', $user['nama_bag']);
                $this->session->set('id_bag', $user['id_bag']);
                return redirect()->to('/pegawai');
            } else if ($user['id_akses'] == "kdv") {
                $this->session->set('nama', $user['nama_div']);
                $this->session->set('id_div', $user['id_div']);
                return redirect()->to('/pegawai');
            } else if ($user['id_akses'] == "kkw" || $user['id_akses'] == "super" || $user['id_akses'] == "admin") {
                $this->session->set('nama', $user['nama_kepala']);
                if ($user['id_akses'] == "kkw") {
                    return redirect()->to('/pegawai');
                } else if ($user['id_akses'] == "super") {
                    return redirect()->to('/super');
                } else if ($user['id_akses'] == "admin") {
                    return redirect()->to('/admin');
                }
            }
        } else if (empty($user['user_id']) || $user['password'] != $password) {
            echo "<script>
            alert('User ID Atau Password Salah, Silahkan Login Kembali');
            window.location.href='/';
            </script>";
        }
        // kalo salahnya belum begoooo
    }
    public function logout()
    {
        unset($_SESSION['nama']);
        unset($_SESSION['status']);
        unset($_SESSION['ket_user']);
        unset($_SESSION['user_id']);
        unset($_SESSION['page']);
        return redirect()->to('/');
    }
}
