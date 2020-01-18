<?php


class Pages extends Controller
{
    /**
     * Pages constructor.
     */
    public function __construct()
    {
    }

    public function edit(){
        $this->view('pages/edit');
    }

    public function index() {
        $data = array('title' => 'Pages controller is loaded');
        $this->view('pages/index', $data);
    }
}