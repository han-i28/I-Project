<?php
    include 'header.php';
    include 'footer.php';
?>

<html>

<head>
    <title>Eenmaal Andermaal | Homepage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.2/css/uikit.min.css" />
    <link rel="stylesheet" href="style.css">
    <!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.2/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.2/js/uikit-icons.min.js"></script>

    <meta name="viewport" content="width=device-width, user-scalable=no">
</head>

<body>
    <div class="uk-container uk-margin-bottom>
        <h2 class="uk-heading-line uk-text-center">
            <span>Uitgelichte producten</span>
        </h2>

        <div class="uk-column-1-3" id="uitgelicht">
            <div class="uk-card uk-card-default">
                <div class="uk-card-header">
                    <h3 class="uk-card-title">
                        placeholder
                    </h3>
                </div>
                <div class="uk-card-body uk-flex uk-flex-center"">
                    <img src=" afb/opelcorsa.jpg" atl="afbeelding">
                </div>
                <div class="uk-card-footer">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    <a href=""><button class="uk-button uk-button-primary">Kopen</button></a>
                </div>
            </div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-header">
                    <h3 class="uk-card-title">
                        "placeholder"
                    </h3>
                </div>
                <div class="uk-card-body uk-flex uk-flex-center">
                    <img src="afb/opelcorsa.jpg" atl="afbeelding">
                </div>
                <div class="uk-card-footer">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    <a href=""><button class="uk-button uk-button-primary">Kopen</button></a>
                </div>
            </div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-header">
                    <h3 class="uk-card-title">
                        "placeholder"
                    </h3>
                </div>
                <div class="uk-card-body uk-flex uk-flex-center"">
                    <img src=" afb/opelcorsa.jpg" atl="afbeelding">
                </div>
                <div class="uk-card-footer">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    <a href=""><button class="uk-button uk-button-primary">Kopen</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="uk-container uk-margin-bottom">
        <h2 class="uk-heading-line uk-text-center">
            <span>Rubriekenboom</span>
        </h2>

        <ul uk-accordion>
            <li>
                <a class="uk-accordion-title" href="#">Auto's</a>
                <div class="uk-accordion-content">
                    <button class="uk-button uk-button-primary">Opel</button>
                    <button class="uk-button uk-button-primary">Mercedes</button>
                </div>
            </li>
            <li>
                <a class="uk-accordion-title" href="#">Fietsen</a>
                <div class="uk-accordion-content">
                    <button class="uk-button uk-button-primary">Elektrische fietsen</button>
                    <button class="uk-button uk-button-primary">Oma en opa fietsen</button>
                </div>
            </li>
            <li>
                <a class="uk-accordion-title" href="#">Elektronica</a>
                <div class="uk-accordion-content">
                    <button class="uk-button uk-button-primary">Laptops</button>
                    <button class="uk-button uk-button-primary">Telefoons</button>
                </div>
            </li>
        </ul>
    </div>
</body>

</html>