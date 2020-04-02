<?php

class Home extends Controller{
    public function index(){
        if(!isset($_SESSION['login'])){
            header('Location: ' .BASEURL. '/login');
            exit;
            //gamau
        }else{
            $data['judul'] = 'Home';
            $this->view('home/index', $data);
        }
    }
}

?>
