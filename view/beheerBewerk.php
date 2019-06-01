<?php 
    if (isset($_SESSION['isBeheerder']) && $_SESSION['isBeheerder'] == true) { ?>
        <div class="uk-container">
            <h2>Huidige rubriek:</h2>
            <h4 class="uk-margin-remove-top"><?php echo $this->vars['rubriek'][0]['naam'] ?></h4>
            <div class="uk-container">
            <form action="">
                <label for="bewerk">Wijzig naam:</label>
                <input type="text" name="bewerk" id="" class="uk-input" placeholder="<?php echo $this->vars['rubriek'][0]['naam'] ?>">
                <button class="uk-button uk-button-primary">Submit</button>
            </form>
            <div>
            <div>
                <ul class="uk-list uk-list-striped">        
                    <?php echo $this->vars['children'] ?>
                </ul>
            </div>
        </div>
        </div>
        </div>
        
        <div class="uk-container">
            <h2>Parentrubriek:</h2>
            <?php echo "<a href=\"?rubriek=" . $this->vars['parent'][0]['ID'] . "\"><p>" . $this->vars['parent'][0]['naam'] . "</p></a>";?>

            <form action="">
                <label for="voegtoe">Voeg een rubriek toe:</label>
                <input type="text" name="voegtoe" id="" class="uk-input" placeholder="Nieuwe rubriek">
                <button class="uk-button uk-button-primary">Submit</button>
            </form>
        </div>

    <?php } else  { ?>
        <h2>U bent geen beheerder.</h2>
    <?php } ?>