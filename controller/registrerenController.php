<?php
class registrerenController extends Controller {
    function index() {
        require(PATH . '/model/registratieModel.php');
        $registratieModel = new registratieModel();
        if (isset($_POST['signup_submit'])) {
            /************************* TEST CODE *********************************/
            /*
            print_r($_POST['uid']);
            print_r($_POST['voornaam']);
            print_r($_POST['tussenvoegsel']);
            print_r($_POST['achternaam']);
            print_r($_POST['adres_1']);
            print_r($_POST['adres_2']);
            print_r($_POST['postcode']);
            print_r($_POST['plaatsnaam']);
            print_r($_POST['land_id']);
            print_r($_POST['telefoon']);
            print_r($_POST['email']);
            print_r($_POST['wachtwoord']);
            print_r($_POST['wachtwoord_herhaal']);
            print_r($_POST['vraag']);
            print_r($_POST['antwoordtekst']);

            if (empty($_POST['uid']) || empty($_POST['voornaam']) || empty($_POST['tussenvoegsel']) || empty($_POST['achternaam']) || empty($_POST['adres_1']) || empty($_POST['adres_2']) || empty($_POST['postcode']) ||
            empty($_POST['plaatsnaam']) || empty($_POST['land_id']) || empty($_POST['telefoon']) || empty($_POST['email']) || empty($_POST['wachtwoord']) || empty($_POST['wachtwoord_herhaal']) ||
            empty($_POST['vraag']) || empty($_POST['antwoordtekst'])) {
            }
            */
            /*********************************************************************/

            $gebruikersnaam = strip_tags((isset($_POST['uid']) ? $_POST['uid'] : null));
            $voornaam = strip_tags((isset($_POST['voornaam']) ? $_POST['voornaam'] : null));
            $tussenvoegsel = strip_tags((isset($_POST['tussenvoegsel']) ? $_POST['tussenvoegsel'] : null));
            $achternaam = strip_tags((isset($_POST['achternaam']) ? $_POST['achternaam'] : null));
            $adresregel_1 = strip_tags((isset($_POST['adres_1']) ? $_POST['adres_1'] : null));
            $adresregel_2 = strip_tags((isset($_POST['adres_2']) ? $_POST['adres_2'] : null));
            $postcode = strip_tags((isset($_POST['postcode']) ? $_POST['postcode'] : null));
            $plaatsnaam = strip_tags((isset($_POST['plaatsnaam']) ? $_POST['plaatsnaam'] : null));
            $land_id = 6030;
            $geboortedatum = strip_tags((isset($_POST['geboortedatum']) ? $_POST['geboortedatum'] : null));
            $telefoon = strip_tags((isset($_POST['telefoon']) ? $_POST['telefoon'] : null));
            $mailbox = strip_tags((isset($_POST['email']) ? $_POST['email'] : null));
            $wachtwoord = strip_tags((isset($_POST['wachtwoord']) ? $_POST['wachtwoord'] : null));
            $wachtwoord_herhaal = strip_tags((isset($_POST['wachtwoord_herhaal']) ? $_POST['wachtwoord_herhaal'] : null));
            $vraag = strip_tags((isset($_POST['vraag']) ? $_POST['vraag'] : null));
            $antwoordtekst = strip_tags((isset($_POST['antwoordtekst']) ? $_POST['antwoordtekst'] : null));
            $rating = 0;

//            if(false) {
            if (empty($gebruikersnaam) || empty($voornaam) || empty($achternaam) || empty($adresregel_1) || empty($postcode) || empty($plaatsnaam) || empty($geboortedatum) || empty($telefoon) || empty($mailbox) || empty($wachtwoord) || empty($wachtwoord_herhaal) || empty($vraag) || empty($antwoordtekst)) {
                $data['error_input'] = "empty_fields";
            } elseif (!filter_var($mailbox, FILTER_VALIDATE_EMAIL)) { //					email validate
                $data['error_input'] = "invalid_mail";
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $gebruikersnaam)) { //				gebruikersnaam
                $data['error_input'] = "invalid_username";
            } elseif (!preg_match("/^[a-zA-Z0-9-]*$/", $voornaam)) { //						voornaam
                $data['error_input'] = "invalid_voornaam";
            } elseif (!preg_match("/^[a-zA-Z0-9 -]*$/", $tussenvoegsel)) { //				tussenvoegsel
                $data['error_input'] = "invalid_tussenvoegsel";
            } elseif (!preg_match("/^[a-zA-Z0-9-]*$/", $achternaam)) { //					achternaam
                $data['error_input'] = "invalid_achternaam";
            } elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $adresregel_1)) { //					adres 1
                $data['error_input'] = "invalid_adres";
			//} elseif (!preg_match("/^[a-zA-Z ]+[ \t]* \d [0-9a-z]*$/", $adresregel_1)) {
				//$data['error_input'] = "invalid_adres";
            } elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $adresregel_2)) { //					adres 2
                $data['error_input'] = "invalid_adres";
            } elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $postcode)) { //						postcode
                $data['error_input'] = "invalid_postcode";
            } elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $plaatsnaam)) { //					plaatsnaam
                $data['error_input'] = "invalid_woonplaats";
			} elseif (empty($geboortedatum) || $geboortedatum == '0000-00-00') { //			geboortedatum empty check
				$data['error_input'] = "empty_fields";
			} elseif ((floor((time() - strtotime($geboortedatum))/31556926))<12) { //		geboortedatum check
				$data['error_input'] = "age_restriction";
            } elseif (!preg_match("/^[0-9]*$/", $telefoon)) { //							telefoonnummer
                $data['error_input'] = "invalid_telefoonnummer";
            } elseif (!preg_match("/^[a-zA-Z0-9!@#$%^&*]*$/", $wachtwoord)) { //			password
                $data['error_input'] = "invalid_password";
            } elseif (strlen($wachtwoord) < 8) { //											wachtwoord lengte check
                $data['error_input'] = "invalid_password";
            } elseif (!preg_match("/^[a-zA-Z0-9!@#$%^&*]*$/", $wachtwoord_herhaal)) { //	password repeat
                $data['error_input'] = "invalid_password_repeat";
            } elseif ($wachtwoord !== $wachtwoord_herhaal) { //								password repeat
                $data['error_input'] = "invalid_password_repeat";
            } else {
                $registratieModel = new registratieModel();
                $resultArray = $registratieModel->getUidCheck($gebruikersnaam);
                if (empty($resultArray)) { //al in database check
                    $hashedPwd = password_hash($wachtwoord, PASSWORD_DEFAULT);
                    $result = $registratieModel->setSignupUser($gebruikersnaam, $voornaam, $tussenvoegsel, $achternaam, $adresregel_1, $adresregel_2, $postcode, $plaatsnaam, $land_id, $geboortedatum, $telefoon, $mailbox, $hashedPwd, $vraag, $antwoordtekst, $rating);
					header('Location: ../');
                } else {
                    $data['error_input'] = "username_taken";
                }

            }
        }

        $data['vragen'] = $this->createVragenHTML($registratieModel->getVragenLijst());
        $data['title'] = "Eenmaal Andermaal - Registreren";
        $data['page'] = "userregistreren";
        $this->set($data);
        $this->load_view("template");
    }

    private function createVragenHTML($data) {
        $html = '';

        foreach($data as $value) {
            $html .= '<option value="' . $value['id'] . '">' . $value['vraag'] . '</option>';
        }
        return $html;
    }

}
