<?php

class searchController extends Controller {
    function index() {
        require('../Models/searchModel.php');
        $searchModel = new searchModel();
        if(isset($_GET['search'])){
            $input = $_GET['search'];
            $data['html'] =  $this->generate_searchresults("Zoekresultaten", $searchModel->getResults($input));

            $data['title'] = "Eenmaal Andermaal - Zoekresultaten";
            $data['page'] = "search";
            $this->set($data);
            $this->load_view("template");
        }
    }  
}

?>