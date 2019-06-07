<?php
class beheerController extends Controller {
    function index() {
        session_start();
        $data['title'] = "Eenmaal Andermaal - beheer ";
        $data['page'] = "beheer";
        $this->set($data);
        $this->load_view("template_beheer");
    }

    function blokkeer_gebruiker() {
        session_start();
        if($_SESSION['loggedIn'] && $_SESSION['isBeheerder']) {
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
       } else {
           header("location: " . SITEURL . "");
       }
    }

    function blokkeer_veiling() {
        session_start();
        if($_SESSION['loggedIn'] && $_SESSION['isBeheerder']) {
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
       } else {
           header("location: " . SITEURL . "");
       }
    }

    function rubriekenboom() {
        session_start();    
        if($_SESSION['loggedIn'] && $_SESSION['isBeheerder']) {
            require(PATH . '/model/beheerModel.php');
            $data['title'] = "Eenmaal Andermaal - Rubriekenboom";
            $data['page'] = "beheerRubrieken";
            $beheerModel = new beheerModel();

            $categorieen = $beheerModel->getAllCategorieen();
            $data['rubriekenHTML'] = $beheerModel->createcategorieen($categorieen);

            $this->set($data);
            $this->load_view("template_beheer");
        }
        else {
            header("location: " . SITEURL . "");
        }
    }

    function bewerk() {
        session_start();
        if($_SESSION['loggedIn'] && $_SESSION['isBeheerder']){
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
                    $data['parentrubrieken'] = $beheerModel->createParents();
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
        
        //changes the name of a category
        $bewerkNaam_naam = strip_tags((isset($_POST['bewerkNaam']) ? $_POST['bewerkNaam'] : null));
        if(isset($_POST['bewerkNaam_submit'])){
            if(empty($bewerkNaam_naam)){
                $data['error_input'] = 'empty_field';
            } else {                        
                $result = $beheerModel->bewerkNaam($bewerkNaam_naam, $this->vars['rubriek'][0]['ID']);
                echo "<meta http-equiv='refresh' content='0'>";
            }
        }
        
        //creates a new category
        $nieuweRubriek_naam = strip_tags((isset($_POST['voegToe']) ? $_POST['voegToe'] : null));
        if(isset($_POST['voegToe_submit'])){
            if(empty($nieuweRubriek_naam)){
                $data['error_input'] = 'empty_field';
            } else {
                $result = $beheerModel->voegToe($nieuweRubriek_naam, $this->vars['rubriek'][0]['ID']);
                echo "<meta http-equiv='refresh' content='0'>";
            }
        }

        //changes the parent of a category
        $nieuweParent_naam = strip_tags((isset($_POST['nieuweParent']) ? $_POST['nieuweParent'] : null));
        if(isset($_POST['nieuweParent_submit'])){
            if(empty($nieuweParent_naam)){
                $data['error_input'] = 'empty_field';
            } else {
                $result = $beheerModel->nieuweParent($nieuweParent_naam, $this->vars['rubriek'][0]['ID']);
                echo "<meta http-equiv='refresh' content='0'>";
            }
        }
    }
}

?>