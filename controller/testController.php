<?php
//require('../Config/core.php');
//require('../model/product_db.php');
//require('../model/category_db.php');
class testController extends Controller {

    function index() {
//        require('./model/homeModel.php');
//        $homeModel = new homeModel();
//        $result = $homeModel->getAll();;
//        print_R($result);
//        $data['tasks'] = $homeModel->getAll();

        $data['title'] = "Eenmaal Andermaal - home";
        $data['page'] = "home";
        $this->set($data);
        $this->load_view("template");
    }
}

?>