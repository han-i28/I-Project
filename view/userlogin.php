<div class="uk-container">
	<h1 class="uk-heading-large uk-text-center">Login</h1><br/>
    <?php
    if (isset($_GET["newpwd"])) {
        echo '</br></br>';
        if ($_GET["newpwd"] == "passwordupdated") {
            echo '<div class="uk-alert-success" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Uw wachtwoord is gereset!</div>';
        }
    }elseif (isset($_GET["vkey"])) {
        $vkey = $_GET['vkey'];
        $loginModel = new loginModel();
        $resultArray = $loginModel->getVkeyCheck($vkey);
        if(empty($resultArray)) {
            echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Dit account is niet geldig of al geverifieerd.</div>';
        } else {
            $loginModel->setVerification($vkey);
            echo '<div class="uk-alert-success" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Uw account is nu geverifieerd. U kunt nu inloggen.</div>';
        }
    } elseif (isset($_GET["newuser"])) {
        echo '</br></br>';
        if ($_GET["newuser"] == "emailvalidated") {
            echo '<div class="uk-alert-success" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Registratie voltooid.</div>';
        }
    } elseif (isset($_GET['error'])) {
        if ($_GET['error'] == 'notverified') {
            echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>U bent niet geverifieerd, controleer uw email.</div>';
        }
    } elseif (isset($this->vars['error_input'])) {
            echo '';
            if($this->vars['error_input'] == "empty_fields") {
                echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Niet alle velden zijn ingevuld.</div>';
            }
            if($this->vars['error_input'] == "wrong_input") {
                echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Één of meerdere velden zijn verkeerd ingevuld.</div>';
            }
        } else {
            echo '<br/><br/>';
        }

    ?>
    <form action="login" method="post" class="uk-form uk-text-center">
        <div class="uk-margin">
            <div class="uk-inline">
                <span class="uk-form-icon" uk-icon="icon: user"></span>
                <input id="username" name="gebruikersnaam" type="text" placeholder="gebruikersnaam" class="uk-input">
            </div>
        </div>
        <div class="uk-margin">
            <div class="uk-inline uk-form-password">
                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                <input id="password" name="wachtwoord" type="password" placeholder="wachtwoord" class="uk-input">
            </div>
        </div>
        <p class="uk-flex uk-flex-center"></p>Nog geen account? <a href="<?php echo SITEURL . "registreren" ?>">Registreer hier!</a></p>
        <p class="uk-flex uk-flex center"><a href="<?php echo SITEURL . "passwordResetRequest" ?>">Wachtwoord vergeten?</a></p>
        <div class="uk-flex uk-flex-center">
            <button class="uk-button uk-button-primary uk-width-medium loginknop" name="login_submit" type="submit">Log in!</button>
        </div>
    </form>
</div>