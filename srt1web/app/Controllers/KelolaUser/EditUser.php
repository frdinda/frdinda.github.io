<?php

namespace App\Controllers\KelolaUser;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\DynamicBagianModel;

class EditUser extends BaseController
{
    protected $userModel;
    protected $dynamicbagianModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->dynamicbagianModel = new DynamicBagianModel();
    }
    public function index($user_id)
    {
        $div = $this->dynamicbagianModel->get_divisi();
        $akses = $this->dynamicbagianModel->get_akses();
        $detail_user = $this->userModel->get_detail_user($user_id);
        // $detail_user = $detail_user['0'];
        $bag_tertentu = $this->dynamicbagianModel->get_bagian($detail_user['id_div']);
        $subbag_tertentu = $this->dynamicbagianModel->get_subbagian($detail_user['id_bag']);
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $this->session->user_id,
            'page' => 'edit_user',
            'detail_user' => $detail_user,
            'all_divisi' => $div,
            'all_bag' => $bag_tertentu,
            'all_subbag' => $subbag_tertentu,
            'all_akses' => $akses
        ];
        if ($data['status_user'] == "super" || $data['status_user'] == "admin") {
            return view('kelola_user/edit_user', $data);
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
        // nanti diubah
        // dd($akses);
    }
    public function hapus($user_id)
    {
        $this->userModel->delete($user_id);
        return redirect()->to('/mng_user');
    }
    public function UpdateUser()
    {
        $id_akses = $this->request->getVar('id_akses');
        $password = $this->request->getVar('password');
        $user_id = $this->request->getVar('user_id');
        $konfirm_password = $this->request->getVar('konfirmasi_password');
        $data = [
            'user_id' => $user_id,
            'id_subbag' => $this->request->getVar('sbg_id_subbag'),
            'id_bag' => $this->request->getVar('sbg_id_bag'),
            'id_div' => $this->request->getVar('sbg_id_div'),
            'id_akses' => $id_akses,
            'password' => $password,
            'konfirmasi_password' => $konfirm_password,
            'nama_kepala' => $this->request->getVar('nama_kepala'),
            'nip_kepala' => $this->request->getVar('nip_kepala')
        ];
        if ($password == $konfirm_password) {
            if ($id_akses == "sbg" || $id_akses == "admin" || $id_akses == "super") {
                $this->UpdateUserSubbagian($data);
                return redirect()->to('/mng_user');
            } else if ($id_akses == "kbg") {
                $this->UpdateUserBagian($data);
                return redirect()->to('/mng_user');
            } else if ($id_akses == "kdv") {
                $this->UpdateUserDivisi($data);
                return redirect()->to('/mng_user');
            } else if ($id_akses == "kkw") {
                $this->UpdateUserKakanwil($data);
                return redirect()->to('/mng_user');
            }
        } else {
            echo "<script>
            alert('Password dan Konfirmasi Password Tidak Sama');
            window.location.href='/edit_user/$user_id';
            </script>";
        }
    }
    public function UpdateUserSubbagian($data)
    {
        // dd($data);
        $this->userModel->save([
            'user_id' => $data['user_id'],
            'id_subbag' => $data['id_subbag'],
            'id_akses' => $data['id_akses'],
            'password' => md5($data['password']),
            'nama_kepala' => $data['nama_kepala'],
            'nip_kepala' => $data['nip_kepala']
        ]);
    }
    public function UpdateUserBagian($data)
    {
        $this->userModel->save([
            'user_id' => $data['user_id'],
            'id_bag' => $data['id_bag'],
            'id_akses' => $data['id_akses'],
            'password' => md5($data['password']),
            'nama_kepala' => $data['nama_kepala'],
            'nip_kepala' => $data['nip_kepala']
        ]);
    }
    public function UpdateUserDivisi($data)
    {
        $this->userModel->save([
            'user_id' => $data['user_id'],
            'id_div' => $data['id_div'],
            'id_akses' => $data['id_akses'],
            'password' => md5($data['password']),
            'nama_kepala' => $data['nama_kepala'],
            'nip_kepala' => $data['nip_kepala']
        ]);
    }
    public function UpdateUserKakanwil($data)
    {
        $this->userModel->save([
            'user_id' => $data['user_id'],
            'id_akses' => $data['id_akses'],
            'password' => md5($data['password']),
            'nama_kepala' => $data['nama_kepala'],
            'nip_kepala' => $data['nip_kepala']
        ]);
    }
}
