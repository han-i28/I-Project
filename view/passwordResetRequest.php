<?php
    $message ='';

    if(isset($this->vars['reset'])) {
        if ($this->vars['reset'] == 'success') {
            $message .= '<div class="uk-alert-success" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Email verstuurd!</div>';
        } elseif ($this->vars['reset'] == 'mail-error') {
            $message .= '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Er is iets fout gegaan met het versturen van de email. probeer opnieuw.</div>';
        }
    } elseif (isset($this->vars['error_input'])) {
        if ($this->vars['error_input'] == 'invalid_mail') {
            $message .= '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>De opgegeven email is foutief.</div>';
            unset($_POST['mailbox']);
        } elseif ($this->vars['error_input'] == 'empty_fields') {
            $message .= '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Niet alle velden zijn ingevuld.</div>';
            unset($_POST['mailbox']);
        }
    } elseif (isset($this->vars['newpwd'])) {
        if ($this->vars['newpwd'] == "expired") {
            $message .=  '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>U moet opnieuw een verzoek maken om het wachtwoord te resetten</div>';
        } elseif ($this->vars['newpwd'] == "no_account") {
            $message .= '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>U heeft geen bekend account met dat emailadres. probeer opnieuw.</div>';
        }
    }
?>
<div class="uk-container uk-card uk-card-default uk-width-1-2@s uk-width-1-3@m uk-margin-top">
    <div class="uk-grid" uk-grid>
    <h1 class="uk-margin-top uk-width-1-1 uk-text-center uk-card-title">Reset je wachtwoord</h1>
        <?=$message?>
    <p class="uk-width-1-1 uk-text-center">Vul je email in. Je krijgt een email met instructies om je email te resetten.</p>
    <form action="" method="post" class="uk-form-horizontal uk-width-1-1 uk-margin-large">
        <div class="uk-width-1-1 uk-margin-top">
            <label class="uk-form-label" for="gebruikersnaam">Email</label>
            <div class="uk-form-controls">
                <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                    <input type="email" name="mailbox" placeholder="Vul je e-mail adres in..." class="uk-input">
                </div>
            </div>
        </div>
        <button class="uk-button uk-button-primary uk-margin-top uk-text-middle uk-width-1-1" type="submit" name="reset-request-submit">Reset mijn wachtwoord <span class="uk-icon" uk-icon="icon: mail"></span></button>
    </form>
    </div>
</div>