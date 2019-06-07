<?php
$message ='';

if(isset($this->vars['error_input'])) {
    if($this->vars['error_input'] == 'empty_fields') {
        $message .=  '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Niet alle verplichte velden zijn ingevuld.</div>';
    }
    elseif($this->vars['error_input'] == 'invalid_mail') {
        $message .=  '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>De opgegeven email is foutief.</div>';
        unset($_POST['mailbox']);
    }
    elseif($this->vars['error_input'] == 'invalid_username') {
        $message .=  '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>De opgegeven gebruikersnaam is foutief.</div>';
        unset($_POST['gebruikersnaam']);
    }
    elseif($this->vars['error_input'] == 'invalid_voornaam') {
        $message .=  '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>De opgegeven voornaam is foutief.</div>';
        unset($_POST['voornaam']);
    }
    elseif($this->vars['error_input'] == 'invalid_tussenvoegsel') {
        $message .=  '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Het opgegeven tussenvoegsel is foutief.</div>';
        unset($_POST['tussenvoegsel']);
    }
    elseif($this->vars['error_input'] == 'invalid_achternaam') {
        $message .=  '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>De opgegeven achternaam is foutief.</div>';
        unset($_POST['achternaam']);
    }
    elseif($this->vars['error_input'] == 'invalid_adresregel_1') {
        $message .=  '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Het opgegeven eerste adres is foutief.</div>';
        unset($_POST['adresregel_1']);
    }
    elseif($this->vars['error_input'] == 'invalid_adresregel_2') {
        $message .=  '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Het opgegeven tweede adres is foutief.</div>';
        unset($_POST['adresregel_2']);
    }
    elseif($this->vars['error_input'] == 'invalid_postcode') {
        $message .=  '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>De opgegeven postcode is foutief.</div>';
        unset($_POST['postcode']);
    }
    elseif($this->vars['error_input'] == 'invalid_plaatsnaam') {
        $message .=  '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>De opgegeven plaatsnaam is foutief.</div>';
        unset($_POST['plaatsnaam']);
    }
    elseif($this->vars['error_input'] == 'invalid_telefoon') {
        $message .=  '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Het opgegeven telefoonnummer is foutief.</div>';
        unset($_POST['telefoon']);
    }
    elseif($this->vars['error_input'] == 'invalid_password') {
        $message .=  '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Het opgegeven wachtwoord is foutief.</div>';
    }
    elseif($this->vars['error_input'] == 'invalid_password_repeat') {
        $message .=  '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>De wachtwoord herhaling is verkeerd.</div>';
    }
    elseif($this->vars['error_input'] == 'username_taken') {
        $message .=  '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Deze gebruikersnaam is al in gebruik.</div>';
        unset($_POST['gebruikersnaam']);
    }
    elseif($this->vars['error_input'] == 'age_restriction') {
        $message .=  '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>U moet 12 jaar of ouder zijn om te kunnen registreren.</div>';
    }
    require PATH.'/view/includes/registratieformulier.inc.php';
} elseif (isset($this->vars['registration'])) {
    $message .= '</br></br>';
    if ($this->vars['registration'] == "succes") {
        $message .=  '<div class="uk-alert-success" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Verificatie email is verstuurd.</div>';
    }else if($this->vars['registration'] == "mail-error"){
        $message .= '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Verificatie mail sturen niet gelukt. Probeer het later opnieuw.</div>';
    }else{
        $message .= '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Er is iets fout gegaan. Probeer het later <a href="'.SITEURL.'registreren">opnieuw</a>.</div>';
    }
    echo $message;
}else{
    require PATH.'/view/includes/registratieformulier.inc.php';
}
?>
