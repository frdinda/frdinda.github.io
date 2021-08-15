<?php

namespace App\Controllers\Nomor;

use App\Controllers\BaseController;
use App\Models\SuratModel;

class DetailRevisi extends BaseController
{
    protected $suratModel;
    public function __construct()
    {
        $this->suratModel = new SuratModel();
    }
    public function index($no_surat)
    {
        $detail_revisi = $this->suratModel->get_detail_revisi($no_surat);
        $detail_surat = $this->suratModel->get_detail_surat($no_surat);
        $tanggal_revisi_max = $this->suratModel->get_tanggal_max($no_surat);
        // dd($detail_revisi);
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $this->session->user_id,
            'page' => $this->session->page,
            'detail_revisi' => $detail_revisi,
            'detail_surat' => $detail_surat,
            'tanggal_revisi_max' => $tanggal_revisi_max['tanggal_revisi']
        ];
        // dd($data['detail_surat']);
        if (empty($data['status_user'])) {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        } else {
            return view('nomor_surat/detail_revisi', $data);
        }
    }
}
