<?php

class veilingController extends Controller {

    function index() {
        header("location: " . SITEURL . "");//naar home
    }

    function weergave() {
        if(isset($_GET['veiling'])) {
            if(isset($_POST['bod_submit'])) { // checkt button
                if (isset($_POST['bod']) && !empty($_POST['bod'])) { //checkt empty biedingveld
                    session_start();
                    if (isset($_SESSION['loggedIn'])) { //checkt of gebruiker is ingelogd
                        require(PATH . '/model/veilingModel.php');
                        $veilingModel = new veilingModel();
                        $ophoogWaarde = 0;
                        if (!is_numeric($_POST['bod'])) { //checkt of input numeric is
                            $data['error_input'] = "invalid_bod_not_numeric";
                        } else {
                            //aanmaken van alle variabelen
                            $datum = date("Y-m-d H:i:s");
                            $currentUser = $_SESSION['gebruikersnaam'];
                            $voorwerpId = $_GET['veiling'];
                            $bod = strval(number_format((float)strip_tags(isset($_POST['bod']) ? $_POST['bod'] : null), 2, '.', ''));
                            $hoogsteBodArray = $veilingModel->getHoogsteBod($voorwerpId);
                            $hoogsteBod = rtrim($hoogsteBodArray['bod'], "0");
                            $verkoper = $veilingModel->getVerkoperByID($voorwerpId);
                            $startPrijs = $veilingModel->getStartPrijsByID($voorwerpId);

                            $minWaardes = array("w1" => 49.99, "w2" => 199.99, "w3" => 499.99, "w4" => 4999.99, "w5" => 5000.00);
                            $ophoogWaardes = array("o1" => 0.50, "o2" => 1.00, "o3" => 5.00, "o4" => 10.00, "o5" => 50.00);
                            $floatBod = floatval($bod);

                            if($floatBod > $hoogsteBod){
                                if($hoogsteBod <= $minWaardes['w1']){
                                    $ophoogWaarde = $ophoogWaardes['o1'];
                                } else if($hoogsteBod > $minWaardes['w1'] && $hoogsteBod <= $minWaardes['w2']){
                                    $ophoogWaarde = $ophoogWaardes['o2'];
                                } else if($hoogsteBod > $minWaardes['w2'] && $hoogsteBod <= $minWaardes['w3']){
                                    $ophoogWaarde = $ophoogWaardes['o3'];
                                } else if($hoogsteBod > $minWaardes['w3'] && $hoogsteBod <= $minWaardes['w4']){
                                    $ophoogWaarde = $ophoogWaardes['o4'];
                                } else if($hoogsteBod > $minWaardes['w4']){
                                    $ophoogWaarde = $ophoogWaardes['o5'];
                                }
                            }

                                //functionaliteit en security
                                if ($verkoper !== $currentUser) {
                                    if ($hoogsteBodArray['bieder'] !== $currentUser) {
                                        if (preg_match("/^\d+\.\d{0,2}$/", $bod)) {
                                            if (strlen($bod) < 9) {
                                                if ($floatBod - $hoogsteBod >= $ophoogWaarde) {
                                                    $data['error_input'] = "success";

                                                    $result = $veilingModel->createNewBod($datum, $currentUser, $voorwerpId, (float)$bod);
                                                    $data['error_input'] = "success"; //							success
                                                } else {
													if ($ophoogWaarde == 0.50) {
														$data['error_input'] = "invalid_bod_minimal_value_w1";
													}
													elseif ($ophoogWaarde == 1.00) {
														$data['error_input'] = "invalid_bod_minimal_value_w2";
													}
													elseif ($ophoogWaarde == 5.00) {
														$data['error_input'] = "invalid_bod_minimal_value_w3";
													}
													elseif ($ophoogWaarde == 10.00) {
														$data['error_input'] = "invalid_bod_minimal_value_w4";
													}
													elseif ($ophoogWaarde == 50.00) {
														$data['error_input'] = "invalid_bod_minimal_value_w5";
													}
                                                }
                                            } else {
                                                $data['error_input'] = "invalid_bod";//								input te groot
                                            }
                                        } else {
                                            $data['error_input'] = "invalid_bod";//									voldoet niet aan perg_match
                                        }
                                    } else {
                                        $data['error_input'] = "invalid_bod_user";//								zelf overbieden
                                    }
                                } else {
                                    $data['error_input'] = "invalid_bod_own_product"; //						    eigen product
                                }

                        }
                    } else {
                        header("location: " . SITEURL . "");//														naar home
                    }
                } else {
                    $data['error_input'] = "invalid_bod";//												empty input
                }
            }


            $veilingid = $_GET['veiling'];
            if (!isset($veilingModel)) {
                require(PATH . '/model/veilingModel.php');
                $veilingModel = new veilingModel();
            }
            $result = $veilingModel->getVeilingById($veilingid);
            if(empty($result)) {
                echo 'veiling bestaat niet';
            } else {
                $data['veiling'] = $result;
                $data['afbeelding'] = $veilingModel->getAfbeeldingenById($veilingid);
                $data['bod'] = $veilingModel->getBidHistory($veilingid);
                $data['biedingen'] = $this->generate_bid_history($data['bod']);
                $data['title'] = "Eenmaal Andermaal - home";
                $data['page'] = "veilingweergave";
                $this->set($data);
                $this->load_view("template");
            }
        } else {
            header("location: " . SITEURL . "");//naar home
        }
    }

