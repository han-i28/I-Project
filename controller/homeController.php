<?php

class homeController extends Controller {
    function index() {
        require(PATH . '/model/homeModel.php');

        $homeModel = new homeModel();

        $data['html']  =  $this->generate_section("Voor jou", $homeModel->getVoorwerp());
        $data['html'] .=  $this->generate_section("Auto's", $homeModel->getVoorwerp());
        $data['html'] .=  $this->generate_section("Antiek", $homeModel->getVoorwerp());
        $data['html'] .=  $this->generate_section("Fietsen", $homeModel->getVoorwerp());

        $categorieen = $homeModel->getRubrieken();
        $data['rubriekenHTML'] = $this->createCategorieHTML($categorieen);

        $data['title'] = "Eenmaal Andermaal - homepage";
        $data['page'] = "home";

        $this->set($data);
        $this->load_view("template");

    }

    private function createCategorieHTML($rows) {
        $items = $rows;
        $html = "";
        $id = '';

        foreach ($items as $item) {
            if ($item['parent'] == -1) {
                $id = $item['ID'];
                $html .= "<li class=\"uk-parent\"><a href='" . SITEURL . "veiling/zoekopdracht/?rubriek=" . $item['ID'] . "'>" . $item['naam'] . "</a>";
                $html .= "<ul class=\"uk-nav-sub\" aria-hidden=\"false\">";
                $html .= $this->createSubCategorie($items, $id);
                $html .= "</ul>";
                $html .= "</li>";
            }
        }
        return $html;
    }

    private function createSubCategorie($items, $id) {
        $html = "";

        foreach ($items as $item) {
            if ($item['parent'] == $id) {
                $html .= "<ul>";
                $html .= "<li class=\"uk-parent\"><a href='" . SITEURL . "veiling/zoekopdracht/?rubriek=" . $item['ID'] . "'>" . $item['naam'] . "</a></li>";
                $html .= $this->createSubCategorie($items, $item['ID']);
                $html .= "</ul>";
            }
        }

        return $html;
    }
}

?>