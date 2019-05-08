<?php

class productController extends Controller {
    function index() {
        $data['page'] = "product";
        $this->set($data);
        $this->load_view("template");
    }

    function view($par = null) {
        echo $par;
    }
}

?>