<?php
class accountController extends Controller {

    function index() {
        $data['title'] = "Eenmaal Andermaal - verkopen";
        $data['page'] = "error_404";
        $this->set($data);
        $this->load_view("template");
    }
}
?>