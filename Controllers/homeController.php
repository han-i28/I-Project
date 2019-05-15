<?php

class homeController extends Controller {
    function index() {
//        require('../Models/homeModel.php');
//        $homeModel = new homeModel();
//
//        $data['tasks'] = $homeModel->getAll();

        $data['title'] = "Eenmaal Andermaal - testtitle";
        $data['page'] = "index";
        $this->set($data);
        $this->load_view("template");
    }
}

?>