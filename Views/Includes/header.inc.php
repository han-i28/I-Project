<nav class="uk-navbar-container" uk-navbar="dropbar: false;" uk-sticky="bottom: #offset">
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav uk-visible@s">
            <li>
                <a href="#">Account</a>
                <div uk-dropdown="pos:bottom-justify" class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li class="uk-active"><a href="#">Profiel</a></li>
                        <li class="uk-nav-divider"></li>
                        <li><a href="<?php echo SITEURL . 'login'; ?>">Inloggen</a></li>
                        <li><a href="<?php echo SITEURL . 'registreren'; ?>">Registreren</a></li>
                        <li class="uk-nav-divider"></li>                        
                       <li><a href="<?php echo SITEURL . 'login/logout'; ?>">Uitloggen</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#">Item</a>
                <div uk-dropdown="pos:bottom-justify" class="uk-navbar-dropdown uk-navbar-dropdown-width-2">
                    <div class="uk-navbar-dropdown-grid uk-child-width-1-2" uk-grid>
                        <div>
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li class="uk-active"><a href="#">Active</a></li>
                                <li><a href="#">Item</a></li>
                                <li class="uk-nav-header">Header</li>
                                <li><a href="#">Item</a></li>
                                <li><a href="#">Item</a></li>
                                <li class="uk-nav-divider"></li>
                                <li><a href="#">Item</a></li>
                            </ul>
                        </div>
                        <div>
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li class="uk-active"><a href="#">Active</a></li>
                                <li><a href="#">Item</a></li>
                                <li class="uk-nav-header">Header</li>
                                <li><a href="#">Item</a></li>
                                <li><a href="#">Item</a></li>
                                <li class="uk-nav-divider"></li>
                                <li><a href="#">Item</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

        <ul class="uk-navbar-nav uk-hidden@s">
            <li>
                <a uk-navbar-toggle-icon></a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li><a href="#">Acount</a></li>
                        <li><a href="#">Inloggen</a></li>
                        <li><a href="#">Registreren</a></li>


                        <li class="uk-nav-divider"></li>
                        <li class="uk-active"><a href="#">Categorieën</a></li>
                        <li class="uk-parent">
                            <a href="#">Parent</a>
                            <ul class="uk-nav-sub">
                                <li><a href="#">Sub item</a></li>
                                <li><a href="#">Sub item</a></li>
                            </ul>
                        </li>
                        <li class="uk-parent">
                            <a href="#">Parent</a>
                            <ul class="uk-nav-sub">
                                <li><a href="#">Sub item</a></li>
                                <li><a href="#">Sub item</a></li>
                            </ul>
                        </li>
                        <li class="uk-parent">
                            <a href="#">Parent</a>
                            <ul class="uk-nav-sub">
                                <li><a href="#">Sub item</a></li>
                                <li><a href="#">Sub item</a></li>
                            </ul>
                        </li>

                        <li class="uk-parent">
                            <a href="#">Parent</a>
                            <ul class="uk-nav-sub">
                                <li><a href="#">Sub item</a></li>
                                <li><a href="#">Sub item</a></li>
                            </ul>
                        </li>

                        <li class="uk-parent">
                            <a href="#">Parent</a>
                            <ul class="uk-nav-sub">
                                <li><a href="#">Sub item</a></li>
                                <li><a href="#">Sub item</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <div class="uk-navbar-center uk-navbar-small uk-logo uk-navbar item uk-visible@s">
        <a href=""> <img style="max-height: 80px" src="afb/logo.png" alt="Logo"></a>
    </div>
    <div class="uk-navbar-left uk-navbar-small uk-logo uk-navbar item uk-hidden@s">
    <div class="uk-navbar-center uk-navbar-small uk-logo uk-navbar item uk-visible@s">
       <a href="<?php echo SITEURL; ?>"> <img style="max-height: 80px" src="<?php echo SITEURL . "assets/images/logo.png" ?>" alt="Logo"></a>
    </div>
    <div class="uk-navbar-left uk-navbar-small uk-logo uk-navbar item uk-hidden@s">
       <a href="<?php echo SITEURL; ?>"> <img style="max-height: 50px" src="<?php echo SITEURL . "assets/images/logo.png" ?>" alt="Logo"></a>
    </div>
    </div>
    <div class="uk-navbar-right uk-margin-right uk-margin-top uk-visible@s">
        <form action="search" class="uk-flex" method="GET">
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
    <div class="uk-navbar-right uk-margin-right uk-margin-top uk-hidden@s">
        <a class="uk-navbar-toggle" href="#" uk-search-icon></a>
        <div class="uk-navbar-dropdown" uk-drop="mode: click; cls-drop: uk-navbar-dropdown; boundary: !nav">

            <div class="uk-grid-small uk-flex-middle" uk-grid>
                <div class="uk-width-expand">
                    <form class="uk-search uk-search-navbar uk-width-1-1" name="search" method="POST" action="">
                        <input class="uk-search-input" type="search" placeholder="Search..." autofocus>
                    </form>
                </div>
                <div class="uk-width-auto">
                    <a class="uk-navbar-dropdown-close" href="#" uk-close></a>
                </div>
            </div>

        </div>
    </div>
</nav>