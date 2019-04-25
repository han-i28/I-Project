<?php

class homeController extends Controller
{
    function index()
    {
        require('../Models/homeModel.php');
        $homeModel = new homeModel();

        $data['tasks'] = $homeModel->getAll();

        $data['page'] = "home";
        $this->set($data);
        $this->load_view("template");
    }
}

?>