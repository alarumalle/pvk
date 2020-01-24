<?php


class Pages extends Controller
{
    /**
     * Pages constructor.
     */
    public function __construct()
//model osa 23012020
    {
        $this->pagesModel = $this->model('Page');
    }

    public function test()
    {
        $users = $this->pagesModel->getUsers();
        print_r($users);
    }

//23012020 lisatu lopp

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