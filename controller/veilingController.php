<?php

class veilingController extends Controller {

    function index() {
        header("location: .");//naar home
    }

    function weergave() {
        if(isset($_GET['veiling'])) {
            $veilingid = $_GET['veiling'];
            require(PATH . '/model/veilingModel.php');
            $veilingModel = new veilingModel();
            $result = $veilingModel->getVeilingById($veilingid);

            if(empty($result)) {
                echo 'veiling bestaat niet';
            } else {
                $data['veiling'] = $result;
                $data['afbeelding'] = $veilingModel->getAfbeeldingenById($veilingid);

                $data['title'] = "Eenmaal Andermaal - home";
                $data['page'] = "veilingweergave";
                $this->set($data);
                $this->load_view("template");
            }
        } else {
            header("location: .");//naar home
        }
    }

    function zoekopdracht() {
        if(isset($_GET['rubriek'])) {
            require(PATH . '/model/veilingModel.php');
            $veilingModel = new veilingModel();

            $rubriekid = $_GET['rubriek'];

            $hoofdRubriek = $veilingModel->getParentRubriek($rubriekid);
            $rubrieken = $veilingModel->getRubriekenByParent($hoofdRubriek['ID']);

            if(!empty($hoofdRubriek)) {

                $data['hoofdRubriek'] = $hoofdRubriek['naam'];
                $data['rubriekenHTML'] = $this->createRubriekenHTML($rubrieken);
            }

            $resultaten = $veilingModel->getVeilingenByRubriek($rubriekid);

            $data['veilingen'] = $this->createVeilingListingHTML($resultaten);


        }
        if(isset($_GET['search'])){
            require(PATH . '/model/searchModel.php');
            $searchModel = new searchModel();
            $input = $_GET['search'];
            $data['html'] = $this->createVeilingListingHTML($searchModel->getResults($input));
        }

        $data['title'] = "Eenmaal Andermaal - home";
        $data['page'] = "zoekweergave";
        $this->set($data);
        $this->load_view("template");
    }

    private function createRubriekenHTML($data) {
        $categorieHtml = "";
        if(empty($data)) {
            $categorieHtml .= "<p>Geen rubrieken meer</p>";
        } else {
            foreach ($data as $value) {
                $categorieHtml .= "
                <li>
                    <a href=\"?rubriek=" . $value['ID'] . "\" class='uk-padding-remove-left uk-padding-remove-right'>" . $value['naam'] . "</a>
                </li>
            ";
            }
        }
        return $categorieHtml;
    }

    private function createVeilingListingHTML($veilingData) {
        $veilingListingHTML = "";
        if(empty($veilingData)) {
            $veilingListingHTML .= "
                <div class='uk-width-expand'>
                    <div class=\"uk-card uk-card-default uk-card-body\">
                        <p>Geen resultaten!</p>
                    </div>
                </div>
                ";
        } else {
            foreach ($veilingData as $value) {
                $veilingListingHTML .= "
                <div>
                    <a href=\"" .  SITEURL . "veiling/weergave/?veiling=" . $value['voorwerpnummer'] . "\">
                        <div class=\"uk-card uk-card-default uk-card-body\">
                            <h4>" . $value['titel'] . "</h4>
                            <div class=\"afbeeldingContainer\" style=\"background-image: url('http://iproject28.icasites.nl/thumbnails/" . $value['pad'] . "');\"></div>
                            <h5>Hoogste bod: €" . number_format($value['bod'], 2) . "</h5>
                            <h5>Eindigt in:                                     
                            </h5>
                            <div class=\"uk-grid-small uk-child-width-auto uk-flex-around\" uk-grid uk-countdown=\"date: " . $value['looptijdEinde'] . "\">
                                <div>
                                    <div class=\"uk-countdown-number uk-countdown-days\">dagen</div>
                                    <div>dagen</div>
                                </div>
                                <div>
                                    <div class=\"uk-countdown-number uk-countdown-hours\">uren</div>
                                    <div>uren</div>
                                </div>
                                <div>
                                    <div class=\"uk-countdown-number uk-countdown-minutes\">minuten</div>
                                    <div>minuten</div>
                                </div>
                                <div>
                                    <div class=\"uk-countdown-number uk-countdown-seconds\"></div>
                                    <div>seconden</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                ";
            }
        }
        return $veilingListingHTML;
    }
}

?>