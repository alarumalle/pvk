<?php


class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = array(); //loome tyhja array
    public function __construct()
    {
        $url = $this->getUrl();
        // controller, mis kontrollib kas nait /pages eksisteerib
        if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
            $this->currentController = ucwords($url[0]);
//            siin unsetime nait pages controlleri
            unset($url[0]);
        }
        require_once '../app/controllers/'.$this->currentController.'.php';
        $this->currentController = new $this->currentController; //siin kaidi kontrollers kausta mingis failis .php ja tehti seal olevad konstruktor!
        // method
        if(method_exists($this->currentController, $url[1])){
            $this->currentMethod = $url[1];
//            siin unsetime nait add meetodi
            unset($url[1]);
        }
        // params
//        Lyhidalt kirja pandud IF lause: ? -> kas on olemas url, kui siis pane arraysse k6ik mis urlis j@rgi on (peale unseti)
        $this->params = $url ? array_values($url) : array();
        // call a callback function with url parameters - controller, method and params
//       php meetod siis v6tab parameetriteks - nait pages objekt, meetod add ja params on urli...osa?
//        kui controller on pages, siis currentMethod on add ja see kutsutakse valju paramsidega
        call_user_func_array(array($this->currentController, $this->currentMethod), $this->params);
//        see suunab flow selle objekti 6ige meetodi juurde, 6igete parameetritega!
//        siit edasi l@hme Pages.php faili ja see meetod k@ivitub, mis on 6ige!

    }

//        echo '<pre>';
//        print_r($url);
//        echo '</pre>';
//    }

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