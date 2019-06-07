<div class="uk-container uk-card uk-card-default uk-width-1-2@s uk-width-1-3@m uk-margin-top">
    <div class="uk-grid" uk-grid>
        <form action="" method="POST" class="uk-form-horizontal uk-width-1-1 uk-margin-large" >
            <h1 class="uk-margin-top uk-width-1-1 uk-text-center uk-card-title">Login</h1>
            <?=$message?>
            <p class="uk-width-1-1 uk-text-center">Welkom bij Eenmaal Andermaal, de beste veilingsite van Nederland!</p>
                <div class="uk-width-1-1 uk-margin-top">
                    <label class="uk-form-label" for="gebruikersnaam">Gebruikersnaam</label>
                    <div class="uk-form-controls">
                        <div class="uk-inline uk-width-1-1">
                            <span class="uk-form-icon" uk-icon="icon: user"></span>
                            <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                            <input class="uk-input" name="gebruikersnaam" id="gebruikersnaam" type="text" maxlength="20" placeholder="Uw gebruikersnaam..." value="<?= (isset($_POST['gebruikersnaam']) ? $_POST['gebruikersnaam'] : null); ?>">
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-margin-top">
                    <label class="uk-form-label" for="wachtwoord">Wachtwoord</label>
                    <div class="uk-form-controls" >
                        <div class="uk-inline uk-width-1-1">
                            <span class="uk-form-icon" uk-icon="icon: lock"></span>
                            <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                            <input class="uk-input" name="wachtwoord" id="wachtwoord" type="password" maxlength="255" placeholder="Uw wachtwoord...">
                        </div>
                    </div>
                </div>
                <p class="uk-flex uk-flex-middle"></p>Nog geen account? <a href="<?php echo SITEURL . "registreren" ?>">Registreer hier!</a></p>
                <p class="uk-flex uk-flex-middle"><a href="<?php echo SITEURL . "passwordResetRequest" ?>">Wachtwoord vergeten?</a></p>
                <button class="uk-button uk-button-primary uk-margin-top uk-text-middle uk-width-1-1" type="submit" name="login_submit">Inloggen <span class="uk-icon" uk-icon="icon: sign-in"></span></button>
            </form>
        </div>
    </div>
</div>
