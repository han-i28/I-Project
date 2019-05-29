<?php
class registrerenController extends Controller {
    function index() {
        if(!isset($_SESSION['loggedIn'])) {
        require(PATH . '/model/registratieModel.php');
        $registratieModel = new registratieModel();
        if (isset($_POST['signup_submit'])) {

            $this->secure_form($_POST);
            $rating = 0;
            $isGeblokkeerd = 0;

            if (!defined($_POST['gebruikersnaam']) || !defined($_POST['voornaam']) || !defined($_POST['achternaam']) || !defined($_POST['adresregel_1']) || !defined($_POST['postcode']) || !defined($_POST['plaatsnaam']) || !defined($_POST['geboortedatum']) || !defined($_POST['telefoonnummer']) || !defined($_POST['mailbox']) || !defined($_POST['wachtwoord']) || !defined($_POST['wachtwoord_bevestigen']) || !defined($_POST['beveiligingsvraag']) || !defined($_POST['antwoordtekst'])) {
                $data['error_input'] = "empty_fields";
                header("Location: ../registreren");
                exit();
            } elseif (!filter_var($_POST['mailbox'], FILTER_VALIDATE_EMAIL)) { //					mailbox validate
                $data['error_input'] = "invalid_mail";
                header("Location: ../registreren");
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $_POST['gebruikersnaam'])) { //				gebruikersnaam
                $data['error_input'] = "invalid_username";
                header("Location: ../registreren");
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9-]*$/", $_POST['voornaam'])) { //						voornaam
                $data['error_input'] = "invalid_voornaam";
                header("Location: ../registreren");
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9 -]*$/", $_POST['tussenvoegsel'])) { //				tussenvoegsel
                $data['error_input'] = "invalid_tussenvoegsel";
                header("Location: ../registreren");
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9-]*$/", $_POST['achternaam'])) { //					achternaam
                $data['error_input'] = "invalid_achternaam";
                header("Location: ../registreren");
                exit();
			} elseif (!preg_match("/^[a-zA-Z]+\ +[0-9]+$/", $_POST['adresregel_1'])) { //			adres 1 pregmatch
				$data['error_input'] = "invalid_adres1";
                header("Location: ../registreren");
                exit();
            } elseif (!preg_match("/^[a-zA-Z]+\ +[0-9]+$/", $_POST['adresregel_2'])) { //			adres 2 pregmatch
				$data['error_input'] = "invalid_adres2";
                header("Location: ../registreren");
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $_POST['postcode'])) { //						postcode
                $data['error_input'] = "invalid_postcode";
                header("Location: ../registreren");
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $_POST['plaatsnaam'])) { //					plaatsnaam
                $data['error_input'] = "invalid_plaatsnaam";
                header("Location: ../registreren");
                exit();
			} elseif (!defined($_POST['geboortedatum']) || $_POST['geboortedatum'] == '0000-00-00') { //			geboortedatum empty check
				$data['error_input'] = "empty_fields";
                header("Location: ../registreren");
                exit();
			} elseif ((floor((time() - strtotime($_POST['geboortedatum']))/31556926))<12) { //		geboortedatum check
				$data['error_input'] = "age_restriction";
                header("Location: ../registreren");
                exit();
            } elseif (!preg_match("/^[0-9]*$/", $_POST['telefoonnummer'])) { //							telefoonnummernummer
                $data['error_input'] = "invalid_telefoonnummernummer";
                header("Location: ../registreren");
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9!@#$%^&*]*$/", $_POST['wachtwoord'])) { //			password
                $data['error_input'] = "invalid_password";
                header("Location: ../registreren");
                exit();
            } elseif (strlen($_POST['wachtwoord']) < 8) { //											wachtwoord lengte check
                $data['error_input'] = "invalid_password";
                header("Location: ../registreren");
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9!@#$%^&*]*$/", $_POST['wachtwoord_bevestigen'])) { //	password repeat
                $data['error_input'] = "invalid_password_repeat";
                header("Location: ../registreren");
                exit();
            } elseif ($_POST['wachtwoord'] !== $_POST['wachtwoord_bevestigen']) { //								password repeat
                $data['error_input'] = "invalid_password_repeat";
                header("Location: ../registreren");
                exit();
            } else {
                $registratieModel = new registratieModel();
                $resultArray = $registratieModel->getGebruikersnaamCheck($_POST['gebruikersnaam']);
                if (empty($resultArray)) { //al in database check
                    $hashedPwd = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);
                    $vkey = password_hash(time() . $_POST['gebruikersnaam'], PASSWORD_DEFAULT);
                    $registratieModel->setSignupUser($_POST['gebruikersnaam'], $_POST['voornaam'], $_POST['tussenvoegsel'], $_POST['achternaam'], $_POST['adresregel_1'], $_POST['adresregel_2'], $_POST['postcode'], $_POST['plaatsnaam'], $land_id, $_POST['geboortedatum'], $_POST['telefoonnummer'], $_POST['mailbox'], $hashedPwd, $_POST['beveiligingsvraag'], $_POST['antwoordtekst'], $rating, $vkey);

                    // mailbox setup
                    $url = "iproject28.icasites.nl/login?vkey=" . $vkey; //VERVANGEN

                    $to = $_POST['mailbox'];
                    $subject = 'Verificatie registratie Eenmaal Andermaal';

                    $message = '<p>U heeft een account aangemaakt op de website van EenmaalAndermaal. Klik op de link hieronder om uw registratie te voltooien.</p>';
                    $message .= '<p>Hier is uw verificatie link: </br>';
                    $message .= '<a href="' . $url . '">Registratie voltooien</a></p>';

                    $headers = "From: Eenmaal Andermaal <noreply@EenmaalAndermaal.com>\r\n";
                    $headers .= "Reply-To: noreply@EenmaalAndermaal.com\r\n";
                    $headers .= "Content-type: text/html\r\n";

                    mail($to, $subject, $message, $headers);

                    $data['registration'] = "success";
                    header("Location: ../registreren");
                    exit();
                } else {
                    $data['error_input'] = "username_taken";
                    header("Location: ../registreren");
                    exit();
                }

            }
        }

        $data['vragen'] = $this->createVragenHTML($registratieModel->getVragenLijst());
        $data['title'] = "Eenmaal Andermaal - Registreren";
        $data['page'] = "userregistreren";
        $this->set($data);
        $this->load_view("template");
        } else {
            header("location: " . SITEURL . "");
        }
    }

    public function verificatie(){
        //verifieren
        //vergelijk get vkey met db vkeys
    }

    private function createVragenHTML($data) {
        $html = '';

        foreach($data as $value) {
            $html .= '<option value="' . $value['id'] . '">' . $value['beveiligingsvraag'] . '</option>';
        }
        return $html;
    }

}
