<?php


class Controller
{
    //laeme mudeli, load model
    public function model($model){
        //l@hme indeks failist valja ja app kausta.. ja edasi ja kui on model siis..
        require_once '../app/models/'.$model.'.php';
        return new $model();
    }
    //load view, lae vaade
    //kui data ei tule, siis ta j@etakse tyhjaks arrayks
    public function view($view, $data = array()){
        //l@hme indeks failist v@lja app kausta, views kausta
        if (file_exists('../app/views')){
            //juhul kui selline fail on olemas tuleb see kasututslee v6tta
            require_once '../app/views/'.$view.'.php';
        } else {
            die('View '.$view.' does not exist<br>');
        }
    }
}