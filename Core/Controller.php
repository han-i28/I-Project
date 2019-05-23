<?php
    class Controller {
        var $vars = [];

        function set($d) {
            $this->vars = array_merge($this->vars, $d);
        }

        function load_view($filename) {
            extract($this->vars);
            require("../Views/" . $filename . '.php');
        }

        private function secure_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        protected function secure_form($form) {
            foreach ($form as $key => $value)
            {
                $form[$key] = $this->secure_input($value);
            }
        }

        function generate_section($section_name, $items){
            $item_html = '';
            foreach($items as $item) {
                $item_html.= $this->get_item_html($item);
            }

            $html = '
            <div class="uk-container uk-width-1-2 uk-width-medium-1-2 uk-width-small-1-1s uk-margin-small item-section">
                <h2>'.$section_name.'</h2>
                <div class="uk-position-relative">
                    <div uk-slider>
                        <div class="uk-position-relative uk-dark uk-visible-toggle" tabindex="-1">
                            <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@m uk-child-width-1-2@s uk-grid uk-grid-small">
                            ' . $item_html . '
                            </ul>
                        </div>
                        <a class="uk-position-center-left-out uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right-out uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
                    </div>
                </div>
            </div>';
            return $html;
        }

        function get_item_html($item){//parameter: item object
            $html = '
                <li class="uk-card uk-card-default uk-card-body">
                <a href="product?nummer=' . $item['voorwerpnummer'] . '">
                    <h3 class="uk-text-truncate">' . $item['titel'] . '</h3>
                    <img src="http://iproject28.icasites.nl/thumbnails/' . $item['pad'] . '" alt="afbeelding" style="height: 15vh;">
                    <h5 class="uk-text-truncate">' . $item['beschrijving'] . '</h5>
                </a>
                </li>
            ';
            return $html;
        }

        function generate_searchresults($section_name, $items){
            $item_html = '';
            foreach($items as $item) {
                $item_html.= $this->get_searchresults_html($item);
            }

            $html = '<div class="uk-grid-small uk-child-width-1-3@xl uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-2@s uk-text-center uk-grid uk-flex-top uk-flex-wrap-top" uk-grid="masonry: true" style="height: 394px;">
                ' . $item_html . '
            </div>
            ';
            return $html;
        }

        function get_searchresults_html($item){
            $html = 
            '<div style="transform: translateY(0px);">
                <a href="/I-Project/veiling/weergave/?veiling=' . $item['voorwerpnummer']. '">
                <div class="uk-card uk-card-default uk-card-body">
                    <h4 class="uk-text-truncate">' . $item['titel'] . '</h4>
                    <div class="afbeeldingContainer" style="background-image: url(\'http://iproject28.icasites.nl/thumbnails/' . $item['pad'] . ' \');"></div>
                    <h5>Hoogste bod: €x.xx</h5>
                    <h5>Eindigt in:                 
                    <script language="JavaScript" type="text/javascript" src="countdown.js">
                        var c = new countdown();
                        c.TargetDate = ' . $item['looptijdEinde'] . ';
                        console.log(c);
                    </script>
                    </h5>
                </div>
                </a>
            </div>';
            return $html;
        }
    }
?>