<?php
if (isset($this->vars['registration'])) {
    echo '</br></br>';
    if ($this->vars['registration'] == "success") {
        echo '<div class="uk-alert-success" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Verificatie email is verstuurd.</div>';
    }
} else{
    if(isset($this->vars['error_input'])) {
        if($this->vars['error_input'] == 'empty_fields') {
            echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Niet alle velden zijn ingevuld.</div>';
        }
        elseif($this->vars['error_input'] == 'invalid_mail') {
            echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>De opgegeven email is foutief.</div>';
            unset($_POST['mailbox']);
        }
        elseif($this->vars['error_input'] == 'invalid_username') {
            echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>De opgegeven gebruikersnaam is foutief.</div>';
            unset($_POST['gebruikersnaam']);
        }
        elseif($this->vars['error_input'] == 'invalid_voornaam') {
            echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>De opgegeven voornaam is foutief.</div>';
            unset($_POST['voornaam']);
        }
        elseif($this->vars['error_input'] == 'invalid_tussenvoegsel') {
            echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Het opgegeven tussenvoegsel is foutief.</div>';
            unset($_POST['tussenvoegsel']);
        }
        elseif($this->vars['error_input'] == 'invalid_achternaam') {
            echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>De opgegeven achternaam is foutief.</div>';
            unset($_POST['achternaam']);
        }
        elseif($this->vars['error_input'] == 'invalid_adres1') {
            echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Het opgegeven eerste adres is foutief.</div>';
            unset($_POST['adres_1']);
        }
        elseif($this->vars['error_input'] == 'invalid_adres2') {
            echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Het opgegeven tweede adres is foutief.</div>';
            unset($_POST['adres_2']);
        }
        elseif($this->vars['error_input'] == 'invalid_postcode') {
            echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>De opgegeven postcode is foutief.</div>';
            unset($_POST['postcode']);
        }
        elseif($this->vars['error_input'] == 'invalid_plaatsnaam') {
            echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>De opgegeven plaatsnaam is foutief.</div>';
            unset($_POST['plaatsnaam']);
        }
        elseif($this->vars['error_input'] == 'invalid_telefoonnummer') {
            echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Het opgegeven telefoonnummer is foutief.</div>';
            unset($_POST['telefoonnummer']);
        }
        elseif($this->vars['error_input'] == 'invalid_password') {
            echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Het opgegeven wachtwoord is foutief.</div>';
        }
        elseif($this->vars['error_input'] == 'invalid_password_repeat') {
            echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>De wachtwoord herhaling is verkeerd.</div>';
        }
        elseif($this->vars['error_input'] == 'username_taken') {
            echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Deze gebruikersnaam is al in gebruik.</div>';
            unset($_POST['gebruikersnaam']);
        }
        elseif($this->vars['error_input'] == 'age_restriction') {
            echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>U moet 12 jaar of ouder zijn om te kunnen registreren.</div>';
        }
    }
    require PATH.'/view/includes/registratieformulier.inc.php';
} 
?>
