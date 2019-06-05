<?php
class faqController extends Controller {

    function index() {
        $data['title'] = "Eenmaal Andermaal - Veel gestelde vragen";
        $data['page'] = "faq";
        $this->set($data);
        $this->load_view("template");
    }
}

?>