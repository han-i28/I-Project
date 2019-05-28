<?php
class registrerenController extends Controller {
    function index() {
        if(!isset($_SESSION['loggedIn'])) {
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

            $gebruikersnaam = secure_input((isset($_POST['uid']) ? $_POST['uid'] : null));
            $voornaam = secure_input((isset($_POST['voornaam']) ? $_POST['voornaam'] : null));
            $tussenvoegsel = secure_input((isset($_POST['tussenvoegsel']) ? $_POST['tussenvoegsel'] : null));
            $achternaam = secure_input((isset($_POST['achternaam']) ? $_POST['achternaam'] : null));
            $adresregel_1 = secure_input((isset($_POST['adres_1']) ? $_POST['adres_1'] : null));
            $adresregel_2 = secure_input((isset($_POST['adres_2']) ? $_POST['adres_2'] : null));
            $postcode = secure_input((isset($_POST['postcode']) ? $_POST['postcode'] : null));
            $plaatsnaam = secure_input((isset($_POST['plaatsnaam']) ? $_POST['plaatsnaam'] : null));
            $land_id = secure_input((isset($_POST['land_id']) ? $_POST['land_id'] : null));
            $geboortedatum = secure_input((isset($_POST['geboortedatum']) ? $_POST['geboortedatum'] : null));
            $telefoon = secure_input((isset($_POST['telefoon']) ? $_POST['telefoon'] : null));
            $mailbox = secure_input((isset($_POST['email']) ? $_POST['email'] : null));
            $wachtwoord = secure_input((isset($_POST['wachtwoord']) ? $_POST['wachtwoord'] : null));
            $wachtwoord_herhaal = secure_input((isset($_POST['wachtwoord_herhaal']) ? $_POST['wachtwoord_herhaal'] : null));
            $vraag = secure_input((isset($_POST['vraag']) ? $_POST['vraag'] : null));
            $antwoordtekst = secure_input((isset($_POST['antwoordtekst']) ? $_POST['antwoordtekst'] : null));
            $rating = 0;

//            if(false) {
            if (empty($gebruikersnaam) || empty($voornaam) || empty($achternaam) || empty($adresregel_1) || empty($postcode) || empty($plaatsnaam) || empty($geboortedatum) || empty($telefoon) || empty($mailbox) || empty($wachtwoord) || empty($wachtwoord_herhaal) || empty($vraag) || empty($antwoordtekst)) {
                $data['error_input'] = "empty_fields";
                header("Location: ../registreren?error=empty_fields&uid=".$gebruikersnaam."&voornaam=".$voornaam."&tussenvoegsel=".$tussenvoegsel."&achternaam=".$achternaam."&adres_1=".$adresregel_1."&adres_2=".$adresregel_2."&postcode=".$postcode."&plaatsnaam=".$plaatsnaam.
                    "&land_id=".$land_id."&geboortedatum=".$geboortedatum."&telefoon=".$telefoon."&email=".$mailbox."&vraag=".$vraag."&antwoordtekst=".$antwoordtekst);
                exit();
            } elseif (!filter_var($mailbox, FILTER_VALIDATE_EMAIL)) { //					email validate
                $data['error_input'] = "invalid_mail";
                header("Location: ../registreren?error=invalid_mail&uid=".$gebruikersnaam."&voornaam=".$voornaam."&tussenvoegsel=".$tussenvoegsel."&achternaam=".$achternaam."&adres_1=".$adresregel_1."&adres_2=".$adresregel_2."&postcode=".$postcode."&plaatsnaam=".$plaatsnaam.
                    "&land_id=".$land_id."&geboortedatum=".$geboortedatum."&telefoon=".$telefoon."&vraag=".$vraag."&antwoordtekst=".$antwoordtekst);
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $gebruikersnaam)) { //				gebruikersnaam
                $data['error_input'] = "invalid_username";
                header("Location: ../registreren?error=invalid_username&voornaam=".$voornaam."&tussenvoegsel=".$tussenvoegsel."&achternaam=".$achternaam."&adres_1=".$adresregel_1."&adres_2=".$adresregel_2."&postcode=".$postcode."&plaatsnaam=".$plaatsnaam.
                    "&land_id=".$land_id."&geboortedatum=".$geboortedatum."&telefoon=".$telefoon."&email=".$mailbox."&vraag=".$vraag."&antwoordtekst=".$antwoordtekst);
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9-]*$/", $voornaam)) { //						voornaam
                $data['error_input'] = "invalid_voornaam";
                header("Location: ../registreren?error=invalid_voornaam&uid=".$gebruikersnaam."&tussenvoegsel=".$tussenvoegsel."&achternaam=".$achternaam."&adres_1=".$adresregel_1."&adres_2=".$adresregel_2."&postcode=".$postcode."&plaatsnaam=".$plaatsnaam.
                    "&land_id=".$land_id."&geboortedatum=".$geboortedatum."&telefoon=".$telefoon."&email=".$mailbox."&vraag=".$vraag."&antwoordtekst=".$antwoordtekst);
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9 -]*$/", $tussenvoegsel)) { //				tussenvoegsel
                $data['error_input'] = "invalid_tussenvoegsel";
                header("Location: ../registreren?error=invalid_tussenvoegsel&uid=".$gebruikersnaam."&voornaam=".$voornaam."&achternaam=".$achternaam."&adres_1=".$adresregel_1."&adres_2=".$adresregel_2."&postcode=".$postcode."&plaatsnaam=".$plaatsnaam.
                    "&land_id=".$land_id."&geboortedatum=".$geboortedatum."&telefoon=".$telefoon."&email=".$mailbox."&vraag=".$vraag."&antwoordtekst=".$antwoordtekst);
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9-]*$/", $achternaam)) { //					achternaam
                $data['error_input'] = "invalid_achternaam";
                header("Location: ../registreren?error=invalid_achternaam&uid=".$gebruikersnaam."&voornaam=".$voornaam."&tussenvoegsel=".$tussenvoegsel."&adres_1=".$adresregel_1."&adres_2=".$adresregel_2."&postcode=".$postcode."&plaatsnaam=".$plaatsnaam.
                    "&land_id=".$land_id."&geboortedatum=".$geboortedatum."&telefoon=".$telefoon."&email=".$mailbox."&vraag=".$vraag."&antwoordtekst=".$antwoordtekst);
                exit();
			} elseif (!preg_match("/^[a-zA-Z]+\ +[0-9]+$/", $adresregel_1)) { //			adres 1 pregmatch
				$data['error_input'] = "invalid_adres";
                header("Location: ../registreren?error=invalid_adres&uid=".$gebruikersnaam."&voornaam=".$voornaam."&tussenvoegsel=".$tussenvoegsel."&achternaam=".$achternaam."&adres_2=".$adresregel_2."&postcode=".$postcode."&plaatsnaam=".$plaatsnaam.
                    "&land_id=".$land_id."&geboortedatum=".$geboortedatum."&telefoon=".$telefoon."&email=".$mailbox."&vraag=".$vraag."&antwoordtekst=".$antwoordtekst);
                exit();
            } elseif (!preg_match("/^[a-zA-Z]+\ +[0-9]+$/", $adresregel_2)) { //			adres 2 pregmatch
				$data['error_input'] = "invalid_adres";
                header("Location: ../registreren?error=invalid_adres&uid=".$gebruikersnaam."&voornaam=".$voornaam."&tussenvoegsel=".$tussenvoegsel."&achternaam=".$achternaam."&adres_1=".$adresregel_1."&postcode=".$postcode."&plaatsnaam=".$plaatsnaam.
                    "&land_id=".$land_id."&geboortedatum=".$geboortedatum."&telefoon=".$telefoon."&email=".$mailbox."&vraag=".$vraag."&antwoordtekst=".$antwoordtekst);
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $postcode)) { //						postcode
                $data['error_input'] = "invalid_postcode";
                header("Location: ../registreren?error=invalid_postcode&uid=".$gebruikersnaam."&voornaam=".$voornaam."&tussenvoegsel=".$tussenvoegsel."&achternaam=".$achternaam."&adres_1=".$adresregel_1."&adres_2=".$adresregel_2."&plaatsnaam=".$plaatsnaam.
                    "&land_id=".$land_id."&geboortedatum=".$geboortedatum."&telefoon=".$telefoon."&email=".$mailbox."&vraag=".$vraag."&antwoordtekst=".$antwoordtekst);
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $plaatsnaam)) { //					plaatsnaam
                $data['error_input'] = "invalid_woonplaats";
                header("Location: ../registreren?error=invalid_woonplaats&uid=".$gebruikersnaam."&voornaam=".$voornaam."&tussenvoegsel=".$tussenvoegsel."&achternaam=".$achternaam."&adres_1=".$adresregel_1."&adres_2=".$adresregel_2."&postcode=".$postcode.
                    "&land_id=".$land_id."&geboortedatum=".$geboortedatum."&telefoon=".$telefoon."&email=".$mailbox."&vraag=".$vraag."&antwoordtekst=".$antwoordtekst);
                exit();
			} elseif (empty($geboortedatum) || $geboortedatum == '0000-00-00') { //			geboortedatum empty check
				$data['error_input'] = "empty_fields";
                header("Location: ../registreren?error=empty_fields&uid=".$gebruikersnaam."&voornaam=".$voornaam."&tussenvoegsel=".$tussenvoegsel."&achternaam=".$achternaam."&adres_1=".$adresregel_1."&adres_2=".$adresregel_2."&postcode=".$postcode."&plaatsnaam=".$plaatsnaam.
                    "&land_id=".$land_id."&telefoon=".$telefoon."&email=".$mailbox."&vraag=".$vraag."&antwoordtekst=".$antwoordtekst);
                exit();
			} elseif ((floor((time() - strtotime($geboortedatum))/31556926))<12) { //		geboortedatum check
				$data['error_input'] = "age_restriction";
                header("Location: ../registreren?error=age_restriction&uid=".$gebruikersnaam."&voornaam=".$voornaam."&tussenvoegsel=".$tussenvoegsel."&achternaam=".$achternaam."&adres_1=".$adresregel_1."&adres_2=".$adresregel_2."&postcode=".$postcode."&plaatsnaam=".$plaatsnaam.
                    "&land_id=".$land_id."&telefoon=".$telefoon."&email=".$mailbox."&vraag=".$vraag."&antwoordtekst=".$antwoordtekst);
                exit();
            } elseif (!preg_match("/^[0-9]*$/", $telefoon)) { //							telefoonnummer
                $data['error_input'] = "invalid_telefoonnummer";
                header("Location: ../registreren?error=invalid_telefoonnummer&uid=".$gebruikersnaam."&voornaam=".$voornaam."&tussenvoegsel=".$tussenvoegsel."&achternaam=".$achternaam."&adres_1=".$adresregel_1."&adres_2=".$adresregel_2."&postcode=".$postcode."&plaatsnaam=".$plaatsnaam.
                    "&land_id=".$land_id."&geboortedatum=".$geboortedatum."&email=".$mailbox."&vraag=".$vraag."&antwoordtekst=".$antwoordtekst);
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9!@#$%^&*]*$/", $wachtwoord)) { //			password
                $data['error_input'] = "invalid_password";
                header("Location: ../registreren?error=invalid_password&uid=".$gebruikersnaam."&voornaam=".$voornaam."&tussenvoegsel=".$tussenvoegsel."&achternaam=".$achternaam."&adres_1=".$adresregel_1."&adres_2=".$adresregel_2."&postcode=".$postcode."&plaatsnaam=".$plaatsnaam.
                    "&land_id=".$land_id."&geboortedatum=".$geboortedatum."&telefoon=".$telefoon."&email=".$mailbox."&vraag=".$vraag."&antwoordtekst=".$antwoordtekst);
                exit();
            } elseif (strlen($wachtwoord) < 8) { //											wachtwoord lengte check
                $data['error_input'] = "invalid_password";
                header("Location: ../registreren?error=invalid_password&uid=".$gebruikersnaam."&voornaam=".$voornaam."&tussenvoegsel=".$tussenvoegsel."&achternaam=".$achternaam."&adres_1=".$adresregel_1."&adres_2=".$adresregel_2."&postcode=".$postcode."&plaatsnaam=".$plaatsnaam.
                    "&land_id=".$land_id."&geboortedatum=".$geboortedatum."&telefoon=".$telefoon."&email=".$mailbox."&vraag=".$vraag."&antwoordtekst=".$antwoordtekst);
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9!@#$%^&*]*$/", $wachtwoord_herhaal)) { //	password repeat
                $data['error_input'] = "invalid_password_repeat";
                header("Location: ../registreren?error=invalid_password_repeat&uid=".$gebruikersnaam."&voornaam=".$voornaam."&tussenvoegsel=".$tussenvoegsel."&achternaam=".$achternaam."&adres_1=".$adresregel_1."&adres_2=".$adresregel_2."&postcode=".$postcode."&plaatsnaam=".$plaatsnaam.
                    "&land_id=".$land_id."&geboortedatum=".$geboortedatum."&telefoon=".$telefoon."&email=".$mailbox."&vraag=".$vraag."&antwoordtekst=".$antwoordtekst);
                exit();
            } elseif ($wachtwoord !== $wachtwoord_herhaal) { //								password repeat
                $data['error_input'] = "invalid_password_repeat";
                header("Location: ../registreren?error=invalid_password_repeat&uid=".$gebruikersnaam."&voornaam=".$voornaam."&tussenvoegsel=".$tussenvoegsel."&achternaam=".$achternaam."&adres_1=".$adresregel_1."&adres_2=".$adresregel_2."&postcode=".$postcode."&plaatsnaam=".$plaatsnaam.
                    "&land_id=".$land_id."&geboortedatum=".$geboortedatum."&telefoon=".$telefoon."&email=".$mailbox."&vraag=".$vraag."&antwoordtekst=".$antwoordtekst);
                exit();
            } else {
                $registratieModel = new registratieModel();
                $resultArray = $registratieModel->getUidCheck($gebruikersnaam);
                if (empty($resultArray)) { //al in database check
                    $hashedPwd = password_hash($wachtwoord, PASSWORD_DEFAULT);
                    $vkey = password_hash(time() . $gebruikersnaam, PASSWORD_DEFAULT);
                    $result = $registratieModel->setSignupUser($gebruikersnaam, $voornaam, $tussenvoegsel, $achternaam, $adresregel_1, $adresregel_2, $postcode, $plaatsnaam, $land_id, $geboortedatum, $telefoon, $mailbox, $hashedPwd, $vraag, $antwoordtekst, $rating, $vkey);

                    // email setup
                    $url = "iproject28.icasites.nl/login?vkey=" . $vkey;

                    $to = $mailbox;
                    $subject = 'Verificatie registratie Eenmaal Andermaal';

                    $message = '<p>U heeft een account aangemaakt op de website van EenmaalAndermaal. Klik op de link hieronder om uw registratie te voltooien.</p>';
                    $message .= '<p>Hier is uw wachtwoord reset link: </br>';
                    $message .= '<a href="' . $url . '">Registratie voltooien</a></p>';

                    $headers = "From: Eenmaal Andermaal <noreply@EenmaalAndermaal.com>\r\n";
                    $headers .= "Reply-To: noreply@EenmaalAndermaal.com\r\n";
                    $headers .= "Content-type: text/html\r\n";

                    mail($to, $subject, $message, $headers);

                    header("Location: ../registreren?registration=success");
                    exit();
                } else {
                    $data['error_input'] = "username_taken";
                    header("Location: ../registreren?error=username_taken&voornaam=".$voornaam."&tussenvoegsel=".$tussenvoegsel."&achternaam=".$achternaam."&adres_1=".$adresregel_1."&adres_2=".$adresregel_2."&postcode=".$postcode."&plaatsnaam=".$plaatsnaam.
                    "&land_id=".$land_id."&geboortedatum=".$geboortedatum."&telefoon=".$telefoon."&email=".$mailbox."&vraag=".$vraag."&antwoordtekst=".$antwoordtekst);
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

    private function createVragenHTML($data) {
        $html = '';

        foreach($data as $value) {
            $html .= '<option value="' . $value['id'] . '">' . $value['vraag'] . '</option>';
        }
        return $html;
    }

}
