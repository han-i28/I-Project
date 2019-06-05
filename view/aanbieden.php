<div class="uk-container uk-card uk-card-default uk-width-1-2@s uk-margin-top">
    <div class="uk-grid" uk-grid>
        <form action="" class="uk-form-horizontal uk-width-1-1 uk-margin-large"  method="post" enctype="multipart/form-data">
            <h1 class="uk-margin-top uk-width-1-1 uk-text-center uk-card-title">Nieuwe veiling maken</h1>
            <?=$message?>
            <p class="uk-width-1-1 uk-text-center"><b>Let op:</b> velden met aan de rechterzijde het <span class="uk-icon" uk-icon="icon: chevron-double-left"></span> icoon zijn verplicht.</p>
            <div class="uk-width-1-1 uk-margin-top">
                <label class="uk-form-label" for="titel">Titel</label>
                <div class="uk-form-controls">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" type="text" id="titel" name="titel" placeholder="Titel" value="<?= (isset($_POST['titel']) ? $_POST['titel'] : null); ?>">
                    </div>
                </div>
            </div>

            <div class="uk-width-1-1 uk-margin-top">
                <label class="uk-form-label" for="beschrijving">Beschrijving</label>
                <div class="uk-form-controls">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <textarea class="uk-input" id="beschrijving" name="beschrijving" rows="5"  placeholder="Geef een beschrijving" ></textarea>
                    </div>
                </div>
            </div>

            <div class="uk-width-1-1 uk-margin-top">
                <label class="uk-form-label" for="startprijs">Startprijs €</label>
                <div class="uk-form-controls">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" type="number" id="startprijs" name="startprijs" placeholder="€" value="<?= (isset($_POST['startprijs']) ? $_POST['startprijs'] : null); ?>">
                    </div>
                </div>
            </div>

            <div class="uk-width-1-1 uk-margin-top"> <!--uk-width-1-2@s-->
                <label class="uk-form-label" for="betalingswijze">Betalingswijze</label>
                <div class="uk-form-controls">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <select class="uk-select" name="betalingswijze" id="betalingswijze" ">
                        <option selected disabled>Kies een betalingswijze</option>
                        <option value="contant">contant</option>
                        <option value="PayPal">PayPal</option>
                        <option value="Ideal">Ideal</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="uk-width-1-1 uk-margin-top">
                <label class="uk-form-label" for="betalingsinstructie">Betalingsinstructie</label>
                <div class="uk-form-controls">
                    <div class="uk-inline uk-width-1-1">
                        <input class="uk-input" type="text" id="betalingsinstructie" name="betalingsinstructie" placeholder="Betalingsinstructie" value="<?= (isset($_POST['betalingsinstructie']) ? $_POST['betalingsinstructie'] : null); ?>">
                    </div>
                </div>
            </div>

            <!-- postcode moet uit de database komen -->
            <!-- plaatsnaam moet uit de database komen -->
            <!-- GBA-Code moet uit de database komen -->

            <div class="uk-width-1-1 uk-margin-top">
                <label class="uk-form-label" for="verzendkosten">Eventuele verzendkosten €</label>
                <div class="uk-form-controls">
                    <div class="uk-inline uk-width-1-1"> <!-- minimum van 0 moeten invoeren bij ophalen en hoger bij verzenden-->
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <input class="uk-input" type="number" id="verzendkosten" name="verzendkosten" placeholder="€" value="<?= (isset($_POST['verzendkosten']) ? $_POST['verzendkosten'] : null); ?>">
                    </div>
                </div>
            </div>

            <div class="uk-width-1-1 uk-margin-top">
                <label class="uk-form-label" for="verzendinstructies">Eventuele Verzendinstructie</label>
                <div class="uk-form-controls">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <textarea class="uk-input" id="verzendinstructies" name="verzendinstructies" rows="5"  placeholder="Geef een eventuele verzend instructie" ></textarea>
                    </div>
                </div>
            </div>

            <!-- verkoper moet automatisch in de database worden gezet -->
            <!-- de koper word later ingevuld-->

            <div class="uk-width-1-1 uk-margin-top"> <!--uk-width-1-2@s-->
                <label class="uk-form-label" for="looptijd">Hoe lang blijft de veiling lopen?</label>
                <div class="uk-form-controls">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <select class="uk-select" name="looptijd" id="looptijd">
                            <option selected disabled>Kies een looptijd</option>
                            <option value="3">3 dagen</option>
                            <option value="5">5 dagen</option>
                            <option value="7">7 dagen</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- veiling gesloten standaard 0-->
            <!-- verkoopprijs wordt later ingevuld-->

            <div class="uk-width-1-1 uk-margin-top"> <!--uk-width-1-2@s-->
                <label class="uk-form-label" for="conditie">Geef de conditie van het object</label>
                <div class="uk-form-controls">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: chevron-double-left"></span>
                        <select class="uk-select" name="conditie" id="conditie" >
                            <option selected disabled>Kies een conditie</option>
                            <option value="nieuw">Nieuw</option>
                            <option value="zo goed als nieuw">zo goed als nieuw</option>
                            <option value="gebruikt">Gebruikt</option>
                            <option value="beschadigd">Beschadigd, zie beschrijving</option>
                        </select>
                    </div>
                </div>
            </div>


            <input type="file" multiple name="fileToUpload[]" id="fileToUpload">    voeg afbeeldingen toe<br>


            <button class="uk-button uk-button-primary uk-margin-top uk-text-middle uk-width-1-1" name="aanbieden_submit" type="submit">Versturen</button>
        </form>
    </div>
</div>
