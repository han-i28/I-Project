<?php
class registrerenController extends Controller {
    function index() {
        if(!isset($_SESSION['loggedIn'])) {//if logged in exit registration
            require(PATH . '/model/registratieModel.php');
            $registratieModel = new registratieModel();

            if (isset($_POST['signup_submit'])) {//when submitted
                $this->secure_form($_POST);//secure the form

                $errors = $this->checkForErrors($registratieModel);//check for invalid inputs
                print_r($data['error_input']);

                if(!$errors){//if no errors: continue with submitting user 
                    $hashedPwd = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);
                    $vkey = password_hash(time() . $_POST['gebruikersnaam'], PASSWORD_DEFAULT);
                    $rating = 0;
                    $land_id = 6030;
                    $isGeblokkeerd = 0;
                    $isBeheerder = 0;
                    
                    $this->createUser($hashedPwd, $vkey, $rating, $land_id, $isGeblokkeerd, $isBeheerder);

                    // mailbox setup

                    $checkGebruikerGeregistreerd = $registratieModel->getGebruikersnaamCheck($_POST['gebruikersnaam']);

                    if(!empty($checkGebruikerGeregistreerd)){
                        $data['registration'] = "succes";
                        $url = SITEURL . "registreren/verificatie/?vkey=" . $vkey; //VERVANGEN

                        $mailSent = false;
                        for($i=0; $i < 10; $i++){//try to send mail 3 times
                            if($this->sendVerificationEmail($url, $_POST['mailbox'])){
                                $mailSent = true;
                                break;
                            }else{
                                sleep(0.5);//wait for retry
                            }
                        }
                    }else{
                        $data['registration'] = "error-unknown";//user could not be added
                    }

                    if(!$mailSent){
                        $data['registration'] = "mail-error";//upon failing 10 times, send mail error
                    }
                }
            }

            $data['vragen'] = $this->createVragenHTML($registratieModel->getVragenLijst());
            $data['title'] = "Eenmaal Andermaal - Registreren";
            $data['page'] = "userregistreren";
            $this->set($data);
            $this->load_view("template");

        } else {//if logged in
            header("location: " . SITEURL . "");
        }
    }

    private function sendVerificationEmail($url, $to){
        $subject = 'Verificatie registratie Eenmaal Andermaal';

        $message = '<p>U heeft een account aangemaakt op de website van EenmaalAndermaal. Klik op de link hieronder om uw registratie te voltooien.</p>';
        $message .= '<p>Hier is uw verificatie link: </br>';
        $message .= '<a href="' . $url . '">Registratie voltooien</a></p>';

        $headers = "From: Eenmaal Andermaal <noreply@EenmaalAndermaal.com>\r\n";
        $headers .= "Reply-To: noreply@EenmaalAndermaal.com\r\n";
        $headers .= "Content-type: text/html\r\n";

        try{
            return (mail($to, $subject, $message, $headers));
        }catch(Exception $e){
            return false;
        }
    }

    public function verificatie(){
        if (isset($_GET["vkey"])) {        //VERANDEREN
            $vkey = $_GET['vkey'];
            require(PATH . '/model/registratieModel.php');
            $registratieModel = new registratieModel();
            $resultArray = $registratieModel->getVkeyCheck($vkey);  
            echo $resultArray;
            if(empty($resultArray)) {
                $data['message'] = '<div class="uk-alert-danger uk-margin-top" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Dit account is niet geldig of al geverifieerd.</div>';
            } else {
                $registratieModel->setVerification($vkey);
                $data['message'] = '<div class="uk-alert-success uk-margin-top" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Uw account is nu geverifieerd. U kunt nu <a href="../login">inloggen</a></div>';
            }
        }

        $data['title'] = "Eenmaal Andermaal - verificatie";
        $data['page'] = "verificatie";
        $this->set($data);
        $this->load_view("template");
    }

    private function createVragenHTML($data) {
        $html = '';

        foreach($data as $value) {
            $html .= '<option value="' . $value['id'] . '">' . $value['beveiligingsvraag'] . '</option>';
        }
        return $html;
    }

    private function createUser($hashedPwd, $vkey, $rating, $land_id, $isGeblokkeerd, $isBeheerder){
        $registratieModel = new registratieModel();

        $user_data = array($_POST['gebruikersnaam'], $_POST['voornaam'], $_POST['tussenvoegsel'],
        $_POST['achternaam'], $_POST['adres_1'], $_POST['adres_2'], $_POST['postcode'], $_POST['plaatsnaam'],
        $land_id, $_POST['geboortedatum'], $_POST['telefoonnummer'], $_POST['mailbox'], $hashedPwd,
        $_POST['beveiligingsvraag'], $_POST['antwoordtekst'], $rating, $isGeblokkeerd, $isBeheerder, $vkey);

        $registratieModel->setSignupUser($user_data);
    }

    private function checkForErrors($registratieModel){
        if (!isset($_POST['gebruikersnaam']) || !isset($_POST['voornaam']) || !isset($_POST['achternaam']) || !isset($_POST['adres_1']) || !isset($_POST['postcode']) || !isset($_POST['plaatsnaam']) || !isset($_POST['geboortedatum']) || !isset($_POST['telefoonnummer']) || !isset($_POST['mailbox']) || !isset($_POST['wachtwoord']) || !isset($_POST['wachtwoord_bevestigen']) || !isset($_POST['beveiligingsvraag']) || !isset($_POST['antwoordtekst'])) {
            $data['error_input'] = "empty_fields";
        } elseif (!filter_var($_POST['mailbox'], FILTER_VALIDATE_EMAIL)) { //					mailbox validate
            $data['error_input'] = "invalid_mail";
        } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $_POST['gebruikersnaam'])) { //				gebruikersnaam
            $data['error_input'] = "invalid_username";
        } elseif (!preg_match("/^[a-zA-Z0-9-]*$/", $_POST['voornaam'])) { //						voornaam
            $data['error_input'] = "invalid_voornaam";
        } elseif (!preg_match("/^[a-zA-Z0-9 -]*$/", $_POST['tussenvoegsel'])) { //				tussenvoegsel
            $data['error_input'] = "invalid_tussenvoegsel";
        } elseif (!preg_match("/^[a-zA-Z0-9-]*$/", $_POST['achternaam'])) { //					achternaam
            $data['error_input'] = "invalid_achternaam";
        } elseif (!preg_match("/^[a-zA-Z]+\ +[0-9]+$/", $_POST['adres_1'])) { //			adres 1 pregmatch
            $data['error_input'] = "invalid_adres1";
        } elseif (isset($_POST['adresregel_2'])&&!preg_match("/^[a-zA-Z]+\ +[0-9]+$/", $_POST['adres_2'])) { //			adres 2 pregmatch
            $data['error_input'] = "invalid_adres2";
        } elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $_POST['postcode'])) { //						postcode
            $data['error_input'] = "invalid_postcode";
        } elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $_POST['plaatsnaam'])) { //					plaatsnaam
            $data['error_input'] = "invalid_plaatsnaam";
        } elseif (!isset($_POST['geboortedatum']) || $_POST['geboortedatum'] == '0000-00-00') { //			geboortedatum empty check
            $data['error_input'] = "empty_fields";
        } elseif ((floor((time() - strtotime($_POST['geboortedatum']))/31556926))<12) { //		geboortedatum check
            $data['error_input'] = "age_restriction";
        } elseif (!preg_match("/^[0-9]*$/", $_POST['telefoonnummer'])) { //							telefoonnummernummer
            $data['error_input'] = "invalid_telefoonnummernummer";
        } elseif (!preg_match("/^[a-zA-Z0-9!@#$%^&*]*$/", $_POST['wachtwoord'])) { //			password
            $data['error_input'] = "invalid_password";
        } elseif (strlen($_POST['wachtwoord']) < 8) { //											wachtwoord lengte check
            $data['error_input'] = "invalid_password";
        } elseif (!preg_match("/^[a-zA-Z0-9!@#$%^&*]*$/", $_POST['wachtwoord_bevestigen'])) { //	password repeat
            $data['error_input'] = "invalid_password_repeat";
        } elseif ($_POST['wachtwoord'] !== $_POST['wachtwoord_bevestigen']) { //								password repeat
            $data['error_input'] = "invalid_password_repeat";
        } else {
            $resultArray = $registratieModel->getGebruikersnaamCheck($_POST['gebruikersnaam']);
            if(empty($resultArray)) $data['error_input'] = "username_taken";
        }

        return !isset($data['error_input']);//if no errors returns true
    }
}
