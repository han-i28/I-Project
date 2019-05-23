<?php

?>
<div class="container uk-position-center">
    </br></br></br>
    <h1>Reset je wachtwoord</h1>
    <p>Vul je email in. Je krijgt een email met instructies om je email te resetten.</p>
    <form action="passwordResetRequest/resetRequest" method="post">
        <input type="email" name="email" placeholder="Vul je e-mail adres in...">
        <button type="submit" name="reset-request-submit">Reset mijn wachtwoord</button>
    </form>
    <?php
        if (isset($_GET['reset'])) {
            if ($_GET['reset'] == 'success') {
                echo '<div class="uk-alert-success" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Email verstuurd!</div>';
            }
        } elseif (isset($_GET['newpwd'])) {
            if ($_GET['newpwd'] == 'expired') {
                echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>U moet opnieuw een verzoek maken om het wachtwoord te resetten</div>';
            }
        }
    ?>
</div>