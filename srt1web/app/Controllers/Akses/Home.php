<?php

namespace App\Controllers\Akses;

use App\Controllers\BaseController;
use App\Models\AksesModel;
use CodeIgniter\Controllers;

class Home extends BaseController
{
    protected $aksesModel;
    public function __construct()
    {
        $this->aksesModel = new AksesModel();
    }
    public function index()
    {
        // $user = $this->userModel->findAll();
        $akses = $this->aksesModel->get_ms_akses();
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $this->session->user_id,
            'page' => "kelola_akses",
            'akses' => $akses
        ];
        if ($data['status_user'] == "super") {
            return view('akses/kelola_akses', $data);
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
    public function editAkses($id_akses)
    {
        $detail_akses = $this->aksesModel->get_detail_akses($id_akses);
        // $detail_div = $detail_div['0'];
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $this->session->user_id,
            'page' => "edit_akses",
            'detail' => $detail_akses
        ];
        if ($data['status_user'] == "super") {
            return view('akses/edit_akses', $data);
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
        // nanti diubah
        // dd($detail_div);
    }
    public function UpdateAkses()
    {
        $data = [
            'id_akses' => $this->request->getVar('id_akses'),
            'jenis_akses' => $this->request->getVar('jenis_akses')
        ];
        $this->aksesModel->save([
            'id_akses' => $data['id_akses'],
            'jenis_akses' => $data['jenis_akses']
        ]);
        return redirect()->to('/akses');
    }
    public function TambahAkses()
    {
        // nanti diubah
        // dd($detail_div);
        $data = [
            'nama' => $this->session->nama,
            'status_user' => $this->session->status,
            'ket_user' => $this->session->ket_user,
            'user_id' => $this->session->user_id,
            'page' => "tambah_akses"
        ];
        if ($data['status_user'] == "super") {
            return view('akses/tambah_akses', $data);
        } else {
            echo "<script>
            alert('Tolong Lakukan Login');
            window.location.href='/';
            </script>";
        }
    }
    public function saveAkses()
    {
        $data = [
            'id_akses' => $this->request->getVar('id_akses'),
            'jenis_akses' => $this->request->getVar('jenis_akses')
        ];
        $this->aksesModel->insert([
            'id_akses' => $data['id_akses'],
            'jenis_akses' => $data['jenis_akses']
        ]);
        return redirect()->to('/akses');
    }
    public function hapus($id_akses)
    {
        $this->aksesModel->delete($id_akses);
        return redirect()->to('/akses');
    }
}
