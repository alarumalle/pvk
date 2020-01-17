<?php


class Posts extends Controller
{

    /**
     * Posts constructor.
     */
    public function __construct()
    {
        echo 'Posts is loaded<br>';
    }

    public function edit($postId){
        echo 'edit method is loaded<br>';
        echo 'post '.$postId.' is edited<br>';
    }

    public function index() {
        echo 'index method is loaded<br>';
    }
}