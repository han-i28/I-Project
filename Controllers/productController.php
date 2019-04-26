<?php

class productController extends Controller
{
    //public = kan gezien worden op site, private = kan niet gezien worden op site en kan hier gebruikt worden.
    function index()
    {
        $data['page'] = "product";
        $this->set($data);
        $this->load_view("template");
    }

    function view($par = null) {
        print_R($_GET['test']);
//        echo $par;
        $data['page'] = "product";
        $this->set($data);
        $this->load_view("template");
    }

    private function show() {
        echo '<br>cool';
    }
}

?>