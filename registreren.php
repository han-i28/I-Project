<?php
    include 'footer.php';
?>

<html>

<head>
    <title>Eenmaal Andermaal | Registratie</title>
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

    <div class="container uk-flex uk-flex-center">
        <form action="#">
            <fieldset class="uk-fieldset">
                <legend class="uk-legend">
                    Registratie
                </legend>

                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                        <input type="text" class="uk-input" placeholder="gebruikersnaam">
                    </div>
                </div>

                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                        <input type="text" class="uk-input" placeholder="voornaam">
                    </div>
                </div>

                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                        <input type="text" class="uk-input" placeholder="achternaam">
                    </div>
                </div>

                <div class="uk-margin uk-flex uk-flex-center">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: calendar"></span>
                        <input type="date" class="uk-input" placeholder="achternaam">
                    </div>
                </div>

                <hr>

                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: home"></span>
                        <input type="text" class="uk-input" placeholder="adres 1">
                    </div>
                </div>

                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: home"></span>
                        <input type="text" class="uk-input" placeholder="adres 2 (optioneel)">
                    </div>
                </div>

                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: home"></span>
                        <input type="text" class="uk-input" placeholder="postcode">
                    </div>
                </div>

                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: location"></span>
                        <input type="text" class="uk-input" placeholder="plaatsnaam">
                    </div>
                </div>

                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: world"></span>
                        <input type="text" class="uk-input" placeholder="land">
                    </div>
                </div>

                <hr>

                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: mail"></span>
                        <input type="text" class="uk-input" placeholder="email">
                    </div>
                </div>

                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: receiver"></span>
                        <input type="tel" class="uk-input" placeholder="telefoonnummer">
                    </div>
                </div>

                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                        <input type="password" class="uk-input" placeholder="wachtwoord">
                    </div>
                </div>

                <div class="uk-margin">
                    <select class="uk-select">
                        <option value="">Vraag 1</option>
                        <option value="">Vraag 2</option>
                    </select>
                </div>

                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: question"></span>
                        <input type="text" class="uk-input" placeholder="antwoord">
                    </div>
                </div>

                <hr>
                
                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid uk-flex uk-flex-center">
                    <label><input class="uk-radio" type="radio" name="gebruiker" checked> gebruiker</label>
                    <label><input class="uk-radio" type="radio" name="verkoper"> verkoper</label>
                </div>

                <hr>

                <p class="uk-flex uk-flex-center">Al een account. Log <a href="inloggen.html">hier</a> in!</p>
                <div class="uk-flex uk-flex-center">
                    <button class="uk-button uk-button-primary uk-width" type="submit">Registreer!</button>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>