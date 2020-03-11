<?php

class Home extends Controller{
    public function index(){
        if(isset($_SESSION['login'])){
            $data['judul'] = 'Home';
            $this->view('home/index', $data);
        }else{
            header('Location: ' .BASEURL. '/login');
        }
    }
}

?>