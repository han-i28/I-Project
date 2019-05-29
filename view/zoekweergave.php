<div class="uk-container">
    <div class="uk-card uk-card-default uk-card-body uk-flex">
        <h3 class="uk-card-title">
            <?php
                if(isset($this->vars['hoofdRubriek'])) {
                    echo $this->vars['hoofdRubriek'];
                } else if(isset($_GET['search'])) {
                    echo "Gezocht op: " . $_GET['search'];
                }
        ?>
        </h3>
        <ul class="uk-breadcrumb">
            <li><a href="">a</a></li>
            <li><a href="">b</a></li>
            <li><span>c</span></li>
        </ul>
    </div>
    <div class="uk-grid-small" uk-grid>
        <div class="uk-width-1-5@l uk-width-1-5@m uk-width-1-1@s">
            <div class="uk-card uk-card-default uk-card-body"><h3>
                    <ul class="uk-nav-default uk-overflow-auto" uk-nav>
                        <?php if(isset($this->vars['rubriekenHTML'])) { echo $this->vars['rubriekenHTML']; } ?>
                    </ul>
            </div>
        </div>
        <div class="uk-width-4-5@l uk-width-4-5@m uk-width-expand@s">
            <div class="uk-grid-small uk-child-width-1-3@xl uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-2@s uk-text-center" uk-grid="masonry: true" uk-grid>
                <?php if(isset($this->vars['veilingen'])) { echo $this->vars['veilingen']; } ?>
                <?php if(isset($this->vars['html'])) { echo $this->vars['html']; } ?>
            </div>
        </div>
    </div>
</div>
