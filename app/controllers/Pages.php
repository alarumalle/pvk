<?php


class Pages extends Controller
{
    /**
     * Pages constructor.
     */
    public function __construct()
    {
    }
//siit edasi view kausta edit vaatesse
    public function edit(){
        $this->view('pages/edit');
    }
//see aktiveerub kui index oleks meetod (see on default)
//kuna pages extends controller, siis me vaatame mida view teeb Controller.php klassist!!!
    public function index() {
        $data = array('title' => 'Pages controller is loaded');
        $this->view('pages/index', $data);
    }
}