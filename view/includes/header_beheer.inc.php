<nav class="uk-navbar-container" uk-navbar="dropbar: false;" uk-sticky="bottom: #offset">
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav uk-visible@s">
            <li>
                <a href="#">Account</a>
                <div uk-dropdown="pos:bottom-justify" class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
					<?php
						if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] === false ) { ?>
							<li><a href="<?php echo SITEURL . 'login'; ?>">Inloggen</a></li>
							<li><a href="<?php echo SITEURL . 'registreren'; ?>">Registreren</a></li>
					<?php } elseif (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) { ?>
							<li><p>Welkom, <?php echo $_SESSION['gebruikersnaam']; ?></p></li>
                            <li class="uk-active"><a href="<?php echo SITEURL . 'account'; ?>">Profiel</a></li>
                    <?php if(isset($_SESSION['isBeheerder']) && $_SESSION['isBeheerder'] == true) { ?>
                            <li><a href="<?php echo SITEURL . 'beheer'; ?>">Beheer</a></li>
                    <?php } ?>
                            <li class="uk-nav-divider"></li>
							<li><a href="<?php echo SITEURL . 'login/logout'; ?>">Uitloggen</a></li>
					<?php } ?>
                    </ul>
                </div>
            </li>
        </ul>

        
    </div>
    <div class="uk-navbar-center uk-navbar-small uk-logo uk-navbar item uk-visible@s">
       <a href="<?php echo SITEURL; ?>"> <img style="max-height: 80px" src="<?php echo SITEURL . "assets/images/logo.png" ?>" alt="Logo"></a>
   </div>
   <div class="uk-navbar-left uk-navbar-small uk-logo uk-navbar item uk-hidden@s">
       <a href="<?php echo SITEURL; ?>"> <img style="max-height: 50px" src="<?php echo SITEURL . "assets/images/logo.png" ?>" alt="Logo"></a>
   </div>
</nav>