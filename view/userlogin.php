<?php
    $message = '';
    if (isset($this->vars["newpwd"])) {
        if ($this->vars["newpwd"] == "passwordupdated") {
            $message =  '<div class="uk-alert-success" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Uw wachtwoord is gereset!</div>';
        }else{
            $message .= '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Er is iets fout gegaan. Probeer het later opnieuw.</div>';
        }
    } elseif (isset($this->vars['error_input'])) {
        if($this->vars['error_input'] == "empty_fields") {
            $message = '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Niet alle velden zijn ingevuld.</div>';
        }
        elseif($this->vars['error_input'] == "wrong_input") {
            $message = '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Één of meerdere velden zijn verkeerd ingevuld.</div>';
        }
        elseif ($this->vars['error_input'] == "not_verified") {
            $message = '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>U bent niet geverifieerd, controleer uw email.</div>';
        }else{
            $message .= '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Er is iets fout gegaan. Probeer het later opnieuw.</div>';
        }
    }

    require PATH.'/view/includes/inlogformulier.inc.php';
?>