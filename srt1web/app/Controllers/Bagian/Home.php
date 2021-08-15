<?php

namespace App\Controllers\Bagian;

use App\Controllers\BaseController;
use App\Models\BagModel;
use App\Models\DynamicBagianModel;
use CodeIgniter\Controllers;

class Home extends BaseController
{
    protected $bagModel;
    protected $dynamicbagianModel;
    public function __construct()
    {
        $this->bagModel = new BagModel();
        $this->dynamicbagianModel = new DynamicBagianModel();
    }
    public function index()
    {
        // $user = $this->userModel->findAll();
        $bag = $this->bagModel->get_ms_bag();
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $this->session->user_id,
            'page' => $this->session->page,
            'bag' => $bag
        ];
        if ($data['status_user'] == "super") {
            return view('bagian/kelola_bagian', $data);
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
        // dd($data['bag']);
        // nanti diubah

        // catatan:
        // $userModel = new \App\Models\UserModel();
        // $userModel = new UserModel();
    }
    public function editBag($id_bag)
    {
        $div = $this->dynamicbagianModel->get_divisi();
        $detail_bag = $this->bagModel->get_detail_bag($id_bag);
        // $detail_bag = $detail_bag['0'];
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $this->session->user_id,
            'page' => 'edit_bag',
            'all_divisi' => $div,
            'detail' => $detail_bag
        ];
        if ($data['status_user'] == "super") {
            return view('bagian/edit_bag', $data);
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
        // nanti diubah
        // dd($detail_bag);
    }
    public function UpdateBag()
    {
        $this->bagModel->save([
            'id_bag' => $this->request->getVar('id_bag'),
            'nama_bag' => $this->request->getVar('nama_bag'),
            'id_div' => $this->request->getVar('sbg_id_div')
        ]);
        return redirect()->to('/bag');
    }
    public function TambahBag()
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
            return view('bagian/tambah_bag', $data);
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
        // nanti diubah
        // dd($detail_div);
    }
    public function saveBag()
    {
        $this->bagModel->insert([
            'id_bag' => $this->request->getVar('id_bag'),
            'nama_bag' => $this->request->getVar('id_bag'),
            'id_div' => $this->request->getVar('sbg_id_div')
        ]);
        return redirect()->to('/bag');
    }
    public function hapus($id_bag)
    {
        $this->bagModel->delete($id_bag);
        return redirect()->to('/bag');
    }
}
