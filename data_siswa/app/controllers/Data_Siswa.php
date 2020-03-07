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

}

?>