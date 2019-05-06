<?php
session_start();

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    header('Location: index.php');
}

require 'includes/head.inc.php';
require 'includes/menu.inc.php';
?>

    <hr class="uk-divider-icon">

    <div class="container uk-position-center">
        <form action="userlogin.php" method="post" class="uk-form">
            <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input id="username" name="username" type="text" placeholder="gebruikersnaam" class="uk-input">
                </div>
            </div>
            <div class="uk-margin">
                <div class="uk-inline uk-form-password">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input id="password" name="password" type="password" placeholder="wachtwoord" class="uk-input">
                </div>
            </div>
            <p class="uk-flex uk-flex-center"></p>Nog geen account? <a href="registreren.html">Registreer hier!</a></p>
            <div class="uk-flex uk-flex-center">
                <button class="uk-button uk-button-primary uk-width" type="submit">Log in!</button>
            </div>
        </form>
    </div>

<?php require_once 'includes/footer.inc.php';?>