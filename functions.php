<?php
//general functions

function generate_section($section_name){
    $html = '
        <div class="uk-container uk-width-3-5 uk-width-medium-2-4 uk-width-small-1-1 uk-section">
            <h2>'.$section_name.'</h2>
            <hr>
            <div class="items">'
                .get_items($section_name).'
            </div>
        </div>';
    return $html;
}

function get_items($item_type){
    $html = '';
    $html_part = '
        <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
            <div>
                <div class="uk-card uk-card-default uk-card-body">Item</div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">Item</div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">Item</div>
            </div>
        </div>
    ';
    
    for($i = 0; $i < 2; $i++){
        $html.=$html_part;
    }

    return $html;
}

?>