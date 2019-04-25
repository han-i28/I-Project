<?php
    require 'header.php';
?>

<html>

<head>
    <title>Eenmaal Andermaal | Homepage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.2/css/uikit.min.css" />
    <link rel="stylesheet" href="style.css">
    <!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.2/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.2/js/uikit-icons.min.js"></script>

    <meta name="viewport" content="width=device-width, user-scalable=no">
</head>

<body>
    <div class="uk-card uk-card-default uk-card-body uk-width-1-5 uk-position-center-left">
        <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
            <li class="uk-active"><a href="#">Active</a></li>
            <li class="uk-parent">
                <a href="#">Parent</a>
                <ul class="uk-nav-sub">
                    <li><a href="#">Sub item</a></li>
                    <li><a href="#">Sub item</a></li>
                </ul>
            </li>
            <li class="uk-parent">
                <a href="#">Parent</a>
                <ul class="uk-nav-sub">
                    <li><a href="#">Sub item</a></li>
                    <li><a href="#">Sub item</a></li>
                </ul>
            </li>
            <li class="uk-parent">
                <a href="#">Parent</a>
                <ul class="uk-nav-sub">
                    <li><a href="#">Sub item</a></li>
                    <li><a href="#">Sub item</a></li>
                </ul>
            </li>

            <li class="uk-parent">
                <a href="#">Parent</a>
                <ul class="uk-nav-sub">
                    <li><a href="#">Sub item</a></li>
                    <li><a href="#">Sub item</a></li>
                </ul>
            </li>

            <li class="uk-parent">
                <a href="#">Parent</a>
                <ul class="uk-nav-sub">
                    <li><a href="#">Sub item</a></li>
                    <li><a href="#">Sub item</a></li>
                </ul>
            </li>

            <li class="uk-parent">
                <a href="#">Parent</a>
                <ul class="uk-nav-sub">
                    <li><a href="#">Sub item</a></li>
                    <li><a href="#">Sub item</a></li>
                </ul>
            </li>

            <li class="uk-parent">
                <a href="#">Parent</a>
                <ul class="uk-nav-sub">
                    <li><a href="#">Sub item</a></li>
                    <li><a href="#">Sub item</a></li>
                </ul>
            </li>
        </ul>

    </div>

    <?php echo get_section('Highlights');?>
    <?php echo get_section('Rubriek');?>
    <?php echo get_section('Rubriek');?>

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
    </div>
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
    <?php require_once 'footer.php';?>
</body>

</html>

<?php 
    //functions
    function get_section($section_name){
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
?>