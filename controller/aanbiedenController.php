<?php

class registrerenController extends Controller
{
    function index()
    {
        if (!isset($_SESSION['loggedIn'])) {//if logged in return exit registration
            require(PATH . '/model/aanbiedenModel.php');
            $aanbiedenModel = new aanbiedenModel();

            if (isset($_POST['aanbieden_submit'])) {//when submitted
                $this->secure_form($_POST);//secure the form


                $titel = $_POST["titel"];
                $beschrijving = $_POST["beschrijving"];
                $startprijs = $_POST["startprijs"];
                $betalingswijze = $_POST["betalingswijze"];
                $betalingsinstructie = $_POST["betalingsinstructie"];
                $verzendkosten = $_POST["verzendkosten"];
                $looptijd = $_POST["looptijd"];
                $conditie = $_POST["conditie"];

//                echo $titel;
//                echo $beschrijving;
//                echo $startprijs;
//                echo $betalingswijze;
//                echo $betalingsinstructie;
//                echo $verzendkosten;
//                echo $looptijd;
//                echo $conditie;
                $count = 0;
                $target_dir = "Assets/uploads/";

                foreach ($_FILES['fileToUpload']['name'] as $filename) {
                    $size = ($_FILES['fileToUpload']['size']);
                    $temp = $target_dir;
                    $tmp = $_FILES['fileToUpload']['tmp_name'][$count];
                    $count = $count + 1;
                    $temp = $temp . basename($filename);
                    move_uploaded_file($tmp, $temp);
                    $temp = '';
                    $tmp = '';


                    $target_file = $target_dir . basename($filename);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

                    if (isset($_POST["submit"])) {
                        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                        if ($check !== false) {
                            echo "File is an image - " . $check["mime"] . ".";
                            $uploadOk = 1;
                        } else {
                            echo "File is not an image.";
                            $uploadOk = 0;
                        }
                    }
                }
// Check if file already exists
                /*if (file_exists($target_file)) {
                    echo "sorry, het bestand bestaat al.";
                    $uploadOk = 0;
                }*/
// Check file size
//if ($size > 50000000) {
//  echo "Sorry, het bestand is te groot.";
// $uploadOk = 0;
//}
// Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif") {
                    echo "Sorry, alleen JPG, JPEG, PNG & GIF bestanden zijn toegestaan.";
                    $uploadOk = 0;
                }
// Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, you foto was niet geupload.";
// if everything is ok, try to upload file
                }/* else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, er was een fout tijdens het uploaden.";
    }
}*/
                $data['title'] = "Eenmaal Andermaal - Aanbieden";
                $data['page'] = "aanbieden";
                $this->set($data);
                $this->load_view("template");
            } else {
                header("location: " . SITEURL . "");
            }
        }
    }

    private function createVeiling(...){
        $aanbiedenModel = new aanbiedenModel();

        //Wat moet er nog gebeuren:
        // Voorwerpnummer, postcode, plaatsnaam, GBA_CODE, looptijdBegin, verkoper, koper, looptijdEinde, veilingGesloten

        $user_data = array($_POST['titel'], $_POST['beschrijving'], $_POST['startprijs'],
            $_POST['betalingswijze'], $_POST['betalingsinstructie'], $_POST['verzendkosten'], $_POST['looptijd'], $_POST['conditie'],
            ...);

        $aanbiedenModel->setVeiling($user_data);
    }

//    private function checkForErrors($registratieModel){
//        if (!isset($_POST['titel']) || !isset($_POST['beschrijving']) || !isset($_POST['startprijs']) || !isset($_POST['betalingswijze']) || !isset($_POST['looptijd']) || !isset($_POST['conditie'])) {
//            $data['error_input'] = "empty_fields";
//        } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $_POST['titel'])) { //				titel
//            $data['error_input'] = "invalid_titel";
//        } elseif (!preg_match("/^[a-zA-Z0-9-]*$/", $_POST['beschrijving'])) { //						beschrijving
//            $data['error_input'] = "invalid_beschrijving";
//        } else (!preg_match("/^[a-zA-Z0-9 -]*$/", $_POST['startprijs'])) { //				startprijs
//            $data['error_input'] = "invalid_startprijs";
//        }
//        return empty($data['error_input']);//if no errors returns true
//    }
}
