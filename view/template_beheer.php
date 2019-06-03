<?php
include 'includes/head.inc.php';
include 'includes/header_beheer.inc.php';
?>
<body>
<main>
    <div class="uk-grid-small" uk-grid>
        <div class="uk-width-1-5@l uk-width-1-5@m uk-width-1-1@s">
            <div class="uk-card uk-card-default uk-card-body"><h3>
                    <ul class="uk-nav-default uk-nav">
                        <li><a class="uk-padding-remove-left" href="<?= SITEURL . "beheer"; ?>">Beheer<span uk-icon="icon: user;"></span></a></li>
                        <li><a class="uk-padding-remove-left" href="<?= SITEURL . "beheer/blokkeer_gebruiker"; ?>">Blokkeer gebruiker<span uk-icon="icon: users;"></span></a></li>
                        <li><a class="uk-padding-remove-left" href="<?= SITEURL . "beheer/blokkeer_veiling"; ?>">Blokkeer veiling<span uk-icon="icon: tag;"></span></a></li>
                        <li><a class="uk-padding-remove-left" href="<?= SITEURL . "beheer/rubriekenboom"; ?>">Rubriekenboom<span uk-icon="icon: list;"></span></a></li>
                    </ul>
            </div>
        </div>
        <div class="uk-card uk-card-default uk-card-body uk-flex uk-width-4-5@l uk-width-4-5@m uk-width-expand@s">
            <?php
            include $this->vars['page'] . '.php';
            ?>
        </div>
    </div>
</main>

<?php include 'includes/footer.inc.php'; ?>

</body>
</html>
