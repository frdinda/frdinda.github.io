<?php

namespace App\Controllers\SuperAdmin;

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
        $surat = $this->suratModel->get_surat_join();
        // dd($surat);
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $this->session->user_id,
            'page' => $this->session->page,
            'surat' => $surat
        ];
        // dd($data['surat']);
        if ($data['status_user'] == "super") {
            return view('super_admin/home', $data);
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
    }
    public function searchView()
    {
        $surat = $this->suratModel->get_surat_join();
        // dd($surat);
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $this->session->user_id,
            'page' => $this->session->page,
            'search' => $this->session->search,
            'surat' => $surat
        ];
        // dd($data['surat']);
        if ($data['status_user'] == "super") {
            return view('super_admin/home', $data);
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
    }
}
