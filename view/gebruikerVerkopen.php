<div class="uk-container">
    <div class="uk-grid">
        <div class="uk-width-expand">
            <div class="uk-card uk-card-default uk-card-body">
                <h1>Een nieuw voorwerp aanbieden</h1>
                <form method="post" action="" enctype="multipart/form-data">

                    <label>Titel</label>
                    <input type="text" id="titel" class="uk-input" name="titel">

                    <label>Beschrijving</label>
                    <textarea id="beschrijving" class="uk-textarea" name="beschrijving"></textarea>

                    <label>Rubriek</label>
                    <select id="rubriek" class="uk-select" name="rubriek">
                        <option selected disabled>Kies de rubriek die het best past bij uw item</option>
                    </select>

                    <label>Conditie</label>
                    <select id="conditie" class="uk-select" name="conditie">
                        <option selected disabled>Kies de conditie van het item</option>
                        <option value="0">Nieuw</option>
                        <option value="1">Nieuw zonder labels</option>
                        <option value="2">Nieuw: Overige (zie details)</option>
                        <option value="3">Vrijwel nieuw</option>
                        <option value="4">Heel goed</option>
                        <option value="5">Goed</option>
                        <option value="6">Opgeknapt door de verkoper</option>
                        <option value="7">Redelijk</option>
                        <option value="8">Tweedehands</option>
                    </select>

                    <label>Start prijs</label>
                    <input type="number" id="startPrijs" class="uk-input" name="startPrijs">

                    <input type="file" name="afbeelding[]" multiple>

                    <input type="submit" class="uk-button uk-button-primary uk-width" name="submit">

                </form>
                <script>

                </script>
            </div>
        </div>
    </div>
</div>
