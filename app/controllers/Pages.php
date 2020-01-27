<?php


class Pages extends Controller
{
    /**
     * Pages constructor.
     */
    public function __construct()
//model osa 23012020
    {
    }

    public function index() {
        $data = array('title' => 'Pages controller is loaded');
        $this->view('pages/index', $data);
    }
}