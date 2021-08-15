<?php

namespace App\Controllers\KelolaUser;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\DynamicBagianModel;

class TambahUser extends BaseController
{
    protected $dynamicbagianModel;
    protected $userModel;
    public function __construct()
    {
        $this->dynamicbagianModel = new DynamicBagianModel();
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $div = $this->dynamicbagianModel->get_divisi();
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $this->session->user_id,
            'page' => 'tambah_user',
            'all_divisi' => $div
        ];
        if ($data['status_user'] == "super" || $data['status_user'] == "admin") {
            return view('kelola_user/tambah_user', $data);
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
        // nanti diubah
    }
    public function getbagian()
    {
        $id_div = $this->request->getPost("id");
        $data_bag = $this->dynamicbagianModel->get_bagian($id_div);
        $output = "<option value='' selected disabled></option>";
        // masih disini
        // if (!empty($data_bag)) {
        //     foreach ($data_bag as $b) :
        //         $output .= '<option value="' . $b['id_bag'] . '">' . $b['nama_bag'] . '</option>';
        //     endforeach;
        // }

        return $this->response->setJson($data_bag);
    }
    public function getsubbagian()
    {
        $id_bag = $this->request->getPost("id");
        $data_subbag = $this->dynamicbagianModel->get_subbagian($id_bag);
        return $this->response->setJson($data_subbag);
    }
    public function saveUserSubbagian()
    {
        $akses = 'sbg';
        $password = $this->request->getVar('sbg_password');
        $konfirm_password = $this->request->getVar('sbg_konfirmasi_password');
        if ($password == $konfirm_password) {
            $this->userModel->insert([
                'user_id' => $this->request->getVar('sbg_user_id'),
                'id_subbag' => $this->request->getVar('sbg_id_subbag'),
                'id_akses' => $akses,
                'password' => md5($password),
                'nama_kepala' => $this->request->getVar('sbg_nama_kepala'),
                'nip_kepala' => $this->request->getVar('sbg_nip_kepala')
            ]);
            return redirect()->to('/mng_user');
        } else {
            echo "<script>
            alert('Password dan Konfirmasi Password Tidak Sama');
            window.location.href='/tambah_user';
            </script>";
        }
    }
    public function saveUserBagian()
    {
        $akses = 'kbg';
        $password = $this->request->getVar('kbg_password');
        $konfirm_password = $this->request->getVar('kbg_konfirmasi_password');
        if ($password == $konfirm_password) {
            $this->userModel->insert([
                'user_id' => $this->request->getVar('kbg_user_id'),
                'id_bag' => $this->request->getVar('kbg_id_bag'),
                'id_akses' => $akses,
                'password' => md5($password),
                'nama_kepala' => $this->request->getVar('kbg_nama_kepala'),
                'nip_kepala' => $this->request->getVar('kbg_nip_kepala')
            ]);
            return redirect()->to('/mng_user');
        } else {
            echo "<script>
            alert('Password dan Konfirmasi Password Tidak Sama');
            window.location.href='/tambah_user';
            </script>";
        }
    }
    public function saveUserDivisi()
    {
        $akses = 'kdv';
        $password = $this->request->getVar('kdv_password');
        $konfirm_password = $this->request->getVar('kdv_konfirmasi_password');
        if ($password == $konfirm_password) {
            $this->userModel->insert([
                'user_id' => $this->request->getVar('kdv_user_id'),
                'id_div' => $this->request->getVar('kdv_id_div'),
                'id_akses' => $akses,
                'password' => md5($password),
                'nama_kepala' => $this->request->getVar('kdv_nama_kepala'),
                'nip_kepala' => $this->request->getVar('kdv_nip_kepala')
            ]);
            return redirect()->to('/mng_user');
        } else {
            echo "<script>
            alert('Password dan Konfirmasi Password Tidak Sama');
            window.location.href='/tambah_user';
            </script>";
        }
    }
    public function saveUserAdmin()
    {
        $akses = 'admin';
        $password = $this->request->getVar('adm_password');
        $konfirm_password = $this->request->getVar('adm_konfirmasi_password');
        if ($password == $konfirm_password) {
            $this->userModel->insert([
                'user_id' => $this->request->getVar('adm_user_id'),
                'id_subbag' => $this->request->getVar('adm_id_subbag'),
                'id_akses' => $akses,
                'password' => md5($password),
                'nama_kepala' => $this->request->getVar('adm_nama_kepala'),
                'nip_kepala' => $this->request->getVar('adm_nip_kepala')
            ]);
            return redirect()->to('/mng_user');
        } else {
            echo "<script>
            alert('Password dan Konfirmasi Password Tidak Sama');
            window.location.href='/tambah_user';
            </script>";
        }
    }
    public function saveUserSuperAdmin()
    {
        $akses = 'super';
        $password = $this->request->getVar('sadm_password');
        $konfirm_password = $this->request->getVar('sadm_konfirmasi_password');
        if ($password == $konfirm_password) {
            $this->userModel->insert([
                'user_id' => $this->request->getVar('sadm_user_id'),
                'id_subbag' => $this->request->getVar('sadm_id_subbag'),
                'id_akses' => $akses,
                'password' => md5($password),
                'nama_kepala' => $this->request->getVar('sadm_nama_kepala'),
                'nip_kepala' => $this->request->getVar('sadm_nip_kepala')
            ]);
            return redirect()->to('/mng_user');
        } else {
            echo "<script>
            alert('Password dan Konfirmasi Password Tidak Sama');
            window.location.href='/tambah_user';
            </script>";
        }
    }
    public function saveUserKakanwil()
    {
        $akses = 'kkw';
        $password = $this->request->getVar('kkw_password');
        $konfirm_password = $this->request->getVar('kkw_konfirmasi_password');
        if ($password == $konfirm_password) {
            $this->userModel->insert([
                'user_id' => $this->request->getVar('kkw_user_id'),
                'id_akses' => $akses,
                'password' => md5($password),
                'nama_kepala' => $this->request->getVar('kkw_nama_kepala'),
                'nip_kepala' => $this->request->getVar('kkw_nip_kepala')
            ]);
            return redirect()->to('/mng_user');
        } else {
            echo "<script>
            alert('Password dan Konfirmasi Password Tidak Sama');
            window.location.href='/tambah_user';
            </script>";
        }
    }
}
