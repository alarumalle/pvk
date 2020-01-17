<?php


class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    public function __construct()
    {
        $url = $this->getUrl();
        // controller
        if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        require_once '../app/controllers/'.$this->currentController.'.php';
        $this->currentController = new $this->currentController;
        // method
        if(method_exists($this->currentController, $url[1])){
            $this->currentMethod = $url[1];
            unset($url[1]);
        }

        echo '<pre>';
        print_r($url);
        echo '</pre>';
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = $_GET['url'];
            $url = rtrim($url, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}