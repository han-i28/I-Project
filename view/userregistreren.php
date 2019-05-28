<?php
if (isset($_GET["registration"])) {
    echo '</br></br>';
    if ($_GET["registration"] == "success") {
        echo '<div class="uk-alert-success" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Verificatie email is verstuurd.</div>';
    }
} elseif (isset($this->vars['error_input'])) {
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
    elseif($this->vars['error_input'] == 'invalid_adres1') {
        echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Het opgegeven eerste adres is foutief.</div>';
    }
    elseif($this->vars['error_input'] == 'invalid_adres2') {
        echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Het opgegeven tweede adres is foutief.</div>';
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
	elseif($this->vars['error_input'] == 'age_restriction') {
        echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>U moet 12 jaar of ouder zijn om te kunnen registreren.</div>';
    }
}
?>
<div class="uk-container uk-card uk-card-default uk-width-1-2@s uk-margin-top">
    <div class="uk-grid" uk-grid>
        <form action="" method="POST" class="uk-form-horizontal uk-width-1-1 uk-margin-large" >
            <h1 class="uk-margin-top uk-width-1-1 uk-text-center uk-card-title">Registratie</h1>
            <p class="uk-width-1-1 uk-text-center">Velden met het <span class="uk-icon" uk-icon="icon: chevron-double-left"></span> icoon zijn verplicht.</p>
            <div class="uk-width-1-1 uk-margin-top">
                <label class="uk-form-label" for="gebruikersnaam">Gebruikersnaam</label>
                <div class="uk-form-controls">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="gebruikersnaam" id="gebruikersnaam" type="text" maxlength="20" placeholder="JanvdH12...">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1 uk-margin-top"> <!--uk-width-1-3@s-->
                <label class="uk-form-label" for="voornaam">Voornaam</label>
                <div class="uk-form-controls" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: info"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="voornaam" id="voornaam" type="text" maxlength="255" placeholder="Jan...">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1"> <!--uk-width-1-3@s-->
                <label class="uk-form-label" for="tussenvoegsel">Tussenvoegsel</label>
                <div class="uk-form-controls" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: info"></span>
                        <input class="uk-input" name="tussenvoegsel" id="tussenvoegsel" type="text" maxlength="10" placeholder="Van der...">
                    </div>
                   </div>
            </div>
            <div class="uk-width-1-1"> <!--uk-width-1-3@s-->
                <label class="uk-form-label" for="achternaam">Achternaam</label>
                <div class="uk-form-controls" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: info"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="achternaam" id="achternaam" type="text" maxlength="255" placeholder="Heijden...">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1 uk-margin-top"> <!--uk-width-1-2@s-->
                <label class="uk-form-label" for="adres_1">Adres 1</label>
                <div class="uk-form-controls" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: home"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="adres 1" id="adres_1" type="text" maxlength="60" placeholder="Straatnaam 123...">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1"> <!--uk-width-1-2@s-->
                <label class="uk-form-label" for="adres_2">Adres 2</label>
                <div class="uk-form-controls" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: home"></span>
                        <input class="uk-input" name="adres 2" id="adres_2" type="text" maxlength="60" placeholder="Straatnaam 456...">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1"> <!--uk-width-1-3@s-->
                <label class="uk-form-label" for="postcode">Postcode</label>
                <div class="uk-form-controls" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: location"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="postcode" id="postcode" type="text" maxlength="16" placeholder="1234AB...">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1"> <!--uk-width-1-3@s-->
                <label class="uk-form-label" for="plaatsnaam">Plaatsnaam</label>
                <div class="uk-form-controls" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: location"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="plaatsnaam" id="plaatsnaam" type="text" maxlength="85" placeholder="Amsterdam...">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1 uk-margin-top">
                <label class="uk-form-label" for="geboortedatum">Geboortedatum</label>
                <div class="uk-form-controls" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: calendar"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="geboortedatum" id="geboortedatum" type="date" placeholder="Geboortedatum...">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1 uk-margin-top">
                <label class="uk-form-label" for="telefoonnummer">Telefoonnummer</label>
                <div class="uk-form-controls" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: receiver"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="telefoonnummer" id="telefoonnummer" type="tel" maxlength="15" placeholder="+31 6 12345678..." pattern="((?:\+|00)[17](?: |\-)?|(?:\+|00)[1-9]\d{0,2}(?: |\-)?|(?:\+|00)1\-\d{3}(?: |\-)?)?(0\d|\([0-9]{3}\)|[1-9]{0,3})(?:((?: |\-)[0-9]{2}){4}|((?:[0-9]{2}){4})|((?: |\-)[0-9]{3}(?: |\-)[0-9]{4})|([0-9]{7}))">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1 uk-margin-top">
                <label class="uk-form-label" for="mailbox">Mailbox</label>
                <div class="uk-form-controls" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: mail"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="mailbox" id="mailbox" type="email" maxlength="50" placeholder="naam@adres.com...">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1 uk-margin-top"> <!--uk-width-1-2@s-->
                <label class="uk-form-label" for="wachtwoord">Wachtwoord</label>
                <div class="uk-form-controls" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="wachtwoord" id="wachtwoord" type="password" maxlength="255" placeholder="W@chtw00rd123... (minimaal 8 tekens)">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1"> <!--uk-width-1-2@s-->
                <label class="uk-form-label" for="wachtwoord_bevestigen">Wachtwoord bevestigen</label>
                <div class="uk-form-controls">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="wachtwoord bevestigen" id="wachtwoord_bevestigen" type="password" maxlength="255" placeholder="W@chtw00rd123... (minimaal 8 tekens)">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1 uk-margin-top"> <!--uk-width-1-2@s-->
                <label class="uk-form-label" for="beveiligingsvraag">Beveiligingsvraag</label>
                <div class="uk-form-controls">
                    <div class="uk-inline uk-width-1-1">
                        <select class="uk-select" name="beveiligingsvraag" id="beveiligingsvraag">										<!-- HIER MOET NOG EEN LIJST VAN VRAGEN UIT DE DATABASE KOMEN VIA FUNCTION getVragenList() -->
                            <option selected disabled>Kies een beveiligingsvraag</option>
                            <?php echo $this->vars['vragen']; ?>
                        </select>
                    </div>
                </div>                          
            </div>
            <div class="uk-width-1-1"> <!--uk-width-1-2@s-->
                <label class="uk-form-label" for="antwoordtekst">Antwoordtekst</label>
                <div class="uk-form-controls uk-margin-top" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: pencil"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="antwoordtekst" id="antwoordtekst" type="text" maxlength="20" placeholder="Antwoord...">
                    </div>
                </div>
            </div>
            <button class="uk-button uk-button-primary uk-margin-top uk-text-middle uk-width-1-1" type="submit" name="signup_submit">Registreren <span class="uk-icon" uk-icon="icon: cloud-upload"></span></button>
        </form>
    </div>
</div>
