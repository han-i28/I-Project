<?php
if (isset($this->vars['error_input'])) {
    echo '</br></br>';
    if($this->vars['error_input'] == "empty_fields") {
        echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Niet alle velden zijn ingevuld.</div>';
    }
    if($this->vars['error_input'] == "wrong_input") {
        echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Één of meerdere velden zijn verkeerd ingevuld.</div>';
    }
}
?>
<div class="uk-container uk-position-center">
    <h1 class="uk-margin-top">Login</h1>
    <div class="uk-grid" uk-grid>
        <form action="" method="post" class="uk-form-horizontal uk-width-1-5 uk-margin-large">
            <div class="uk-width-1-1 uk-margin-top">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input id="username" name="gebruikersnaam" type="text" placeholder="gebruikersnaam" class="uk-input">
                </div>
            </div>
            <div class="uk-width-1-1 uk-margin-top">
                <div class="uk-inline uk-form-password">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input id="password" name="wachtwoord" type="password" placeholder="wachtwoord" class="uk-input">
                </div>
            </div>
            <p class="uk-flex uk-flex-center"></p>Nog geen account? <a href="<?php echo SITEURL . "registreren" ?>">Registreer hier!</a></p>
            <div class="uk-flex uk-flex-center">
                <button class="uk-button uk-button-primary uk-width" name="login_submit" type="submit">Log in!</button>
            </div>
        </form>
    </div>
</div>