    function zoekopdracht() {
        if (isset($_GET['rubriek'])) {
            require(PATH . '/model/veilingModel.php');
            $veilingModel = new veilingModel();

            $rubriekid = $_GET['rubriek'];

            $hoofdRubriek = $veilingModel->getParentRubriek($rubriekid);
            $rubrieken = $veilingModel->getRubriekenByParent($hoofdRubriek['ID']);

            if (!empty($hoofdRubriek)) {

                $data['hoofdRubriek'] = $hoofdRubriek['naam'];
                $data['rubriekenHTML'] = $this->createRubriekenHTML($rubrieken);
            }

            $resultaten = $veilingModel->getVeilingenByRubriek($rubriekid);

            $data['veilingen'] = $this->generate_searchresults("", $resultaten);


        }
        if (isset($_GET['search'])) {
            require(PATH . '/model/searchModel.php');
            $searchModel = new searchModel();
            $input = $_GET['search'];
            $data['html'] = $this->generate_searchresults("Zoekresultaten", $searchModel->getResults($input));
        }

        $data['title'] = "Eenmaal Andermaal - home";
        $data['page'] = "zoekweergave";
        $this->set($data);
        $this->load_view("template");
    }

    private function createRubriekenHTML($data)
    {
        $categorieHtml = "";
        if (empty($data)) {
            $categorieHtml .= "<p>Geen rubrieken meer</p>";
        } else {
            foreach ($data as $value) {
                $categorieHtml .= "
                <li>
                    <a href=\"?rubriek=" . $value['ID'] . "\" class='uk-padding-remove-left uk-padding-remove-right'>" . $value['naam'] . " (" . $value['aantal'] . ")</a>
                </li>
            ";
            }
        }
        return $categorieHtml;
    }

    private function createVeilingListingHTML($veilingData)
    {
        $veilingListingHTML = "";
        if (empty($veilingData)) {
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
                    <a href=\"" . SITEURL . "veiling/weergave/?veiling=" . $value['voorwerpnummer'] . "\">
                        <div class=\"uk-card uk-card-default uk-card-body\">
                            <h4>" . $value['titel'] . "</h4>
                            <div class=\"afbeeldingContainer\" style=\"background-image: url('http://iproject28.icasites.nl/thumbnails/" . $value['pad'] . "');\"></div>
                            <h5>Hoogste bod: &euro;x.xx</h5>
                            <h5>Eindigt in: x minuten</h5>
                        </div>
                    </a>
                </div>
                ";
            }
        }
        return $veilingListingHTML;
    }

    function generate_bid_history($biddings)
    {
        $bid_html = '';
        foreach ($biddings as $bid) {
            $bid_html .= $this->get_biddings($bid);
        }

        $bid_html = '<div> <ul class="uk-padding-remove">' . $bid_html . '</ul></div>';
        return $bid_html;
    }

    function get_biddings($bid)
    {
        $html = '<div class="uk-card uk-card-default uk-card-body">
            <li style="list-style-type: none;">
                <span>' . $bid['bieder'] . '</span>            
                <span class="uk-align-right uk-text-bold">&euro;' . number_format($bid['bod'], 2) . '</span>
                <span class="uk-align-bottom uk-margin-remove">' . $bid['datum'] . '</span>
            </li>
            </div>';
        return $html;
    }
}

?>
