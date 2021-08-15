<?php

namespace App\Controllers\Divisi;

use App\Controllers\BaseController;
use App\Models\DivModel;
use CodeIgniter\Controllers;

class Home extends BaseController
{
    protected $divModel;
    public function __construct()
    {
        $this->divModel = new DivModel();
    }
    public function index()
    {
        // $user = $this->userModel->findAll();
        $div = $this->divModel->get_ms_divisi();
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $this->session->user_id,
            'page' => 'kelola_div',
            'div' => $div
        ];
        if ($data['status_user'] == "super") {
            return view('divisi/kelola_divisi', $data);
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
        // dd($data['div']);
        // nanti diubah

        // catatan:
        // $userModel = new \App\Models\UserModel();
        // $userModel = new UserModel();
    }
    public function editDiv($id_div)
    {
        $detail_div = $this->divModel->get_detail_div($id_div);
        // $detail_div = $detail_div['0'];
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $this->session->user_id,
            'page' => 'edit_div',
            'detail' => $detail_div
        ];
        if ($data['status_user'] == "super") {
            return view('divisi/edit_div', $data);
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
        // nanti diubah
        // dd($detail_div);
        return view('divisi/edit_div', $data);
    }
    public function UpdateDiv()
    {
        $data = [
            'id_div' => $this->request->getVar('id_div'),
            'nama_div' => $this->request->getVar('nama_div')
        ];
        $this->divModel->save([
            'id_div' => $data['id_div'],
            'nama_div' => $data['nama_div']
        ]);
        return redirect()->to('/div');
    }
    public function TambahDiv()
    {
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $this->session->user_id,
            'page' => 'tambah_div'
        ];
        if ($data['status_user'] == "super") {
            return view('divisi/tambah_div', $data);
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
        // nanti diubah
        // dd($detail_div);
    }
    public function saveDiv()
    {
        $data = [
            'id_div' => $this->request->getVar('id_div'),
            'nama_div' => $this->request->getVar('nama_div')
        ];
        $this->divModel->insert([
            'id_div' => $data['id_div'],
            'nama_div' => $data['nama_div']
        ]);
        return redirect()->to('/div');
    }
    public function hapus($id_div)
    {
        $this->divModel->delete($id_div);
        return redirect()->to('/div');
    }
}
