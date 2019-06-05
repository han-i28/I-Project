<?php

class veilingController extends Controller {

    function index() {
        header("location: .");//naar home
    }

    function weergave() {
        if(isset($_GET['veiling'])) {
			
			/********** HIER IS DE BIED FUNCTIONALITEIT ***********/
			/*
				Deze code wordt gebruikt wanneer de knop op een veilingitem pagina wordt aangeklikt om te bieden, met het bod als input.
				Hierin wordt rekening gehouden met: sql injection, verkeerde users op de pagina, zekerheid rondom gebruikerinfo, en vergelijk met andere boden.
				Daarna wordt het bod in de database gegooid d.m.v. het veilingModel bestand.
				Wanneer er iets fout gaat door de input zal er teruggestuurd worden naar de veilingitem pagina, anders naar de homepage.
			*/
			
			if(isset($_POST['bod_submit'])) {
				if(isset($_POST['bod']) && !empty($_POST['bod'])) {
					session_start();
					if (isset($_SESSION['loggedIn'])) {
						require(PATH . '/model/veilingModel.php');
						$veilingModel = new veilingModel();
					
						if(!is_numeric($_POST['bod'])){
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
						
						$minWaardes = array("w1"=>49,99, "w2"=>199,99, "w3"=>499,99, "w4"=>4999,99, "w5"=>5000,00);
						$ophoogWaardes = array("o1"=>0,50, "o2"=>1,00, "o3"=>5,00, "o4"=>10,00, "o5"=>50,00);
						$floatBod = floatval($bod);
						
						if($hoogsteBod <= $minWaardes['w1']){
							if($floatBod - $minWaardes['w1'] < $ophoogWaardes['o1']){
								$data['error_input'] = "invalid_bod_minimal_value_w1";
							}
						} else if($hoogsteBod > $minWaardes['w2'] && $hoogsteBod <= $minWaardes['w3']){
							if($floatBod - $minWaardes['w2'] < $ophoogWaardes['o2']){
								$data['error_input'] = "invalid_bod_minimal_value_w2";
							}
						} else if($hoogsteBod > $minWaardes['w3'] && $hoogsteBod <= $minWaardes['w4']){
							if($floatBod - $minWaardes['w3'] < $ophoogWaardes['3']){
								$data['error_input'] = "invalid_bod_minimal_value_w3";
							}
						} else if($hoogsteBod > $minWaardes['w4'] && $hoogsteBod <= $minWaardes['w5']){
							if($floatBod - $minWaardes['w4'] < $ophoogWaardes['o4']){
								$data['error_input'] = "invalid_bod_minimal_value_w4";
							}
						} else if($hoogsteBod > $minWaardes['w5']){
							if($floatBod - $minWaardes['w5'] < $ophoogWaardes['o5']){
								$data['error_input'] = "invalid_bod_minimal_value_w5";
							}
						} else {
							//functionaliteit en security
							if($verkoper !== $currentUser){
								if ($hoogsteBodArray['bieder'] !== $currentUser) {
									if (preg_match("/^\d+\.\d{0,2}$/", $bod)) {
										if (strlen($bod) < 9) {
											if ((float)$bod > (float)$hoogsteBod) {
												$result = $veilingModel->createNewBod($datum, $currentUser, $voorwerpId, (float)$bod);
												$data['error_input'] = "success"; //							success
											}
											else {
												$data['error_input'] = "input_value_low";//						niet hoog genoeg geboden
											}
										}
										else {
											$data['error_input'] = "invalid_bod";//								input te groot
										}
									}
									else {
										$data['error_input'] = "invalid_bod";//									voldoet niet aan perg_match
									}
								}
								else {
									$data['error_input'] = "invalid_bod_user";//								zelf overbieden
								}
							} else {
								$data['error_input'] = "invalid_bod_own_product"; //						eigen product
							}
						}

						}						

					} else {
						header("location: .");//														naar home
					}
				} else {
					$data['error_input'] = "invalid_bod";//												empty input
				}
			}
		
			/*********** HIER EINDIGT DE BIED FUNCTIONALITEIT ***********/
			
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
            $data['html'] =  $this->generate_searchresults("Zoekresultaten", $searchModel->getResults($input));
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
                    <a href=\"/I-Project/veiling/weergave/?veiling=" . $value['ID'] . "\">
                        <div class=\"uk-card uk-card-default uk-card-body\">
                            <h4>" . $value['titel'] . "</h4>
                            <div class=\"afbeeldingContainer\" style=\"background-image: url('http://iproject28.icasites.nl/thumbnails/" . $value['pad'] . "');\"></div>
                            <h5>Hoogste bod: €x.xx</h5>
                            <h5>Eindigt in: x minuten</h5>
                        </div>
                    </a>
                </div>
                ";
            }
        }
        return $veilingListingHTML;
    }
}