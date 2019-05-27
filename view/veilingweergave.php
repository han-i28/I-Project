
<div class="uk-container">
    <div class="uk-grid">
        <div class="uk-width-3-5@l uk-width-3-5@m uk-width-1-1@s">
            <div class="uk-card uk-card-default uk-card-body">
                <h3><?php echo $this->vars['veiling']['titel']; ?></h3>
                <div id="afbeeldingContainer" style="background-image: url('http://iproject28.icasites.nl/pics/<?php echo $this->vars['afbeelding'][0]['pad']; ?>');"></div>
                <div uk-slider>
                    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                        <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">
                            <?php foreach ($this->vars['afbeelding'] as $value) { ?>
                                <li>
                                    <img src="http://iproject28.icasites.nl/pics/<?php echo $value['pad']; ?>" class="miniAfbeelding" data-path="http://iproject28.icasites.nl/pics/<?php echo $value['pad']; ?>" alt="afbeelding">
                                </li>
                            <?php } ?>
                        </ul>
                        
                        <a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>

                    </div>

                    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

                </div>
                <script>
                    var app = {
                        init: function() {
                            this.addEventListeners();
                            this.getElements();
                        },
                        addEventListeners: function() {
                            document.addEventListener("click", this.changeBackgroundImage.bind(this));
                        },
                        getElements: function() {
                            this.afbeeldingContainer = document.getElementById("afbeeldingContainer");
                        },
                        changeBackgroundImage: function() {
                            if(event.target.classList.contains("miniAfbeelding")){
                                this.afbeeldingContainer.style.backgroundImage = "url('" + event.target.getAttribute("data-path") + "')";
                            }
                        }
                    };

                    app.init();
                </script>
            </div>
            <div class="uk-card uk-card-default uk-card-body">
                <legend class="uk-legend">Beschrijving</legend>
                <p>
                    <?php echo $this->vars['veiling']['beschrijving']; ?>
                </p>
            </div>
        </div>


        <div class="uk-width-2-5@l uk-width-2-5@m uk-width-1-1@s">
            <div class="uk-card uk-card-default uk-card-body">
                <h1>Verkoper</h1>
                <p>
                    Verkoper: <?php echo $this->vars['veiling']['verkoper']; ?></br>
                    Startprijs: <?php echo $this->vars['veiling']['prijs']; ?></br>
                    Conditie: <?php echo $this->vars['veiling']['conditie']; ?>
                </p>

                <p>
                    Hoogste bod:</br>
                    Pepijn - &euro;40
                </p>

                </br>
                <div class="uk-container">
                    <div class="uk-grid-small uk-child-width-auto uk-flex-around" uk-grid uk-countdown="date: <?php echo $this->vars['veiling']['looptijdEinde'] ?>">
                        <div>
                            <div class="uk-countdown-number uk-countdown-days">dagen</div>
                            <div>dagen</div>
                        </div>
                        <div>
                            <div class="uk-countdown-number uk-countdown-hours">uren</div>
                            <div>uren</div>
                        </div>
                        <div>
                            <div class="uk-countdown-number uk-countdown-minutes">minuten</div>
                            <div>minuten</div>
                        </div>
                        <div>
                            <div class="uk-countdown-number uk-countdown-seconds"></div>
                            <div>seconden</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-card uk-card-default uk-card-body">
                <legend class="uk-legend">Bieden</legend>
                </br>
                <div>
                    <input class="uk-input uk-width-expand" type="text" placeholder="Uw bod">
                    <a class="uk-button uk-button-primary custom_button uk-width-expand" style="background-color:#5f4b8b;" href="#">Bieden</a><br><br>
                </div>
                <?php
                if (isset($_SESSION['loggedin'])) {
                    if ($_SESSION['loggedin'] == true) {
                        echo '
						<div>
                            <input class="uk-input uk-width-expand" type="text" placeholder="Uw bod">
                            <a class="uk-button uk-button-primary custom_button uk-width-expand" href="#">Bieden</a><br><br>
                        </div>
						';
                    } else {

                    }
                }
                ?>
                <div>
                    <ul class="uk-padding-remove">
                        <div class="uk-card uk-card-default uk-card-body">
                            <li><span>Naam</span><span>Bod</span><span>Datum</span></li>
                        </div>
                        <div class="uk-card uk-card-default uk-card-body">
                            <li><span>Naam</span><span>Bod</span><span>Datum</span></li>
                        </div>
                        <div class="uk-card uk-card-default uk-card-body">
                            <li><span>Naam</span><span>Bod</span><span>Datum</span></li>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
