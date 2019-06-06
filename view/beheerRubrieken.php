<?php 
    if (isset($_SESSION['isBeheerder']) && $_SESSION['isBeheerder'] == true) { ?>
    <div class="uk-width uk-child-width-1" uk-grid>
            <h2>Kies een item dat u wilt aanpassen</h2>
            <ul uk-height-viewport="offset-top: true" class="uk-nav-default uk-nav-parent-icon uk-panel uk-panel-scrollable uk-height-viewport uk-overflow-auto uk-nav rubriekenboom" uk-nav="" style="min-height: calc(100vh - 184px);">
                <?php
                echo $this->vars['rubriekenHTML'];
                ?>
            </ul>
    </div>
    <?php } else  { ?>
        <h2>U bent geen beheerder.</h2>
    <?php } ?>