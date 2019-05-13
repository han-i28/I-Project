<?php


if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    header('Location: home');
}
?>

<?php
	require_once 'includes/head.inc.php';
	require_once 'includes/menu.inc.php';
    <div class="container uk-position-center">
        <form action="login/userAuthentication" method="post" class="uk-form">
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
            <p class="uk-flex uk-flex-center"></p>Nog geen account? <a href="registreren.php">Registreer hier!</a></p>
            <div class="uk-flex uk-flex-center">
                <button class="uk-button uk-button-primary uk-width" name="login_submit" type="submit">Log in!</button>
            </div>
        </form>
    </div>