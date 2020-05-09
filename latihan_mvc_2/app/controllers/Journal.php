<?php

class Journal extends Controller{
    public function index(){
        $data['journal'] = $this->model('Journal_model')->getAllDataJournal();
        $this->view('templates/header');
        $this->view('journal/index', $data);
        $this->view('templates/footer');
    }

    public function detail(){
        $data['journal'] = $this->model('Journal_model')->getDataJournalById($_POST['id']);
        echo json_encode($data);
    }

    public function tambah_data(){
        if($this->model('Journal_model')->tambahDataJournal($_POST) > 0){
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' .BASEURL. '/journal');
            exit;
        }else{
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' .BASEURL. '/journal');
            exit;
        }
    }

    public function ubah_data(){
        if($this->model('Journal_model')->ubahDataJournal($_POST) > 0){
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' .BASEURL. '/journal');
            exit;
        }else{
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' .BASEURL. '/journal');
            exit;
        }
    }

    public function hapus_data($id){
        if($this->model('Journal_model')->hapusDataJournal($id) > 0){
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' .BASEURL. '/journal');
            exit;
        }else{
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' .BASEURL. '/journal');
            exit;
        }
    }
}

?>