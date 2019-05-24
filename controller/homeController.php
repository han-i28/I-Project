<?php
//require('../Config/core.php');
//require('../model/product_db.php');
//require('../model/category_db.php');
class homeController extends Controller {

    function index() {
        require(PATH . '/model/homeModel.php');
        $homeModel = new homeModel();
        $categorieen = $homeModel->getRubrieken();

        $data['rubriekenHTML'] = $this->createCategorieHTML($categorieen);

        $data['title'] = "Eenmaal Andermaal - home";
        $data['page'] = "home";
        $this->set($data);
        $this->load_view("template");
    }

    private function createCategorieHTML($rows) {
        $items = $rows;
        $html = "";
        $id = '';

        foreach ($items as $item) {
            if ($item['Parent'] == -1) {
                $id = $item['ID'];
                $html .= "<li class=\"uk-parent\"><a href='/I-Project/veiling/zoekopdracht/?rubriek=" . $item['ID'] . "'>" . $item['Name'] . "</a>";
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
            if ($item['Parent'] == $id) {
                $html .= "<ul>";
                $html .= "<li class=\"uk-parent\"><a href='/I-Project/veiling/zoekopdracht/?rubriek=" . $item['ID'] . "'>" . $item['Name'] . "</a></li>";
                $html .= $this->createSubCategorie($items, $item['ID']);
                $html .= "</ul>";
            }
        }

        return $html;
    }
}
?>