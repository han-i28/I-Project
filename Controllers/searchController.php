<?php

class searchController extends Controller {
    function index() {
        require('../Models/searchModel.php');
        $searchModel = new searchModel();

        $data['html'] =  $this->generate_section("Zoekresultaten", $searchModel->getResults());
    

        $data['title'] = "Eenmaal Andermaal - testtitle";
        $data['page'] = "zoekresultaten";
        $this->set($data);
        $this->load_view("template");
    }
}

?>