<?php

class aanbiedenController extends Controller
{
    function index()
    {
        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
            require(PATH . '/model/aanbiedenModel.php');

            if (isset($_POST['aanbieden_submit'])) {//when submitted
                $this->secure_form($_POST);//secure the form

                $errors = $this->checkForErrors();//check for invalid inputs

                if(!$errors) {
                    $aanbiedenModel = new aanbiedenModel();

                    $resultArrayVerkoper = $aanbiedenModel->getVerkoper($_SESSION['gebruikersnaam']);

                    if (empty($resultArrayVerkoper)) {
                        $data['error'] = "no_user_found";
                        header("Location: ". SITEURL . "/aanbieden");
                        exit();
                    } else {
                        $looptijdBegin = date("Y-m-d H:i:s");
                        $tempTijd = strtotime($looptijdBegin);
                        if ($_POST['looptijd'] == '3') {
                            $tempTijd = strtotime("+3 day", $tempTijd);
                        } elseif ($_POST['looptijd'] == '5') {
                            $tempTijd = strtotime("+5 day", $tempTijd);
                        } elseif ($_POST['looptijd'] == '7') {
                            $tempTijd = strtotime("+7 day", $tempTijd);
                        } else {
                            $data['error'] = "sql_error";
                            header("Location: ". SITEURL . "/aanbieden");
                            exit();
                        }
                        $looptijdEinde = date("Y-m-d H:i:s", $tempTijd);

                        $this->createVeiling($resultArrayVerkoper['postcode'], $resultArrayVerkoper['plaatsnaam'], $resultArrayVerkoper['GBA_CODE'], $looptijdBegin, $resultArrayVerkoper['gebruikersnaam'], $looptijdEinde);
                        $voorwerpArray = $aanbiedenModel->getVoorwerpnummer();
                        $this->uploadAfbeeldingen($voorwerpArray['voorwerpnummer']);
                    }



                } else {
                    header("location: " . SITEURL . "/aanbieden");
                }
            }
            $data['title'] = "Eenmaal Andermaal - Aanbieden";
            $data['page'] = "aanbieden";
            $this->set($data);
            $this->load_view("template");
        }
    }

    private function createVeiling($postcode, $plaatsnaam, $GBA_CODE, $looptijdBegin, $verkoper, $looptijdEinde){
        $aanbiedenModel = new aanbiedenModel();
        $veiling_data = array($voorwerpnummer, $_POST['titel'], $_POST['beschrijving'], $_POST['startprijs'],
            $_POST['betalingswijze'], $_POST['betalingsinstructie'], $postcode, $plaatsnaam, $GBA_CODE,
            $looptijdBegin, $_POST['verzendkosten'], $_POST['verzendinstructies'], $verkoper, $looptijdEinde, 0, $_POST['conditie']
        );
        $aanbiedenModel->voegVeilingToe($veiling_data);
    }

    private function uploadAfbeeldingen($voorwerpnummer) {
        $aanbiedenModel = new aanbiedenModel();
        $count = 0;
        $success = 0;
        $target_dir = "Assets/uploads/";

        foreach ($_FILES['fileToUpload']['name'] as $filename) {
            $temp = $target_dir;
            $tmp = $_FILES['fileToUpload']['tmp_name'][$count];
            $count = $count + 1;
            $temp = $temp . basename($filename);

//                        $temp = '';
//                        $tmp = '';


            $target_file = $target_dir . basename($filename);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image


            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check == false) {
                $data['afbeelding'] = "niet_een_afbeelding";
                $uploadOk = 0;
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                $data['afbeelding'] = "bestaat_al";
                $uploadOk = 0;
            }
            // Check filesize
            if ($_FILES['fileToUpload']['size'] > 50000000) {
                $data['afbeelding'] = "grootte";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                $data['afbeelding'] = "filetype";
                $uploadOk = 0;
            }
            //check if errors occurred
            if ($uploadOk == 0) {
                $data['afbeelding'] = "niet geupload";
            } else {
                if (move_uploaded_file($tmp, $temp)) {
                    $success += 1;
                    $aanbiedenModel->setAfbeelding($tmp, $voorwerpnummer);
                } else {
                    $data['afbeelding'] = "error";
                }
            }
        }


        if ($success == $count && $success !== 0){
            $data['aanbieden'] = "success";
        }
    }

    private function checkForErrors(){
        if (!isset($_POST['titel']) || !isset($_POST['beschrijving']) || !isset($_POST['startprijs']) || !isset($_POST['verzendinstructies']) || !isset($_POST['betalingswijze']) || !isset($_POST['looptijd']) || !isset($_POST['conditie'])) {
            $data['error_input'] = "empty_fields";
        } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $_POST['titel'])) { //				titel
            $data['error_input'] = "invalid_titel";
        } elseif (!preg_match("/^[a-zA-Z0-9-]*$/", $_POST['beschrijving'])) { //						beschrijving
            $data['error_input'] = "invalid_beschrijving";
        } elseif (!preg_match("/^[a-zA-Z0-9 -]*$/", $_POST['startprijs'])) { //				startprijs
            $data['error_input'] = "invalid_startprijs";
        } elseif (!preg_match("/^[a-zA-Z0-9-]*$/", $_POST['betalingsinstructie'])) { //						betalingsinstructie
            $data['error_input'] = "invalid_betalingsinstructie";
        } elseif (!preg_match("/^[a-zA-Z0-9-]*$/", $_POST['verzendkosten'])) { //						verzendkosten
            $data['error_input'] = "invalid_verzendkosten";
        } elseif (!preg_match("/^[a-zA-Z0-9-]*$/", $_POST['verzendinstructies'])) { //						verzendinstructies
            $data['error_input'] = "invalid_verzendinstructies";
        }
        return empty($data['error_input']);//if no errors returns true
    }
}
