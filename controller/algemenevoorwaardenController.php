<?php
class algemenevoorwaardenController extends Controller {

    function index() {
        $data['title'] = "Eenmaal Andermaal - Algemene voorwaarden";
        $data['page'] = "algemenevoorwaarden";
        $this->set($data);
        $this->load_view("template");
    }
}

?>