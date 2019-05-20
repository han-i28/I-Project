<?php


class signupController extends Controller
{
    function index()
    {
        $data['title'] = "Eenmaal Andermaal - Registreren";
        $data['page'] = "signup";
        $this->set($data);
        $this->load_view("template");
    }

    function signupAuthentication()
    {
        if (isset($_POST['signup_submit'])) {
			if (empty($_POST['uid']) || empty($_POST['voornaam']) || empty($_POST['tussenvoegsel']) || empty($_POST['achternaam']) || empty($_POST['adres_1']) || empty($_POST['adres_2']) || empty($_POST['postcode']) || 
			empty($_POST['plaatsnaam']) || empty($_POST['land_id']) || empty($_POST['telefoon']) || empty($_POST['email']) || empty($_POST['wachtwoord']) || empty($_POST['wachtwoord_herhaal']) || 
			empty($_POST['vraag']) || empty($_POST['antwoordtekst'])) {
				header("Location: ../signup?errorwtf");
			}
			
            $gebruikersnaam = strip_tags((isset($_POST['uid']) ? $_POST['uid'] : null));
            $voornaam = strip_tags((isset($_POST['voornaam']) ? $_POST['voornaam'] : null));
            $tussenvoegsel = strip_tags((isset($_POST['tussenvoegsel']) ? $_POST['tussenvoegsel'] : null));
            $achternaam = strip_tags((isset($_POST['achternaam']) ? $_POST['achternaam'] : null));
            $adresregel_1 = strip_tags((isset($_POST['adres_1']) ? $_POST['adres_1'] : null));
            $adresregel_2 = strip_tags((isset($_POST['adres_2']) ? $_POST['adres_2'] : null));
            $postcode = strip_tags((isset($_POST['postcode']) ? $_POST['postcode'] : null));
            $plaatsnaam = strip_tags((isset($_POST['plaatsnaam']) ? $_POST['plaatsnaam'] : null));
            $land_id = strip_tags((isset($_POST['land_id']) ? $_POST['land_id'] : null));
            //$geboortedatum = strip_tags((isset($_POST['geboortedatum']) ? $_POST['geboortedatum'] : null));
            $telefoon = strip_tags((isset($_POST['telefoon']) ? $_POST['telefoon'] : null));
            $mailbox = strip_tags((isset($_POST['email']) ? $_POST['email'] : null));
            $wachtwoord = strip_tags((isset($_POST['wachtwoord']) ? $_POST['wachtwoord'] : null));
            $wachtwoord_herhaal = strip_tags((isset($_POST['wachtwoord_herhaal']) ? $_POST['wachtwoord_herhaal'] : null));
            $vraag = strip_tags((isset($_POST['vraag']) ? $_POST['vraag'] : null));
            $antwoordtekst = strip_tags((isset($_POST['antwoordtekst']) ? $_POST['antwoordtekst'] : null));

            if (empty($gebruikersnaam) || empty($voornaam) || empty($achternaam) || empty($adresregel_1) || empty($postcode) || empty($plaatsnaam) || empty($land_id)
                || empty($geboortedatum) || empty($telefoon) || empty($mailbox) || empty($wachtwoord) || empty($wachtwoord_herhaal) || empty($vraag) || empty($antwoordtekst)) {
                //header("Location: ../signup?error1");
				print_r($gebruikersnaam);
				print_r($voornaam);
				print_r($achternaam);
				print_r($adresregel_1);
				print_r($postcode);
				print_r($plaatsnaam);
				print_r($land_id);
				//print_r($geboortedatum);
				print_r($telefoon);
				print_r($mailbox);
				print_r($wachtwoord);
				print_r($wachtwoord_herhaal);
				print_r($vraag);
				print_r($antwoordtekst);
                exit();
            } elseif (!filter_var($mailbox, FILTER_VALIDATE_EMAIL)) { //email validate
                header("Location: ../signup?error2");
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $gebruikersnaam)) { //voornaam
                header("Location: ../signup?error3");
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $voornaam)) { //voornaam
                header("Location: ../signup?error4");
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $tussenvoegsel)) { //tussenvoegsel
                header("Location: ../signup?error5");
                exit();
			} elseif (!preg_match("/^[a-zA-Z0-9]*$/", $achternaam)) { //achternaam
                header("Location: ../signup?error6");
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $adresregel_1)) { //adres 1
                header("Location: ../signup?error7");
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $adresregel_2)) { //adres 2
                header("Location: ../signup?error8");
                exit();
			} elseif (!preg_match("/^[a-zA-Z0-9]*$/", $postcode)) { //postcode
                header("Location: ../signup?error9");
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $plaatsnaam)) { //plaatsnaam
                header("Location: ../signup?error10");
                exit();
            } elseif (!preg_match("/^[0-9]*$/", $telefoon)) { //telefoonnummer
                header("Location: ../signup?error=11");
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9]!@#%&*$/", $wachtwoord || !preg_match("/^[a-zA-Z0-9]!@#%&*$/", $wachtwoord_herhaal))) {
				if ($wachtwoord !== $wachtwoord_herhaal) { //password repeat
					header("Location: ../signup?error=12");
					exit();
				}
            } else {
				
                require('../Models/signupModel.php');
                $signupModel = new signupModel();

                $resultArray = $signupModel->getUidCheck($gebruikersnaam);
                print_R($resultArray);

                if (empty($resultArray)) {
                    $hashedPwd = password_hash($wachtwoord, PASSWORD_DEFAULT);
                    $signupModel->setSignupUser($gebruikersnaam, $voornaam, $tussenvoegsel, $achternaam, $adresregel_1, $adresregel_2, $postcode, $plaatsnaam, $land_id, $geboortedatum, $telefoon, $mailbox, $hashedPwd, $vraag, $antwoordtekst);
                    header("Location: ../signup?signup=succes");
                    exit();
                } else {
					header("Location: ../signup?error=sql"); //veranderen
                    exit();


                }

            }
        }
    }
	
}
