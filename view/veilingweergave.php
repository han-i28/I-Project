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
                                    <div style="background-image: url('http://iproject28.icasites.nl/pics/<?= $value['pad']; ?>');" class="afbeeldingContainer miniAfbeelding" data-path="http://iproject28.icasites.nl/pics/<?php echo $value['pad']; ?>"></div>
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
                    Startprijs: &euro; <?php echo number_format($this->vars['veiling']['startprijs'], 2); ?></br>
                    Conditie: <?php echo $this->vars['veiling']['conditie']; ?>
                </p>
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
                <?php
                if (isset($_SESSION['loggedIn'])) {
                    if ($_SESSION['loggedIn'] === true) {
                        ?>
                        <legend class="uk-legend">Bieden</legend>
                        <?php if(isset($this->vars['error_input'])){
                            if($this->vars['error_input'] == 'success'){
                                $html = "<div class=\"uk-alert-succes\" uk-alert><p>Uw bod is geplaatst.</p></div>";
                                echo $html;
                            } else if($this->vars['error_input'] == 'invalid_bod'){
                                $html = "<div class=\"uk-alert-danger\" uk-alert><p>Geen geldig bod.</p></div>";
                                echo $html;
                            } else if($this->vars['error_input'] == 'invalid_bod_user'){
                                $html = "<div class=\"uk-alert-danger\" uk-alert><p>U kunt uzelf niet overbieden.</p></div>";
                                echo $html;
                            } else if($this->vars['error_input'] == 'input_value_low'){
                                $html = "<div class=\"uk-alert-danger\" uk-alert><p>Uw bod is niet hoog genoeg.</p></div>";
                                echo $html;
                            } else if($this->vars['error_input'] == 'invalid_bod_own_product'){
                                $html = "<div class=\"uk-alert-danger\" uk-alert><p>U kunt niet op uw eigen product bieden.</p></div>";
                                echo $html;
                            } else if($this->vars['error_input'] == 'invalid_bod_minimal_value_w1'){
                                $html = "<div class=\"uk-alert-danger\" uk-alert><p>Uw bod is niet hoog genoeg. Bied minimaal &euro; 0,50 meer dan het huidige bod.</p></div>";
                                echo $html;
                            } else if($this->vars['error_input'] == 'invalid_bod_minimal_value_w2'){
                                $html = "<div class=\"uk-alert-danger\" uk-alert><p>Uw bod is niet hoog genoeg. Bied minimaal &euro; 1,- meer dan het huidige bod.</p></div>";
                                echo $html;
                            } else if($this->vars['error_input'] == 'invalid_bod_minimal_value_w3'){
                                $html = "<div class=\"uk-alert-danger\" uk-alert><p>Uw bod is niet hoog genoeg. Bied minimaal &euro; 5,- meer dan het huidige bod.</p></div>";
                                echo $html;
                            } else if($this->vars['error_input'] == 'invalid_bod_minimal_value_w4'){
                                $html = "<div class=\"uk-alert-danger\" uk-alert><p>Uw bod is niet hoog genoeg. Bied minimaal &euro; 10,- meer dan het huidige bod.</p></div>";
                                echo $html;
                            } else if($this->vars['error_input'] == 'invalid_bod_minimal_value_w5'){
                                $html = "<div class=\"uk-alert-danger\" uk-alert><p>Uw bod is niet hoog genoeg. Bied minimaal &euro; 50,- meer dan het huidige bod.</p></div>";
                                echo $html;
                            } else if($this->vars['error_input'] == 'invalid_bod_not_numeric'){
                                $html = "<div class=\"uk-alert-danger\" uk-alert><p>Voer een geldig bedrag in.</p></div>";
                                echo $html;
                            }

                        }
                        ?>
                        </br>
                        <div>
                            <form action="" method="post" id="bieden_form">
                                <input class="uk-input uk-width-expand" id="bod" name="bod" type="text" placeholder="&euro; 9.99" maxlength="9">
                                <button class="uk-button uk-button-primary custom_button uk-width-expand" style="background-color:#5f4b8b;" type="submit" name="bod_submit">Bieden</button><br><br>
                            </form>
                        </div>
                        <?php
                        }
                    } else {
                        ?>
                        <h3>Log in om te kunnen bieden!</h3>
                        <?php
                    }
                    ?>
                <?php echo $this->vars['biedingen']; ?>
            </div>
        </div>
    </div>
</div>
