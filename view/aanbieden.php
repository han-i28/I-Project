<?php
    require(PATH . '/model/aanbiedenModel.php');
    $aanbiedenModel = new aanbiedenModel();
    $message = '';
    if(isset($this->vars['error'])) {
        if ($this->vars['error'] == "no_user_found") {
            $message = '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Ongeldige gebruiker/SQL error</div>';
        } elseif ($this->vars['error'] == "sql_error") {
            $message = '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>SQL error</div>';
        }
    } elseif (isset($this->vars['error_input'])) {
        if ($this->vars['error_input'] == "empty_fields") {
            $message = '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Niet alle velden zijn ingevuld.</div>';
        } elseif ($this->vars['error_input'] == "invalid_titel") {
            $message = '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>titel niet geldig, probeer opnieuw.</div>';
            unset($_POST['titel']);
        } elseif ($this->vars['error_input'] == "invalid_beschrijving") {
            $message = '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>beschrijving niet geldig, probeer opnieuw.</div>';
            unset($_POST['beschrijving']);
        } elseif ($this->vars['error_input'] == "invalid_startprijs") {
            $message = '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>startprijs niet geldig, probeer opnieuw.</div>';
            unset($_POST['startprijs']);
        } elseif ($this->vars['error_input'] == "invalid_betalingsinstructie") {
            $message = '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>betalingsinstructie niet geldig, probeer opnieuw.</div>';
            unset($_POST['betalingsinstructie']);
        } elseif ($this->vars['error_input'] == "invalid_verzendkosten") {
            $message = '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>verzendkosten niet geldig, probeer opnieuw.</div>';
            unset($_POST['verzendkosten']);
        } elseif ($this->vars['error_input'] == "invalid_verzendinstructies") {
            $message = '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>verzendinstructie niet geldig, probeer opnieuw.</div>';
            unset($_POST['verzendinstructies']);
        }
    } elseif (isset($this->vars['aanbieden'])) {
        if ($this->vars['aanbieden'] == "success") {
            $resultArray = $aanbiedenModel->getVoorwerpnummer();
            $url = SITEURL . "veiling/weergave/?veiling=" . $resultArray['voorwerpnummer'];
            $message = '<div class="uk-alert-success" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Uw veiling is succesvol geplaatst. Klik <a href='. $url. '>hier</a> om uw veiling te bekijken.</div>';
        }
    } elseif (isset($this->vars['afbeelding'])) { //afbeelding errors van Jasper.
        if ($this->vars['afbeelding'] == ""){

        }
    }

    require PATH.'/view/includes/aanbiedenformulier.inc.php';
    ?>