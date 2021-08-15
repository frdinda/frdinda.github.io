<?php

namespace App\Controllers\KelolaUser;

use App\Controllers\BaseController;
use CodeIgniter\Controllers;
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
        // $user = $this->userModel->findAll();
        $user = $this->userModel->get_user_join();
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $this->session->user_id,
            'page' => 'kelola_user',
            'user' => $user
        ];
        if ($data['status_user'] == "super" || $data['status_user'] == "admin") {
            return view('kelola_user/kelola_user', $data);
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
        // dd($data['user']);
        // nanti diubah

        // catatan:
        // $userModel = new \App\Models\UserModel();
        // $userModel = new UserModel();
    }
}
