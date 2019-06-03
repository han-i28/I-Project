<?php 
    if(isset($this->vars['error_input'])) {
        echo '<br><br>';
        if($this->vars['error_input'] == 'empty_field'){
            echo '<div class="uk-alert-danger" style="margin-left: 30%; margin-right: 30%; text-align: center;" uk-alert>Het veld is niet ingevuld.</div>';
        }
    } 
?>
        <div class="uk-container">
            <h2>Huidige rubriek:</h2>
            <h4 class="uk-margin-remove-top"><?php echo $this->vars['rubriek'][0]['naam'] ?></h4>
            <div class="uk-container">
            <form action="" method="POST">
                <label for="bewerkNaam">Wijzig naam:</label>
                <input type="text" name="bewerkNaam" id="" class="uk-input" placeholder="<?php echo $this->vars['rubriek'][0]['naam'] ?>">
                <button class="uk-button uk-button-primary uk-width" name="bewerkNaam_submit">Submit</button>
            </form>
            <div>
            <?php if($this->vars['children'] == null) {
                //laat niets zien
            } else { ?>
                <div>
                    <h2 class="uk-margin-top">Sub-rubrieken:</h2>
                    <ul class="uk-list uk-list-striped">        
                        <?php echo $this->vars['children'] ?>
                    </ul>
                </div>
            <?php } ?>
            </div>
        </div>
        </div>
        <?php if($this->vars['parent'] == null) {
            // laat niets zien
        } else { ?>
        <div class="uk-container">
            <h2>Parentrubriek:</h2>
            <?php echo "<a href=\"?rubriek=" . $this->vars['parent'][0]['ID'] . "\"><p>" . $this->vars['parent'][0]['naam'] . "</p></a>";?>
        <?php } ?>
            <form action="" method="POST">
                <h2>Nieuwe rubriek</h2>
                <label for="voegToe">Voeg een rubriek toe:</label>
                <input type="text" name="voegToe" id="" class="uk-input" placeholder="Nieuwe rubriek">
                <button class="uk-button uk-button-primary uk-width" name="voegToe_submit">Submit</button>
            </form>
            <?php if($this->vars['parent'] == null){
                    //laat niets zien
                } else { ?>
                <h2>Verander parent:</h2>                
                    <form action="" method="POST">
                        <label>Kies parent:</label>
                        <select name="nieuweParent"  class="uk-select" id="">
                            <option selected disabled>Kies een parentrubriek</option>
                            <option value="-1">ROOT</option>
                            <?php echo $this->vars['parentrubrieken'] ?>
                        </select>
                        <button class="uk-button uk-button-primary uk-width" name="nieuweParent_submit">Submit</button>
                    </form>
                <?php } ?>
            </div>
        </div>

        