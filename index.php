<?php
require 'header.php';
require_once 'functions.php';
?>

<html>

<head>
    <title>Eenmaal Andermaal | Homepage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.2/css/uikit.min.css"/>
    <link rel="stylesheet" href="style.css">
    <!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.2/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.2/js/uikit-icons.min.js"></script>

    <meta name="viewport" content="width=device-width, user-scalable=no">
</head>

<body>
<div class="uk-card uk-card-default uk-card-body uk-width-1-5 uk-position-center-left uk-position-fixed uk-margin-large-top uk-visible@s">
    <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
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

<?php echo generate_section('Highlights'); ?>
<?php echo generate_section('Rubriek'); ?>
<?php echo generate_section('Rubriek'); ?>

<div class="uk-card uk-card-default uk-card-title uk-width-1-5 uk-position-center-right uk-visible@s">
    <div class="uk-card-header">
        Uw veilingen
    </div>
    <div class="uk-card-body">
        <ul class="uk-nav">
            <li>voorbeeld1</li>
            <li>voorbeeld2</li>
        </ul>
    </div>
</div>
<div class="uk-card uk-card-default uk-card-title uk-width-1-5 uk-position-bottom-right uk-visible@s">
    <div class="uk-card-header">
        Uw biedingen
    </div>
    <div class="uk-card-body">
        <ul class="uk-nav">
            <li>voorbeeld1</li>
            <li>voorbeeld2</li>
        </ul>
    </div>
</div>

<!--<div class="uk-grid uk-width-1-1 uk-hidden@s">-->
    <div class="uk-card uk-card-default uk-card-title uk-hidden@s">
        <div class="uk-card-header">
            Uw veilingen
        </div>
        <div class="uk-card-body">
            <ul class="uk-nav">
                <li>voorbeeld1</li>
                <li>voorbeeld2</li>
            </ul>
        </div>
    </div>
    <div class="uk-card uk-card-default uk-card-title uk-hidden@s">
        <div class="uk-card-header">
            Uw biedingen
        </div>
        <div class="uk-card-body">
            <ul class="uk-nav">
                <li>voorbeeld1</li>
                <li>voorbeeld2</li>
            </ul>
        </div>
    </div>
<!--</div>-->

<?php require_once 'footer.php'; ?>
</body>

</html>