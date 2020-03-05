<?php

class Home extends Controller{
    public function index($nama = 'adinda', $pekerjaan = 'pengangguran', $umur = '21'){
        $data['nama'] = $this->model('User_model')->getUser();
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = 'Home';
    
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}

?>