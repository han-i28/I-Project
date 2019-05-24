<div class="uk-container">
    <div class="uk-grid">
        <div class="uk-width-3-5@l uk-width-3-5@m uk-width-1-1@s">
            <div class="uk-card uk-card-default uk-card-body">
                <h1><?php echo $this->vars['veiling']['Titel']; ?></h1>
                <img src="https://picsum.photos/id/914/400/300" alt="Afbeelding">
            </div>
            <div class="uk-card uk-card-default uk-card-body">
                <legend class="uk-legend">Beschrijving</legend>
                <p>
                    <?php echo $this->vars['veiling']['Beschrijving']; ?>
                </p>
            </div>
        </div>


        <div class="uk-width-2-5@l uk-width-2-5@m uk-width-1-1@s">
            <div class="uk-card uk-card-default uk-card-body">
                <h1>Verkoper</h1>
                <p>
                    Verkoper: <?php echo $this->vars['veiling']['Verkoper']; ?></br>
                    Startprijs: <?php echo $this->vars['veiling']['Prijs']; ?></br>
                    Conditie: <?php echo $this->vars['veiling']['Conditie']; ?>
                </p>

                        <p>
                            Hoogste bod:</br>
                            Pepijn - &euro;40
                        </p>

                </br>
                <div class="uk-container">
                    <p>Resterende tijd: 2 Dagen 15 Minuten 34 Seconden</p>
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
