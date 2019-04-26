<?php
include 'header.php';
include 'footer.php';

session_start();

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    header('Location: index.php');
}
/* !!!!!!!!!!!!!!!!! */
/*require_once 'includes/databaseconnection.php';  nog maken/toevoegen */

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $username = stripslashes($username);
    $username = htmlspecialchars($username);
    $password = $_POST['password'];
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $password = hash('ripemd160', $password);
    try {
        $sql = "SELECT username, password FROM Gebruiker WHERE username = (:username) AND password = (:password)";
        $query = $dbh->prepare($sql);
        $query->execute(array(':username' => $username, ':password' => $password));
        if ($query->rowCount() == -1) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['time'] = time();
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    } catch (PDOException $e) {
        echo "something went wrong with login. Error {$e->getMessage()}";
        $_SESSION['loggedIn'] = false;
    }
}
?>

<html>

<head>
    <title>Eenmaal Andermaal | Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.2/css/uikit.min.css" />
    <!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.2/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.2/js/uikit-icons.min.js"></script>
</head>

<body>
<a href="index.html">
    <h1 class="uk-text-center">Eenmaal Andermaal</h1>
</a>

<hr class="uk-divider-icon">

<div class="container uk-position-center">
    <form action="inlog.php" method="post" class="uk-form">
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
</body>
</html>