<?php
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    header('Location: home');
}

?>

<div class="container uk-position-center">
    <h1>Registratie</h1>
    <form class="uk-form-horizontal uk-grid-small uk-margin-large" uk-grid>
        <label class="uk-form-label" for="form-horizontal-text">Gebruikersnaam</label>
        <div class="uk-width-1-1">
            <div class="uk-form-controls">
                <input class="uk-input" id="uid" type="text" placeholder="Gebruikersnaam...">
            </div>
        </div>
        <label class="uk-form-label" for="voornaam">Naam</label>
        <div class="uk-width-1-3@s">
            <div class="uk-form-controls">
                <input class="uk-input" id="voornaam" type="text" placeholder="Voornaam...">
            </div>
        </div>
        <div class="uk-width-1-3@s">
            <div class="uk-form-controls">
                <input class="uk-input" id="tussenvoegsel" type="text" placeholder="Tussenvoegsel...">
            </div>
        </div>
        <div class="uk-width-1-3@s">
            <div class="uk-form-controls">
                <input class="uk-input" id="achternaam" type="text" placeholder="Achternaam...">
            </div>
        </div>
        <label class="uk-form-label" for="adres_1">Adres</label>
        <div class="uk-width-1-2@s">
            <div class="uk-form-controls">
                <input class="uk-input" id="adres_1" type="text" placeholder="Adres 1...">
            </div>
        </div>
        <div class="uk-width-1-2@s">
            <div class="uk-form-controls">
                <input class="uk-input" id="adres_2" type="text" placeholder="Adres 2...">
            </div>
        </div>
        <div class="uk-width-1-3@s">
            <div class="uk-form-controls">
                <input class="uk-input" id="postcode" type="text" placeholder="postcode...">
            </div>
        </div>
        <div class="uk-width-1-3@s">
            <div class="uk-form-controls">
                <input class="uk-input" id="plaatsnaam" type="text" placeholder="plaatsnaam...">
            </div>
        </div>
        <div class="uk-width-1-3@s">
            <div class="uk-form-controls">
                <select name="countries" id="land_id">
                    <option value="" title="">placeholder</option>;
                </select>
            </div>
        </div>
        <label class="uk-form-label" for="geboortedatum">Geboortedatum</label>
        <div class="uk-width-1-1">
            <div class="uk-form-controls">
                <input class="uk-input" id="Geboortedatum" type="date">
            </div>
        </div>
        <label class="uk-form-label" for="telefoon">Telefoon</label>
        <div class="uk-width-1-1">
            <div class="uk-form-controls">
                <input class="uk-input" id="telefoon" type="tel" placeholder="Telefoon...">
            </div>
        </div>
        <label class="uk-form-label" for="email">Email</label>
        <div class="uk-width-1-1">
            <div class="uk-form-controls">
                <input class="uk-input" id="email" type="email" placeholder="name@adres.com...">
            </div>
        </div>
        <label class="uk-form-controls" for="wachtwoord">Wachtwoord</label>
        <div class="uk-width-1-2@s">
            <div class="uk-form-controls">
                <input class="uk-input" id="wachtwoord" type="password" placeholder="Wachtwoord...">
            </div>
        </div>
        <div class="uk-width-1-2@s">
            <div class="uk-form-controls">
                <input class="uk-input" id="wachtwoord_herhaal" type="password" placeholder="Herhaal wachtwoord...">
            </div>
        </div>
        <label class="uk-form-label" for="vraag">Veiligheidsvraag</label>
        <div class="uk-width-1-2@s">
            <div uk-form-custom="target: > * > span:first-child">
                <select>
                    <option value="1">1. Wat is je favoriete gerecht?</option>
                    <option value="2">2. Wat is je favoriete film?</option>
                    <option value="3">3. Wat is je favoriete boek?</option>
                    <option value="4">4. Wat is je favoriete serie?</option>
                    <option value="5">5. Wat is je favoriete kleur?</option>
                </select>
                <button class="uk-button uk-button-default" type="button" tabindex="-1">
                    <span></span>
                    <span uk-icon="icon: chevron-down"></span>
                </button>
            </div>
        </div>
        <div class="uk-width-1-2@s">
            <div class="uk-form-controls">
                <input class="uk-input" id="antwoordtekst" type="text" placeholder="antwoord...">
            </div>
        </div>
        <button class="uk-button" type="submit" name="signup_submit">Sign up</button>
    </form>
</div>
