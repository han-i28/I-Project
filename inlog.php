<?php
    include 'footer.php';
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
        <form action="#">
            <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input type="text" class="uk-input" placeholder="gebruikersnaam">
                </div>
            </div>
            <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input type="password" class="uk-input" placeholder="wachtwoord">
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