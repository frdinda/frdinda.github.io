<?php

namespace App\Controllers\Subbagian;

use App\Controllers\BaseController;
use App\Models\SubbagModel;
use App\Models\DynamicBagianModel;
use CodeIgniter\Controllers;

class Home extends BaseController
{
    protected $subbagModel;
    protected $dynamicbagianModel;
    public function __construct()
    {
        $this->subbagModel = new SubbagModel();
        $this->dynamicbagianModel = new DynamicBagianModel();
    }
    public function index()
    {
        // $user = $this->userModel->findAll();
        $subbag = $this->subbagModel->get_ms_subbag();
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $this->session->user_id,
            'page' => 'kelola_subbag',
            'subbag' => $subbag
        ];
        if ($data['status_user'] == "super") {
            return view('subbagian/kelola_subbagian', $data);
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
        // dd($data['subbag']);
        // nanti diubah

        // catatan:
        // $userModel = new \App\Models\UserModel();
        // $userModel = new UserModel();
    }
    public function editSubbag($id_subbag)
    {
        $div = $this->dynamicbagianModel->get_divisi();
        $detail_subbag = $this->subbagModel->get_detail_subbag($id_subbag);
        $bag_tertentu = $this->dynamicbagianModel->get_bagian($detail_subbag['id_div']);
        // $detail_subbag = $detail_bag['0'];
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $this->session->user_id,
            'page' => 'edit_bag',
            'all_divisi' => $div,
            'all_bag' => $bag_tertentu,
            'detail' => $detail_subbag
        ];
        if ($data['status_user'] == "super") {
            return view('subbagian/edit_subbag', $data);
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
        // nanti diubah
        // dd($detail_bag);
    }
    public function UpdateSubbag()
    {
        $this->subbagModel->save([
            'id_subbag' => $this->request->getVar('id_subbag'),
            'nama_subbag' => $this->request->getVar('nama_subbag'),
            'id_bag' => $this->request->getVar('sbg_id_bag')
        ]);
        return redirect()->to('/subbag');
    }
    public function TambahSubbag()
    {
        $div = $this->dynamicbagianModel->get_divisi();
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $this->session->user_id,
            'page' => 'tambah_bag',
            'all_divisi' => $div
        ];
        if ($data['status_user'] == "super") {
            return view('subbagian/tambah_subbag', $data);
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
        // nanti diubah
        // dd($detail_div);
    }
    public function saveSubbag()
    {
        $this->subbagModel->insert([
            'id_subbag' => $this->request->getVar('id_subbag'),
            'nama_subbag' => $this->request->getVar('nama_subbag'),
            'id_bag' => $this->request->getVar('sbg_id_bag')
        ]);
        return redirect()->to('/subbag');
    }
    public function hapus($id_subbag)
    {
        $this->subbagModel->delete($id_subbag);
        return redirect()->to('/subbag');
    }
}
