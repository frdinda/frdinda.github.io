<?php

class Data_Siswa extends Controller{
    public function index(){
        $data['judul'] = 'Data Siswa';
        $data['siswa'] = $this->model('DataSiswa_model')->getAllDataSiswa();
        $this->view('templates/header', $data);
        $this->view('data_siswa/index', $data);
        $this->view('templates/footer');
    }
    
    public function detail(){
        $data['siswa'] = $this->model('DataSiswa_model')->getDataSiswaById($_POST['id']);
        echo json_encode($data);
    }

    public function tambah_data(){
        if($this->model('DataSiswa_model')->tambahDataSiswa($_POST) > 0){
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' .BASEURL. '/data_siswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' .BASEURL. '/data_siswa');
            exit;
        }
    }

    public function getUbah(){
        echo json_encode($this->model('DataSiswa_model')->getDataSiswaById($_POST['id']));
    }

    public function ubah_data(){
        if($this->model('DataSiswa_model')->ubahDataSiswa($_POST) > 0){
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' .BASEURL. '/data_siswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' .BASEURL. '/data_siswa');
            exit;
        }
    }

    public function hapus_data($id){
        if($this->model('DataSiswa_model')->hapusDataSiswa($id) > 0){
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' .BASEURL. '/data_siswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' .BASEURL. '/data_siswa');
            exit;
        }
    }

}

?>