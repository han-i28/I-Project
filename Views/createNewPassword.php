<?php

?>
<div class="container uk-position-center">
    </br></br></br>
    <?php
        $selector = $_GET["selector"];
        $validator = $_GET["validator"];

        if(empty($selector) || empty($validator)) {
            echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Verzoek om wachtwoord te resetten niet geldig.</div>';
        } else {
            if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
    ?>

    <form action="createNewPassword/resetPassword" method="post">
        <input type="hidden" name="selector" value="<?php echo $selector; ?>">
        <input type="hidden" name="validator" value="<?php echo $validator; ?>">
        <input type="password" name="pwd" placeholder="Vul een nieuw wachtwoord in">
        <input type="password" name="pwd-repeat" placeholder="Herhaal uw nieuwe wachtwoord">
        <button type="submit" name="reset-password-submit">Reset Wachtwoord</button>
    </form>

    <?php
                if (isset($_GET['newpwd'])) {
                    if ($_GET['newpwd'] == 'emptyfields') {
                        echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Niet alle velden zijn ingevuld.</div>';
                    } elseif ($_GET['newpwd'] == 'pwdnotsame') {
                        echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Wachtwoorden zijn niet gelijk.</div>';
                    } elseif ($_GET['newpwd'] == 'expired') {
                        echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>U moet opnieuw een verzoek maken om het wachtwoord te resetten</div>';
                    }
                } elseif (isset($_GET['error'])) {
                    if($_GET['error'] == 'sqlerror') {
                        echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Er was een error.</div>';
                    }
                }
            }

        }
        ?>
</div>