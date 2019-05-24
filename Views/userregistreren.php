<h1 class="uk-margin-top" style="margin-left: calc(50% - 99px);">Registratie</h1>
<?php
if (isset($this->vars['error_input'])) {
    if($this->vars['error_input'] == 'empty_fields') {
        echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Niet alle velden zijn ingevuld.</div>';
    }
    elseif($this->vars['error_input'] == 'invalid_mail') {
        echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>De opgegeven email is foutief.</div>';
    }
    elseif($this->vars['error_input'] == 'invalid_username') {
        echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>De opgegeven gebruikersnaam is foutief.</div>';
    }
    elseif($this->vars['error_input'] == 'invalid_voornaam') {
        echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>De opgegeven voornaam is foutief.</div>';
    }
    elseif($this->vars['error_input'] == 'invalid_tussenvoegsel') {
        echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Het opgegeven tussenvoegsel is foutief.</div>';
    }
    elseif($this->vars['error_input'] == 'invalid_achternaam') {
        echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>De opgegeven achternaam is foutief.</div>';
    }
    elseif($this->vars['error_input'] == 'invalid_adres') {
        echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Het opgegeven adres is foutief.</div>';
    }
    elseif($this->vars['error_input'] == 'invalid_postcode') {
        echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>De opgegeven postcode is foutief.</div>';
    }
    elseif($this->vars['error_input'] == 'invalid_woonplaats') {
        echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>De opgegeven woonplaats is foutief.</div>';
    }
    elseif($this->vars['error_input'] == 'invalid_telefoonnummer') {
        echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Het opgegeven telefoonnummer is foutief.</div>';
    }
    elseif($this->vars['error_input'] == 'invalid_password') {
        echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Het opgegeven wachtwoord is foutief.</div>';
    }
    elseif($this->vars['error_input'] == 'invalid_password_repeat') {
        echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>De wachtwoord herhaling is verkeerd.</div>';
    }
    elseif($this->vars['error_input'] == 'username_taken') {
        echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Deze gebruikersnaam is al in gebruik.</div>';
    }
}
?>
<div class="uk-container">
    <div class="uk-grid" uk-grid>
        <form action="" method="POST" class="uk-form-horizontal uk-width-1-1 uk-margin-large" >
            <div class="uk-width-1-1 uk-margin-top">
                <div class="uk-form-controls" style="margin-left: 35%; margin-right: 32%;">
                    <input class="uk-input" name="uid" id="uid" type="text" maxlength="20" placeholder="Gebruikersnaam... *">
                </div>
            </div>
            <div class="uk-width-1-1 uk-margin-top"> <!--uk-width-1-3@s-->
                <div class="uk-form-controls" style="margin-left: 35%; margin-right: 32%;">
                    <input class="uk-input" name="voornaam" id="voornaam" type="text" maxlength="255" placeholder="Voornaam... *">
                </div>
            </div>
            <div class="uk-width-1-1"> <!--uk-width-1-3@s-->
                <div class="uk-form-controls" style="margin-left: 35%; margin-right: 32%;">
                    <input class="uk-input" name="tussenvoegsel" id="tussenvoegsel" type="text" maxlength="10" placeholder="Tussenvoegsel...">
                </div>
            </div>
            <div class="uk-width-1-1"> <!--uk-width-1-3@s-->
                <div class="uk-form-controls" style="margin-left: 35%; margin-right: 32%;">
                    <input class="uk-input" name="achternaam" id="achternaam" type="text" maxlength="255" placeholder="Achternaam... *">
                </div>
            </div>
            <div class="uk-width-1-1 uk-margin-top"> <!--uk-width-1-2@s-->
                <div class="uk-form-controls" style="margin-left: 35%; margin-right: 32%;">
                    <input class="uk-input" name="adres_1" id="adres_1" type="text" maxlength="60" placeholder="Adres 1... *">
                </div>
            </div>
            <div class="uk-width-1-1"> <!--uk-width-1-2@s-->
                <div class="uk-form-controls" style="margin-left: 35%; margin-right: 32%;">
                    <input class="uk-input" name="adres_2" id="adres_2" type="text" maxlength="60" placeholder="Adres 2...">
                </div>
            </div>
            <div class="uk-width-1-1"> <!--uk-width-1-3@s-->
                <div class="uk-form-controls" style="margin-left: 35%; margin-right: 32%;">
                    <input class="uk-input" name="postcode" id="postcode" type="text" maxlength="16" placeholder="Postcode... *">
                </div>
            </div>
            <div class="uk-width-1-1"> <!--uk-width-1-3@s-->
                <div class="uk-form-controls" style="margin-left: 35%; margin-right: 32%;">
                    <input class="uk-input" name="plaatsnaam" id="plaatsnaam" type="text" maxlength="85" placeholder="Woonplaats... *">
                </div>
            </div>
            <div class="uk-width-1-1 uk-margin-top">
                <div class="uk-form-controls" style="margin-left: 35%; margin-right: 32%;">
                    <input class="uk-input" name="geboortedatum" id="geboortedatum" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Geboortedatum... *">
                </div>
            </div>
            <div class="uk-width-1-1 uk-margin-top">
                <div class="uk-form-controls" style="margin-left: 35%; margin-right: 32%;">
                    <input class="uk-input" name="telefoon" id="telefoon" type="tel" maxlength="15" placeholder="Telefoon... *">
                </div>
            </div>
            <div class="uk-width-1-1 uk-margin-top">
                <div class="uk-form-controls" style="margin-left: 35%; margin-right: 32%;">
                    <input class="uk-input" name="email" id="email" type="email" maxlength="50" placeholder="naam@adres.com... *">
                </div>
            </div>
            <div class="uk-width-1-1 uk-margin-top"> <!--uk-width-1-2@s-->
                <div class="uk-form-controls" style="margin-left: 35%; margin-right: 32%;">
                    <input class="uk-input" name="wachtwoord" id="wachtwoord" type="password" maxlength="255" placeholder="Wachtwoord... * (minimaal 8 tekens)">
                </div>
            </div>
            <div class="uk-width-1-1"> <!--uk-width-1-2@s-->
                <div class="uk-form-controls" style="margin-left: 35%; margin-right: 32%;">
                    <input class="uk-input" name="wachtwoord_herhaal" id="wachtwoord_herhaal"	type="password" maxlength="255" placeholder="Herhaal wachtwoord... *">
                </div>
            </div>
            <div class="uk-width-1-1 uk-margin-top"> <!--uk-width-1-2@s-->
                <div uk-form-custom="target: > * > span:first-child" style="margin-left: 35%; margin-right: 32%;">
                    <select name="vraag" id="vraag">										<!-- HIER MOET NOG EEN LIJST VAN VRAGEN UIT DE DATABASE KOMEN VIA FUNCTION getVragenList() -->
                        <option selected disabled>Kies een vraag *</option>
                        <?php echo $this->vars['vragen']; ?>
                    </select>
                    <button class="uk-button uk-button-default" style="width: 397px; height: 42px;" type="button" tabindex="-1">
                        <span uk-icon="icon: chevron-down"></span>
                    </button>
                </div>
            </div>
            <div class="uk-width-1-1"> <!--uk-width-1-2@s-->
                <div class="uk-form-controls uk-margin-top" style="margin-left: 35%; margin-right: 32%;">
                    <input class="uk-input" name="antwoordtekst" id="antwoordtekst" type="text" maxlength="20" placeholder="antwoord... *">
                </div>
            </div>
            <button class="uk-button uk-margin-top" style="margin-left: calc(50% - 45px); margin-right: 32%;" type="submit" name="signup_submit">Sign up</button>
			<p style="margin-left: 35.5%;">Velden met &ast; zijn verplicht.</p></br></br>
        </form>
    </div>
</div>
