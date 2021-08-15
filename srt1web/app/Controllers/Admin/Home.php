<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SuratModel;

class Home extends BaseController
{
    protected $suratModel;
    public function __construct()
    {
        $this->suratModel = new SuratModel();
    }
    public function index()
    {
        $user_id = $this->session->user_id;
        $surat = $this->suratModel->get_surat_join();
        $surat_user = $this->suratModel->get_surat_join_user($user_id);
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $user_id,
            'page' => $this->session->page,
            'surat' => $surat,
            'surat_user' => $surat_user
        ];
        if ($data['status_user'] == "admin") {
            return view('admin/home', $data);
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
    }
    public function searchView()
    {
        $user_id = $this->session->user_id;
        $surat = $this->suratModel->get_surat_join();
        $surat_user = $this->suratModel->get_surat_join_user($user_id);
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $user_id,
            'page' => $this->session->page,
            'surat' => $surat,
            'surat_user' => $surat_user,
            'search' => $this->session->search
        ];
        if ($data['status_user'] == "admin") {
            return view('admin/home', $data);
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
    }
}
