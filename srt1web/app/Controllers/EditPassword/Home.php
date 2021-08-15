<?php

namespace App\Controllers\EditPassword;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Home extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $user_id = $this->session->user_id;
        $status_user = $this->session->status;
        $detail_user = $this->userModel->get_detail_user($user_id);
        // dd($detail_user);
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $status_user,
            'ket_user' => $this->session->ket_user,
            'user_id' => $user_id,
            'detail_user' => $detail_user,
            'page' => 'edit_pass'
        ];
        return view('edit_password/edit_password', $data);
    }
    public function savePassword()
    {
        $status_user = $this->session->status;
        $user_id = $this->request->getVar('user_id');
        $password_baru = $this->request->getVar('password_baru');
        $konfirmasi_password = $this->request->getVar('konfirmasi_password');
        if ($password_baru != $konfirmasi_password) {
            if ($status_user == 'super' || $status_user == 'adm') {
                echo "<script>
            alert('Password dan Konfirmasi Password Tidak Sama');
            window.location.href='/" . $status_user . "';
            </script>";
            } else {
                echo "<script>
            alert('Password dan Konfirmasi Password Tidak Sama');
            window.location.href='/pegawai';
            </script>";
            }
        } else {
            $this->userModel->save([
                'user_id' => $user_id,
                'password' => md5($password_baru)
            ]);
            if ($status_user == 'super' || $status_user == 'adm') {
                return redirect()->to('/' . $status_user);
            } else {
                return redirect()->to('/pegawai');
            }
        }
    }
}
