<h1 class="uk-heading-bullet">Eenmaal Andermaal</h1>
<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">
        <form class="uk-search uk-search-navbar" action="#">
            <span uk-search-icon></span>
            <input class="uk-search-input" type="search" placeholder="Zoeken..." />
        </form>
    </div>
    <div class="uk-navbar-right">
        <ul class="uk-navbar-nav">
            <?php
                if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) {
            ?>
                <li><a href="#">Account</a></li>
                <li><a href="login/logout">logout</a></li>
            <?php }  else { ?>
                <li><a href="login">Inloggen</a></li>
                <li><a href="signup">Registreren</a></li>
            <?php } ?>
        </ul>
    </div>
    </div>
</nav>

<hr class="uk-divided-icon">
