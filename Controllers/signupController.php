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

            $gebruikersnaam = strip_tags((isset($_POST['uid']) ? $_POST['uid'] : null));
            $voornaam = strip_tags((isset($_POST['voornaam']) ? $_POST['voornaam'] : null));
            $tussenvoegsel = strip_tags((isset($_POST['tussenvoegsel']) ? $_POST['tussenvoegsel'] : null));
            $achternaam = strip_tags((isset($_POST['achternaam']) ? $_POST['achternaam'] : null));
            $adresregel_1 = strip_tags((isset($_POST['adres_1']) ? $_POST['adres_1'] : null));
            $adresregel_2 = strip_tags((isset($_POST['adres_2']) ? $_POST['adres_2'] : null));
            $postcode = strip_tags((isset($_POST['postcode']) ? $_POST['postcode'] : null));
            $plaatsnaam = strip_tags((isset($_POST['plaatsnaam']) ? $_POST['plaatsnaam'] : null));
            $land_id = strip_tags((isset($_POST['land_id']) ? $_POST['land_id'] : null));
            $geboortedatum = strip_tags((isset($_POST['geboortedatum']) ? $_POST['geboortedatum'] : null));
            $telefoon = strip_tags((isset($_POST['telefoon']) ? $_POST['telefoon'] : null));
            $mailbox = strip_tags((isset($_POST['email']) ? $_POST['email'] : null));
            $wachtwoord = strip_tags((isset($_POST['wachtwoord']) ? $_POST['wachtwoord'] : null));
            $wachtwoord_herhaal = strip_tags((isset($_POST['wachtwoord_herhaal']) ? $_POST['wachtwoord_herhaal'] : null));
            $vraag = strip_tags((isset($_POST['vraag']) ? $_POST['vraag'] : null));
            $antwoordtekst = strip_tags((isset($_POST['antwoordtekst']) ? $_POST['antwoordtekst'] : null));

            if (empty($gebruikersnaam) || empty($voornaam) || empty($achternaam) || empty($adresregel_1) || empty($postcode) || empty($plaatsnaam) || empty($land_id)
                || empty($geboortedatum) || empty($telefoon) || empty($mailbox) || empty($wachtwoord) || empty($wachtwoord_herhaal) || empty($vraag) || empty($antwoordtekst)) {
                header("Location: ../signup.php?error=emptyfields&uid=" . $gebruikersnaam . "&voornaam=" . $voornaam . "&tussenvoegsel=" . $tussenvoegsel . "&achternaam=" . $achternaam . "
        &adres_1=" . $adresregel_1 . "&adres_2=" . $adresregel_2 . "&postcode=" . $postcode . "&plaatsnaam=" . $plaatsnaam . "&land_id=" . $land_id . "&geboortedatum=" . $geboortedatum . "&telefoon=" . $telefoon . "
        &email=" . $mailbox . "&vraag=" . $vraag . "&antwoordtekst=" . $antwoordtekst);
                exit();
            } elseif (!filter_var($mailbox, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../signup.php?error=mail&uid=" . $gebruikersnaam . "&voornaam=" . $voornaam . "&tussenvoegsel=" . $tussenvoegsel . "&achternaam=" . $achternaam . "
        &adres_1=" . $adresregel_1 . "&adres_2=" . $adresregel_2 . "&postcode=" . $postcode . "&plaatsnaam=" . $plaatsnaam . "&land_id=" . $land_id . "&geboortedatum=" . $geboortedatum . "&telefoon=" . $telefoon . "
        &email=" . $mailbox . "&vraag=" . $vraag . "&antwoordtekst=" . $antwoordtekst);
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $gebruikersnaam)) {
                header("Location: ../signup.php?error=uid&uid=" . $gebruikersnaam . "&voornaam=" . $voornaam . "&tussenvoegsel=" . $tussenvoegsel . "&achternaam=" . $achternaam . "
        &adres_1=" . $adresregel_1 . "&adres_2=" . $adresregel_2 . "&postcode=" . $postcode . "&plaatsnaam=" . $plaatsnaam . "&land_id=" . $land_id . "&geboortedatum=" . $geboortedatum . "&telefoon=" . $telefoon . "
        &email=" . $mailbox . "&vraag=" . $vraag . "&antwoordtekst=" . $antwoordtekst);
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $voornaam)) {
                header("Location: ../signup.php?error=voornaam&uid=" . $gebruikersnaam . "&voornaam=" . $voornaam . "&tussenvoegsel=" . $tussenvoegsel . "&achternaam=" . $achternaam . "
        &adres_1=" . $adresregel_1 . "&adres_2=" . $adresregel_2 . "&postcode=" . $postcode . "&plaatsnaam=" . $plaatsnaam . "&land_id=" . $land_id . "&geboortedatum=" . $geboortedatum . "&telefoon=" . $telefoon . "
        &email=" . $mailbox . "&vraag=" . $vraag . "&antwoordtekst=" . $antwoordtekst);
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $tussenvoegsel)) {
                header("Location: ../signup.php?error=tvgsl&uid=" . $gebruikersnaam . "&voornaam=" . $voornaam . "&tussenvoegsel=" . $tussenvoegsel . "&achternaam=" . $achternaam . "
        &adres_1=" . $adresregel_1 . "&adres_2=" . $adresregel_2 . "&postcode=" . $postcode . "&plaatsnaam=" . $plaatsnaam . "&land_id=" . $land_id . "&geboortedatum=" . $geboortedatum . "&telefoon=" . $telefoon . "
        &email=" . $mailbox . "&vraag=" . $vraag . "&antwoordtekst=" . $antwoordtekst);
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $achternaam)) {
                header("Location: ../signup.php?error=achternaam&uid=" . $gebruikersnaam . "&voornaam=" . $voornaam . "&tussenvoegsel=" . $tussenvoegsel . "&achternaam=" . $achternaam . "
        &adres_1=" . $adresregel_1 . "&adres_2=" . $adresregel_2 . "&postcode=" . $postcode . "&plaatsnaam=" . $plaatsnaam . "&land_id=" . $land_id . "&geboortedatum=" . $geboortedatum . "&telefoon=" . $telefoon . "
        &email=" . $mailbox . "&vraag=" . $vraag . "&antwoordtekst=" . $antwoordtekst);
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $adresregel_1)) {
                header("Location: ../signup.php?error=adres1&uid=" . $gebruikersnaam . "&voornaam=" . $voornaam . "&tussenvoegsel=" . $tussenvoegsel . "&achternaam=" . $achternaam . "
        &adres_1=" . $adresregel_1 . "&adres_2=" . $adresregel_2 . "&postcode=" . $postcode . "&plaatsnaam=" . $plaatsnaam . "&land_id=" . $land_id . "&geboortedatum=" . $geboortedatum . "&telefoon=" . $telefoon . "
        &email=" . $mailbox . "&vraag=" . $vraag . "&antwoordtekst=" . $antwoordtekst);
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $adresregel_2)) {
                header("Location: ../signup.php?error=adres2&uid=" . $gebruikersnaam . "&voornaam=" . $voornaam . "&tussenvoegsel=" . $tussenvoegsel . "&achternaam=" . $achternaam . "
        &adres_1=" . $adresregel_1 . "&adres_2=" . $adresregel_2 . "&postcode=" . $postcode . "&plaatsnaam=" . $plaatsnaam . "&land_id=" . $land_id . "&geboortedatum=" . $geboortedatum . "&telefoon=" . $telefoon . "
        &email=" . $mailbox . "&vraag=" . $vraag . "&antwoordtekst=" . $antwoordtekst);
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $postcode)) {
                header("Location: ../signup.php?error=postcode&uid=" . $gebruikersnaam . "&voornaam=" . $voornaam . "&tussenvoegsel=" . $tussenvoegsel . "&achternaam=" . $achternaam . "
        &adres_1=" . $adresregel_1 . "&adres_2=" . $adresregel_2 . "&postcode=" . $postcode . "&plaatsnaam=" . $plaatsnaam . "&land_id=" . $land_id . "&geboortedatum=" . $geboortedatum . "&telefoon=" . $telefoon . "
        &email=" . $mailbox . "&vraag=" . $vraag . "&antwoordtekst=" . $antwoordtekst);
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $plaatsnaam)) {
                header("Location: ../signup.php?error=plaats&uid=" . $gebruikersnaam . "&voornaam=" . $voornaam . "&tussenvoegsel=" . $tussenvoegsel . "&achternaam=" . $achternaam . "
        &adres_1=" . $adresregel_1 . "&adres_2=" . $adresregel_2 . "&postcode=" . $postcode . "&plaatsnaam=" . $plaatsnaam . "&land_id=" . $land_id . "&geboortedatum=" . $geboortedatum . "&telefoon=" . $telefoon . "
        &email=" . $mailbox . "&vraag=" . $vraag . "&antwoordtekst=" . $antwoordtekst);
                exit();
            } elseif (!preg_match("/^[0-9]*$/", $telefoon)) {
                header("Location: ../signup.php?error=telefoon&uid=" . $gebruikersnaam . "&voornaam=" . $voornaam . "&tussenvoegsel=" . $tussenvoegsel . "&achternaam=" . $achternaam . "
        &adres_1=" . $adresregel_1 . "&adres_2=" . $adresregel_2 . "&postcode=" . $postcode . "&plaatsnaam=" . $plaatsnaam . "&land_id=" . $land_id . "&geboortedatum=" . $geboortedatum . "&telefoon=" . $telefoon . "
        &email=" . $mailbox . "&vraag=" . $vraag . "&antwoordtekst=" . $antwoordtekst);
                exit();
            } elseif ($wachtwoord !== $wachtwoord_herhaal) {
                header("Location: ../signup.php?error=pwrepeat&uid=" . $gebruikersnaam . "&voornaam=" . $voornaam . "&tussenvoegsel=" . $tussenvoegsel . "&achternaam=" . $achternaam . "
        &adres_1=" . $adresregel_1 . "&adres_2=" . $adresregel_2 . "&postcode=" . $postcode . "&plaatsnaam=" . $plaatsnaam . "&land_id=" . $land_id . "&geboortedatum=" . $geboortedatum . "&telefoon=" . $telefoon . "
        &email=" . $mailbox . "&vraag=" . $vraag . "&antwoordtekst=" . $antwoordtekst);
                exit();

            } else {
                require('../Models/signupModel.php');
                $signupModel = new signupModel();

                $resultArray = $signupModel->getUidCheck($gebruikersnaam);
                print_R($resultArray);

//        [insert database hier(brein houdt er mee op)]
                if (empty($resultArray)) {
                    $hashedPwd = password_hash($wachtwoord, PASSWORD_DEFAULT);
                    $signupModel->setSignupUser($gebruikersnaam, $voornaam, $tussenvoegsel, $achternaam, $adresregel_1, $adresregel_2, $postcode, $plaatsnaam, $land_id, $geboortedatum, $telefoon, $mailbox, $hashedPwd, $vraag, $antwoordtekst);
                    header("Location: ../signup.php?signup=succes");
                    exit();
                } else {
                    header("Location: ../signup.php?error=uidtaken&uid=" . $voornaam . "&tussenvoegsel=" . $tussenvoegsel . "&achternaam=" . $achternaam . "
                   &adres_1=" . $adresregel_1 . "&adres_2=" . $adresregel_2 . "&postcode=" . $postcode . "&plaatsnaam=" . $plaatsnaam . "&land_id=" . $land_id . "&geboortedatum=" . $geboortedatum . "&telefoon=" . $telefoon . "
                   &email=" . $mailbox . "&vraag=" . $vraag . "&antwoordtekst=" . $antwoordtekst);
                    exit();


                }

            }
        }
    }
}
