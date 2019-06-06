<?php
    $message ='';

    if(isset($this->vars['reset'])) {
        if ($this->vars['reset'] == 'success') {
            $message .= '<div class="uk-alert-success" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Email verstuurd!</div>';
        } elseif ($this->vars['reset'] == 'mail-error') {
            $message .=
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
        }
    }
?>
<div class="container uk-position-center">
    </br></br></br>
    <h1>Reset je wachtwoord</h1>
    <p>Vul je email in. Je krijgt een email met instructies om je email te resetten.</p>
    <form action="" method="post" class="uk-form">
        <div class="uk-margin">
            <div class="uk-inline">
                <input type="email" name="mailbox" placeholder="Vul je e-mail adres in..." class="uk-input">
            </div>
        </div>
        <button class="uk-button uk-button-primary" type="submit" name="reset-request-submit">Reset mijn wachtwoord</button>
    </form>
</div>