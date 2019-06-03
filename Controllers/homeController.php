<?php

class homeController extends Controller {
    function index() {
        require('../Models/homeModel.php');
        $homeModel = new homeModel();

       $data['html'] =  $this->generate_section("Voor jou", $homeModel->getVoorwerp());
       $data['html'] .=  $this->generate_section("Auto's", $homeModel->getVoorwerp());
       $data['html'] .=  $this->generate_section("Antiek", $homeModel->getVoorwerp());
       $data['html'] .=  $this->generate_section("Fietsen", $homeModel->getVoorwerp());

        

        $data['title'] = "Eenmaal Andermaal - testtitle";
        $data['page'] = "index";
        $this->set($data);
        $this->load_view("template");
    }
}

?>