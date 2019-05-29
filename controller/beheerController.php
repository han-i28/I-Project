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
        $data['title'] = "Eenmaal Andermaal - Rubriekenboom";
        $data['page'] = "beheerRubrieken";
        $this->set($data);
        $this->load_view("template_beheer");
    }
}

?>