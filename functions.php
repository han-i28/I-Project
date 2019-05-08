<?php
//general functions

function generate_section($section_name){
    $html = '
        <div class="uk-container uk-width-3-5 uk-section">
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

function your_auctions(){
    $html = '
    <div class="uk-card uk-card-default uk-card-title uk-width-1-5 uk-position-center-right">
        <div class="uk-card-header">
            Uw veilingen
        </div>
        <div class="uk-card-body">
            <ul class="uk-nav">
                <li>voorbeeld1</li>
                <li>voorbeeld2</li>
            </ul>
        </div>
    </div>';
    return $html;
}

function your_biddings(){
    $html = '
    <div class="uk-card uk-card-default uk-card-title uk-width-1-5 uk-position-bottom-right">
        <div class="uk-card-header">
            Uw biedingen
        </div>
        <div class="uk-card-body">
            <ul class="uk-nav">
                <li>voorbeeld1</li>
                <li>voorbeeld2</li>
            </ul>
        </div>
    </div>
    ';
    return $html;
}

?>