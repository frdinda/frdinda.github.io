<?php

//App.php ini untuk ngerapihin URL

class App{
    protected $controller = 'Data_Siswa';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->parseURL();
        //ngambil nama controller dari url yang ditulis user

        if(file_exists('../app/controllers/' .$url[0]. '.php')){
            $this->controller = $url[0];
            unset($url[0]);
        }
        //ini untuk liat apa file controllersnya ada atau nggak

        require_once '../app/controllers/' .$this->controller. '.php';
        $this->controller = new $this->controller;

        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        //ini untuk liat apa methodnya ada atau nggak

        if(!empty($url)){
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
        //call file sesuai dengan controller, method, dan paramsnya. dia yang manggil file sesuai controller/methodnya. method tuh yang ada di dalem file controllernya.
    }

    public function parseURL(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }

}

?>