<?php

class veilingController extends Controller {

    function index() {
        header("location: .");//naar home
    }

    function weergave() {
        if(isset($_GET['veiling'])) {
			if(isset($_POST['bod_submit'])) {
				if(isset($_POST['bod'])) {
					$this->setNieuwBod($_POST['bod']);
				} else {
					header("location: .");
					exit();
				}
			}
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
	
	function setNieuwBod($nieuwBod) {
	/*
		Deze functie wordt gebruikt wanneer de knop op een veilingitem pagina wordt aangeklikt om te bieden, met het bod als input.
		Hierin wordt rekening gehouden met: sql injection, verkeerde users op de pagina, zekerheid rondom gebruikerinfo, en vergelijk met andere boden.
		Daarna wordt het bod in de database gegooid d.m.v. het veilingModel bestand.
		Wanneer er iets fout gaat door de input zal er teruggestuurd worden naar de veilingitem pagina, anders naar de homepage.
	*/
	//security
	session_start();
	if (isset($_SESSION['loggedIn'])) {
			require(PATH . '/model/veilingModel.php');
			$veilingModel = new veilingModel();
			
			//aanmaken van alle variabelen
			$datum = date("Y-m-d H:i:s");
			$currentUser = $_SESSION['gebruikersnaam'];
			$voorwerpId = $_GET['veiling'];
			$bod = strval(number_format((float)strip_tags(isset($nieuwBod) ? $nieuwBod : null), 2, '.', ''));
			$hoogsteBodArray = $veilingModel->getHoogsteBod($voorwerpId);
			$hoogsteBod = rtrim($hoogsteBodArray['bod'], "0");
			
			//functionaliteit en security
			if (!empty($bod)) {
				if (!$hoogsteBodArray['bieder'] == $currentUser) {
					if (preg_match("/^\d+\.\d{0,2}$/", $bod)) {
						if (strlen($bod) < 9) {
							if ((float)$bod > (float)$hoogsteBod) {
								$result = $veilingModel->createNewBod($datum, $currentUser, $voorwerpId, (float)$bod);
								header("location: ?veiling=" . $voorwerpId); //success
								exit();
							}
							else {
								header("location: ?veiling=" . $voorwerpId); //					niet hoog genoeg geboden
								exit();
							}
						}
						else {
							header("location: ?veiling=" . $voorwerpId); //						input te groot
							exit();
						}
					}
					else {
						header("location: ?veiling=" . $voorwerpId); //							voldoet niet aan perg_match
						exit();
					}
				}
				else {
					header("location: ?veiling=" . $voorwerpId); //								zelf overbieden
					exit();
				}
			} else {
				header("location: ?veiling=" . $voorwerpId); //									input empty
				exit();
			}
		}
		else {
			header("location: .");//naar home
			exit();
		}
	}
}