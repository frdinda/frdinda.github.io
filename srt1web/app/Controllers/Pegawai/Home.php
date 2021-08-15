<?php

namespace App\Controllers\Pegawai;

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
        $id_div = $this->session->id_div;
        $id_bag = $this->session->id_bag;
        $surat = $this->suratModel->get_surat_join();
        $surat_user = $this->suratModel->get_surat_join_user($user_id);
        $surat = $this->suratModel->get_surat_join();
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $user_id,
            'id_div' => $id_div,
            'id_bag' => $id_bag,
            'page' => $this->session->page,
            'surat' => $surat,
            'surat_user' => $surat_user
        ];
        // dd($data['status_user']);
        if (isset($data['status_user'])) {
            if ($data['status_user'] == 'sbg' || $data['status_user'] == 'kkw') {
                return view('pegawai/home', $data);
            } else if ($data['status_user'] == 'kbg') {
                $surat_pim = $this->suratModel->get_surat_join_kbg($id_bag);
                $data2 = [
                    'surat_pim' => $surat_pim
                ];
                $datum = array_merge($data, $data2);
                return view('pegawai/home', $datum);
            } else if ($data['status_user'] == 'kdv') {
                $surat_pim = $this->suratModel->get_surat_join_div($id_div);
                $data2 = [
                    'surat_pim' => $surat_pim
                ];
                $datum = array_merge($data, $data2);
                return view('pegawai/home', $datum);
            }
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
        $id_div = $this->session->id_div;
        $id_bag = $this->session->id_bag;
        $surat = $this->suratModel->get_surat_join();
        $surat_user = $this->suratModel->get_surat_join_user($user_id);
        $surat = $this->suratModel->get_surat_join();
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $user_id,
            'id_div' => $id_div,
            'id_bag' => $id_bag,
            'page' => $this->session->page,
            'surat' => $surat,
            'surat_user' => $surat_user,
            'search' => $this->session->search
        ];
        // dd($data['status_user']);
        if (isset($data['status_user'])) {
            if ($data['status_user'] == 'sbg' || $data['status_user'] == 'kkw') {
                return view('pegawai/home', $data);
            } else if ($data['status_user'] == 'kbg') {
                $surat_pim = $this->suratModel->get_surat_join_kbg($id_bag);
                $data2 = [
                    'surat_pim' => $surat_pim
                ];
                $datum = array_merge($data, $data2);
                return view('pegawai/home', $datum);
            } else if ($data['status_user'] == 'kdv') {
                $surat_pim = $this->suratModel->get_surat_join_div($id_div);
                $data2 = [
                    'surat_pim' => $surat_pim
                ];
                $datum = array_merge($data, $data2);
                return view('pegawai/home', $datum);
            }
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
    }
}
