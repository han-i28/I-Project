<div class="container uk-position-center" style="margin-top: 250px" uk-grid>
	<h1 style="margin-left: 20%;">Registratie</h1>
    <form action="signup/signupAuthentication" method="POST" class="uk-form-horizontal uk-width-1-1 uk-margin-large" >
        <div class="uk-width-2-3 uk-margin-top">
            <div class="uk-form-controls" style="margin-left: 20%;">
                <input class="uk-input" name="uid" id="uid" type="text" maxlength="20" placeholder="Gebruikersnaam...">
            </div>
        </div>
        <div class="uk-width-2-3 uk-margin-top"> <!--uk-width-1-3@s-->
            <div class="uk-form-controls" style="margin-left: 20%;">
                <input class="uk-input" name="voornaam" id="voornaam" type="text" maxlength="255" placeholder="Voornaam...">
            </div>
        </div>
        <div class="uk-width-2-3"> <!--uk-width-1-3@s-->
            <div class="uk-form-controls" style="margin-left: 20%;">
                <input class="uk-input" name="tussenvoegsel" id="tussenvoegsel" type="text" maxlength="10" placeholder="Tussenvoegsel...">
            </div>
        </div>
        <div class="uk-width-2-3"> <!--uk-width-1-3@s-->
            <div class="uk-form-controls" style="margin-left: 20%;">
                <input class="uk-input" name="achternaam" id="achternaam" type="text" maxlength="255" placeholder="Achternaam...">
            </div>
        </div>
        <div class="uk-width-2-3 uk-margin-top"> <!--uk-width-1-2@s-->
            <div class="uk-form-controls" style="margin-left: 20%;">
                <input class="uk-input" name="adres_1" id="adres_1" type="text" maxlength="60" placeholder="Adres 1...">
            </div>
        </div>
        <div class="uk-width-2-3"> <!--uk-width-1-2@s-->
            <div class="uk-form-controls" style="margin-left: 20%;">
                <input class="uk-input" name="adres_2" id="adres_2" type="text" maxlength="60" placeholder="Adres 2...">
            </div>
        </div>
        <div class="uk-width-2-3"> <!--uk-width-1-3@s-->
            <div class="uk-form-controls" style="margin-left: 20%;">
                <input class="uk-input" name="postcode" id="postcode" type="text" maxlength="16" placeholder="postcode...">
            </div>
        </div>
        <div class="uk-width-2-3"> <!--uk-width-1-3@s-->
            <div class="uk-form-controls" style="margin-left: 20%;">
                <input class="uk-input" name="plaatsnaam" id="plaatsnaam" type="text" maxlength="85" placeholder="plaatsnaam...">
            </div>
        </div>
        <div class="uk-width-2-3"> <!--uk-width-1-3@s-->
            <div class="uk-form-controls uk-margin-top" style="margin-left: 20%;">
                <select name="land_id" id="land_id">
					<?php
						require('../Models/signupModel.php');
						$signupModel = new signupModel();
						
						$countries = $signupModel->getCountryList();
						
						foreach ($countries as $value) { ?>
								<option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
						<?php } ?>
                </select>
            </div>
        </div>
        <div class="uk-width-2-3 uk-margin-top">
            <div class="uk-form-controls" style="margin-left: 20%;">
                <input class="uk-input" name="geboortedatum" id="geboortedatum" type="date">
            </div>
        </div>
        <div class="uk-width-2-3 uk-margin-top">
            <div class="uk-form-controls" style="margin-left: 20%;">
                <input class="uk-input" name="telefoon" id="telefoon" type="tel" maxlength="15" placeholder="Telefoon...">
            </div>
        </div>
        <div class="uk-width-2-3 uk-margin-top">
            <div class="uk-form-controls" style="margin-left: 20%;">
                <input class="uk-input" name="email" id="email" type="email" maxlength="50" placeholder="naam@adres.com...">
            </div>
        </div>
        <div class="uk-width-2-3 uk-margin-top"> <!--uk-width-1-2@s-->
            <div class="uk-form-controls" style="margin-left: 20%;">
                <input class="uk-input" name="wachtwoord" id="wachtwoord" type="password" maxlength="255" placeholder="Wachtwoord...">
            </div>
        </div>
        <div class="uk-width-2-3"> <!--uk-width-1-2@s-->
            <div class="uk-form-controls" style="margin-left: 20%;">
				<input class="uk-input" name="wachtwoord_herhaal" id="wachtwoord_herhaal"	type="password" maxlength="255" placeholder="Herhaal wachtwoord...">
            </div>
        </div>
        <div class="uk-width-2-3 uk-margin-top"> <!--uk-width-1-2@s-->
            <div uk-form-custom="target: > * > span:first-child">
                <select name="vraag" id="vraag">
                    <option value="">Kies een vraag</option>
                    <option value="1">Wat is je favoriete gerecht?</option>
                    <option value="2">Wat is je favoriete film?</option>
                    <option value="3">Wat is je favoriete boek?</option>
                    <option value="4">Wat is je favoriete serie?</option>
                    <option value="5">Wat is je favoriete kleur?</option>
                </select>
                <button class="uk-button uk-button-default" style="width: 269px; margin-left: 25%;" type="button" tabindex="-1">
                    <span uk-icon="icon: chevron-down"></span>
                </button>
            </div>
        </div>
        <div class="uk-width-2-3"> <!--uk-width-1-2@s-->
            <div class="uk-form-controls" style="margin-left: 20%;">
                <input class="uk-input" name="antwoordtekst" id="antwoordtekst" type="text" maxlength="20" placeholder="antwoord...">
            </div>
        </div>
        <button class="uk-button uk-margin-top" style="margin-left: 20%;" type="submit" name="signup_submit">Sign up</button>
    </form>
</div>
