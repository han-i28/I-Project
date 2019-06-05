<?php
    if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] === false ) {
        $headerAccountItemHtml = '
        <li><a href="#">Account</a>
            <div uk-dropdown="pos:bottom-justify" class="uk-navbar-dropdown">
                <ul class="uk-nav uk-navbar-dropdown-nav">
                    <li><a href="' . SITEURL . 'login">Inloggen</a></li>
                    <li><a href="' . SITEURL . 'registreren">Registreren</a></li>
                </ul>
            </div>
        </li>';

        $headerAccountItemHtmlSmall = '
        <li>
                <a class="uk-navbar-toggle" uk-navbar-toggle-icon href="#"></a>
                <div uk-dropdown="pos:bottom-justify" class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li><a href="' . SITEURL . 'login">Inloggen</a></li>
                        <li><a href="' . SITEURL . 'registreren">Registreren</a></li>
                    </ul>
                </div>
            </li>
        ';
    }

    elseif (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
        $headerAccountItemHtml .= '
        <li><a href="#">Account - ' . $_SESSION['gebruikersnaam'] . '</a>
            <div uk-dropdown="pos:bottom-justify" class="uk-navbar-dropdown">
                <ul class="uk-nav uk-navbar-dropdown-nav">
                    <li><p>Welkom, ' . $_SESSION['gebruikersnaam'] . '</p></li>
                    <li class="uk-active"><a href="' . SITEURL . 'account>Profiel</a></li>
                    <li class="uk-nav-divider"></li>
                    <li><a href="' . SITEURL . 'login/logout>Uitloggen</a></li>
                </ul>
            </div>
        </li>';   
        
        $headerAccountItemHtmlSmall = '
        <li>
            <a class="uk-navbar-toggle" uk-navbar-toggle-icon href="#"></a>
            <div uk-dropdown="pos:bottom-justify" class="uk-navbar-dropdown">
                <ul class="uk-nav uk-navbar-dropdown-nav">
                    <li><p>Welkom, ' . $_SESSION['gebruikersnaam'] . '</p></li>
                    <li><a href="' . SITEURL . 'account">Account</a></li>
                    <li class="uk-nav-divider"></li>
                    <li><a href="' . SITEURL . 'login/logout">Uitloggen</a></li>
                </ul>
            </div>
        </li>
        ';
    }
?>

<nav class="uk-navbar-container" uk-navbar="dropbar: false;" uk-sticky="bottom: #offset">
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav uk-visible@s">
            <?=$headerAccountItemHtml?>
        </ul>
    </div>
    <div class="uk-navbar-center uk-logo">
       <a href="<?=SITEURL?>"> <img style="max-height: 80px" src="<?=SITEURL?>assets/images/logo.png" alt="Logo"></a>
    </div>
    </div>
    <div class="uk-navbar-right uk-margin-right uk-margin-top uk-visible@s">
        <form action="<?=SITEURL?>veiling/zoekopdracht" class="uk-flex" method="GET">
            <input type="search" name="search" id="" class="uk-input" placeholder="Zoeken...">
            <button class="uk-button-primary zoekbalk" type="submit"><span class="uk-icon" uk-icon="icon: search"></span></button>
        </form>
        <!--        <a class="uk-navbar-toggle" uk-search-icon href="#"></a>-->
        <!--        <div class="uk-drop" uk-drop="mode: click; pos: left-center; offset: -20">-->
        <!--            <form class="uk-search uk-search-navbar uk-width-1-1">-->
        <!--                <input class="uk-search-input" type="search" placeholder="Search..." autofocus>-->
        <!--            </form>-->
        <!--        </div>-->
    </div>
    
    
    <div class="uk-navbar-left uk-navbar-left uk-hidden@s">
        <ul class="uk-navbar-nav uk-hidden@s">
            <?=$headerAccountItemHtmlSmall?>
        </ul>    
    </div>

    <div class="uk-navbar-right uk-margin-right uk-margin-top uk-hidden@s">
        <a class="uk-navbar-toggle" href="#" uk-search-icon></a>
        <div class="uk-navbar-dropdown" uk-drop="mode: click; cls-drop: uk-navbar-dropdown; boundary: !nav">

            <div class="uk-grid-small uk-flex-middle" uk-grid>
                <div class="uk-width-expand">
                    <form class="uk-search uk-search-navbar uk-width-1-1" method="GET" action="<?=SITEURL?>veiling/zoekopdracht">
                        <input class="uk-search-input" name= "search" type="search" placeholder="Zoeken..." autofocus>
                    </form>
                </div>
                <div class="uk-width-auto">
                    <a class="uk-navbar-dropdown-close" href="#" uk-close></a>
                </div>
            </div>

        </div>
    </div>
</nav>