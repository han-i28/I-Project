<div class="uk-container uk-card uk-card-default uk-width-1-2@s uk-margin-top">
    <div class="uk-grid" uk-grid>
        <form action="" method="POST" class="uk-form-horizontal uk-width-1-1 uk-margin-large" >
            <h1 class="uk-margin-top uk-width-1-1 uk-text-center uk-card-title">Registratie</h1>
            <p class="uk-width-1-1 uk-text-center">Een nieuwe wereld van veilingen gaat voor u open!</p>
            <?=$message?>
            <p class="uk-width-1-1 uk-text-center"><b>Let op:</b> velden met aan de rechterzijde het <span class="uk-icon" uk-icon="icon: chevron-double-left"></span> icoon zijn verplicht.</p>
            <div class="uk-width-1-1 uk-margin-top">
                <label class="uk-form-label" for="gebruikersnaam">Gebruikersnaam</label>
                <div class="uk-form-controls">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="gebruikersnaam" id="gebruikersnaam" type="text" maxlength="20" placeholder="gebruikersnaam..." value="<?= (isset($_POST['gebruikersnaam']) ? $_POST['gebruikersnaam'] : null); ?>">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1 uk-margin-top"> <!--uk-width-1-3@s-->
                <label class="uk-form-label" for="voornaam">Voornaam</label>
                <div class="uk-form-controls" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: info"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="voornaam" id="voornaam" type="text" maxlength="255" placeholder="Voornaam..." value="<?= (isset($_POST['voornaam']) ? $_POST['voornaam'] : null); ?>">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1"> <!--uk-width-1-3@s-->
                <label class="uk-form-label" for="tussenvoegsel">Tussenvoegsel</label>
                <div class="uk-form-controls" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: info"></span>
                        <input class="uk-input" name="tussenvoegsel" id="tussenvoegsel" type="text" maxlength="10" placeholder="tussenvoegsel..." value="<?= (isset($_POST['tussenvoegsel']) ? $_POST['tussenvoegsel'] : null); ?>">
                    </div>
                   </div>
            </div>
            <div class="uk-width-1-1"> <!--uk-width-1-3@s-->
                <label class="uk-form-label" for="achternaam">Achternaam</label>
                <div class="uk-form-controls" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: info"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="achternaam" id="achternaam" type="text" maxlength="255" placeholder="Achternaam..." value="<?= (isset($_POST['achternaam']) ? $_POST['achternaam'] : null); ?>">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1 uk-margin-top"> <!--uk-width-1-2@s-->
                <label class="uk-form-label" for="adres_1">Adres 1</label>
                <div class="uk-form-controls" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: home"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="adres 1" id="adres_1" type="text" maxlength="60" placeholder="Straatnaam 123..." value="<?= (isset($_POST['adres_1']) ? $_POST['adres_1'] : null); ?>">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1"> <!--uk-width-1-2@s-->
                <label class="uk-form-label" for="adres_2">Adres 2</label>
                <div class="uk-form-controls" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: home"></span>
                        <input class="uk-input" name="adres 2" id="adres_2" type="text" maxlength="60" placeholder="Straatnaam 456..." value="<?= (isset($_POST['adres_2']) ? $_POST['adres_2'] : null); ?>">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1"> <!--uk-width-1-3@s-->
                <label class="uk-form-label" for="postcode">Postcode</label>
                <div class="uk-form-controls" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: location"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="postcode" id="postcode" type="text" maxlength="16" placeholder="1234AB..." value="<?= (isset($_POST['postcode']) ? $_POST['postcode'] : null); ?>">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1"> <!--uk-width-1-3@s-->
                <label class="uk-form-label" for="plaatsnaam">Plaatsnaam</label>
                <div class="uk-form-controls" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: location"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="plaatsnaam" id="plaatsnaam" type="text" maxlength="85" placeholder="Amsterdam..." value="<?= (isset($_POST['plaatsnaam']) ? $_POST['plaatsnaam'] : null); ?>">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1 uk-margin-top">
                <label class="uk-form-label" for="geboortedatum">Geboortedatum</label>
                <div class="uk-form-controls" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: calendar"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="geboortedatum" id="geboortedatum" type="date" placeholder="Geboortedatum..." value="<?= (isset($_POST['geboortedatum']) ? $_POST['geboortedatum'] : null); ?>">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1 uk-margin-top">
                <label class="uk-form-label" for="telefoonnummer">Telefoonnummer</label>
                <div class="uk-form-controls" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: receiver"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="telefoonnummer" id="telefoonnummer" type="tel" maxlength="15" placeholder="+31 6 12345678..." pattern="((?:\+|00)[17](?: |\-)?|(?:\+|00)[1-9]\d{0,2}(?: |\-)?|(?:\+|00)1\-\d{3}(?: |\-)?)?(0\d|\([0-9]{3}\)|[1-9]{0,3})(?:((?: |\-)[0-9]{2}){4}|((?:[0-9]{2}){4})|((?: |\-)[0-9]{3}(?: |\-)[0-9]{4})|([0-9]{7}))"
                               value="<?= (isset($_POST['telefoonnummer']) ? $_POST['telefoonnummer'] : null); ?>">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1 uk-margin-top">
                <label class="uk-form-label" for="mailbox">Mailbox</label>
                <div class="uk-form-controls" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: mail"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="mailbox" id="mailbox" type="email" maxlength="50" placeholder="naam@adres.com..." value="<?= (isset($_POST['mailbox']) ? $_POST['mailbox'] : null); ?>">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1 uk-margin-top"> <!--uk-width-1-2@s-->
                <label class="uk-form-label" for="wachtwoord">Wachtwoord</label>
                <div class="uk-form-controls" >
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="wachtwoord" id="wachtwoord" type="password" maxlength="255" placeholder="Wachtwoord... (min. 8 tekens)">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1"> <!--uk-width-1-2@s-->
                <label class="uk-form-label" for="wachtwoord_bevestigen">Wachtwoord bevestigen</label>
                <div class="uk-form-controls">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" name="wachtwoord bevestigen" id="wachtwoord_bevestigen" type="password" maxlength="255" placeholder="Wachtwoord... (min. 8 tekens)">
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1 uk-margin-top"> <!--uk-width-1-2@s-->
                <label class="uk-form-label" for="beveiligingsvraag">Beveiligingsvraag</label>
                <div class="uk-form-controls">
                    <div class="uk-inline uk-width-1-1">
                        <select class="uk-select" name="beveiligingsvraag" id="beveiligingsvraag" value="<?= (isset($_POST['beveiligingsvraag']) ? $_POST['beveiligingsvraag'] : null); ?>">!-- HIER MOET NOG EEN LIJST VAN VRAGEN UIT DE DATABASE KOMEN VIA FUNCTION getVragenList() -->
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
                        <input class="uk-input" name="antwoordtekst" id="antwoordtekst" type="text" maxlength="20" placeholder="Antwoord..." value="<?= (isset($_POST['antwoordtekst']) ? $_POST['antwoordtekst'] : null); ?>">
                    </div>
                </div>
            </div>
            <button class="uk-button uk-button-primary uk-margin-top uk-text-middle uk-width-1-1" type="submit" name="signup_submit">Registreren <span class="uk-icon" uk-icon="icon: cloud-upload"></span></button>
        </form>
    </div>
</div>