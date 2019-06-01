<?php
class beheerController extends Controller {
    function index() {
        $data['title'] = "Eenmaal Andermaal - beheer ";
        $data['page'] = "beheer";
        $this->set($data);
        $this->load_view("template_beheer");
    }

    function blokkeer_gebruiker() {
//        if($_SESSION['loggedIn'] == true && $_SESSION['beheerder'] == true) {
            require(PATH . '/model/beheerModel.php');
            $beheerModel = new beheerModel();
            if (isset($_GET['gebruiker']) && isset($_GET['status'])) {
                $gebruikersID = $_GET['gebruiker'];
                $isGeblokkeerd = $_GET['status'];
                $beheerModel->blokkeerGebruiker($gebruikersID, $isGeblokkeerd);
                header('location: ./');
            } else {
                $data['gebruikers'] = $beheerModel->getAllGebruikers();
                $data['title'] = "Eenmaal Andermaal - Blokkeer gebruiker ";
                $data['page'] = "blokkeerGebruiker";
                $this->set($data);
                $this->load_view("template_beheer");
            }
//        } else {
//            header("location: " . SITEURL . "");
//        }
    }

    function blokkeer_veiling() {
//        if($_SESSION['loggedIn'] == true && $_SESSION['beheerder'] == true) {
            require(PATH . '/model/beheerModel.php');
            $beheerModel = new beheerModel();
            if (isset($_GET['veiling'])) {
                $veilingID = $_GET['veiling'];
                $beheerModel->blokkeerVeiling($veilingID);
                header('location: ./');
            } else {
                $data['veilingen'] = $beheerModel->getAllVeilingen();
                $data['title'] = "Eenmaal Andermaal - Blokkeer veiling";
                $data['page'] = "blokkeerVeiling";
                $this->set($data);
                $this->load_view("template_beheer");
            }
//        } else {
//            header("location: " . SITEURL . "");
//        }
    }

    function rubriekenboom() {
        require(PATH . '/model/beheerModel.php');
        $data['title'] = "Eenmaal Andermaal - Rubriekenboom";
        $data['page'] = "beheerRubrieken";
        $beheerModel = new beheerModel();

        $categorieen = $beheerModel->getAllCategorieen();
        $data['rubriekenHTML'] = $beheerModel->createcategorieen($categorieen);

        $this->set($data);
        $this->load_view("template_beheer");
    }

    function bewerk() {
        if(isset($_GET['rubriek'])) {
            $id = $_GET['rubriek'];
            require(PATH . '/model/beheerModel.php');
            $beheerModel = new beheerModel();
            $result = $beheerModel->getAllOfRubriekByID($id);
            $childrenResult = $beheerModel->getChildrenByID($id);
            $parentResult = $beheerModel->getParentByID($result[0]['parent']);
            $children = $beheerModel->createChildren($childrenResult);
            
            if(empty($result)) {
                echo 'rubriek bestaat niet';
            } else {
                $data['rubriek'] = $result;
                $data['children'] = $children;
                if(empty($parentResult)){
                    $data['parent'] = null;
                } else {
                    $data['parent'] = $parentResult;
                }

                $data['title'] = "Eenmaal Andermaal - Bewerk";
                $data['page'] = "beheerBewerk";
                $this->set($data);
                $this->load_view("template_beheer");
            }
        } else {
            header("location: .");//naar home
        }
    }
}

?>