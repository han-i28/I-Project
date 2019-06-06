<?php

class homeController extends Controller {
    function index() {
        require(PATH . '/model/homeModel.php');

        $homeModel = new homeModel();

        $data['html']  =  $this->generate_section("Voor jou", $homeModel->getVoorwerp());
        $data['html'] .=  $this->generate_section("Auto's", $homeModel->getVoorwerp());
        $data['html'] .=  $this->generate_section("Antiek", $homeModel->getVoorwerp());
        $data['html'] .=  $this->generate_section("Fietsen", $homeModel->getVoorwerp());
		
		if (!isset($_SESSION)) {
			session_start();
			if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
				$data['userVeilingen'] =  $this->createUserVeilingen($_SESSION['gebruikersnaam']);
				$data['userBoden'] =  $this->createUserBoden($_SESSION['gebruikersnaam']);
				$data['userBodenTitels'] = array();
				foreach ($data['userBoden'] as $userBodenIds) {
					$titelArray = $this->addUserBodenTitels($userBodenIds['voorwerp']);
					if (strlen($titelArray[0]['titel']) > 19) {
						$data['userBodenTitels'][] = substr($titelArray[0]['titel'], 0, 16) . "..";
					}
					else {
						$data['userBodenTitels'][] = $titelArray[0]['titel'];
					}
				}
			}
		}
		
        $categorieen = $homeModel->getRubrieken();
        $data['rubriekenHTML'] = $this->createCategorieHTML($categorieen);

        $data['title'] = "Eenmaal Andermaal - homepage";
        $data['page'] = "home";

        $this->set($data);
        $this->load_view("template");

    }

    private function createCategorieHTML($rows) {
        $items = $rows;
        $html = "";
        $id = '';

        foreach ($items as $item) {
            if ($item['parent'] == -1) {
                $id = $item['ID'];
                $html .= "<li class=\"uk-parent\"><a href='" . SITEURL . "veiling/zoekopdracht/?rubriek=" . $item['ID'] . "'>" . $item['naam'] . "</a>";
                $html .= "<ul class=\"uk-nav-sub\" aria-hidden=\"false\">";
                $html .= $this->createSubCategorie($items, $id);
                $html .= "</ul>";
                $html .= "</li>";
            }
        }
        return $html;
    }

    private function createSubCategorie($items, $id) {
        $html = "";

        foreach ($items as $item) {
            if ($item['parent'] == $id) {
                $html .= "<ul>";
                $html .= "<li class=\"uk-parent\"><a href='" . SITEURL . "veiling/zoekopdracht/?rubriek=" . $item['ID'] . "'>" . $item['naam'] . " (" . $item['aantal'] . ")</a></li>";
                $html .= $this->createSubCategorie($items, $item['ID']);
                $html .= "</ul>";
            }
        }

        return $html;
    }
	
	private function createUserVeilingen($gebruikersnaam) {
		require_once(PATH . '/model/homeModel.php');
        $homeModel = new homeModel();
		
		$veilingenArray = $homeModel->getUserVeilingen($gebruikersnaam);
		return $veilingenArray;
	}
	
	private function createUserBoden($gebruikersnaam) {
		require_once(PATH . '/model/homeModel.php');
        $homeModel = new homeModel();
		
		$bodenArray = $homeModel->getUserBoden($gebruikersnaam);
		return $bodenArray;
	}
	
	private function addUserBodenTitels($id) {
		require_once(PATH . '/model/homeModel.php');
        $homeModel = new homeModel();
		
		$titel = $homeModel->getTitel($id);
		return $titel;
	}
}

?>
