<?php

class loginController extends Controller {
    function index() {
        $data['title'] = "Eenmaal Andermaal - testtitle";
        $data['page'] = "userlogin";
        $this->set($data);
        $this->load_view("template");
    }

    function userAuthentication() {
        if (isset($_POST['login_submit'])) {
			if (empty($_POST['gebruikersnaam']) || empty($_POST['wachtwoord'])) {
				header('Location: ../Login?error=emptyfields');
			}
			else {
            $mailuid = strip_tags((isset($_POST['gebruikersnaam']) ? $_POST['gebruikersnaam'] : null));

            $password = strip_tags((isset($_POST['wachtwoord']) ? $_POST['wachtwoord'] : null));
			
				if (empty($mailuid) || empty($password)) {
					header('Location: ../Login?error=emptyfields');
				} else {
					require('../Models/loginModel.php');
					$loginModel = new loginModel();
					$resultArray = $loginModel->getUserAuthentication($mailuid, $password);
					print_R($resultArray);
					if (empty($resultArray)) {
						header('Location: ../Login?error=wrongusernamepassword');
					} else {
						
						$pwdCheck = password_verify($password, $resultArray['wachtwoord']);

						if ($pwdCheck == false) {
							header('Location: ../Login?error=wrongusernamepassword');
						} else if ($pwdCheck == true) {
							
							ini_set('session.cookie_httponly', true); //Preventie van session hijacking door cookies niet door javascript te kunnen sturen
							
							session_start();
							
							if(isset($_SESSION['last_ip']) === false) {
								$_SESSION['last_ip'] = $_SERVER['REMOTE_ADDR'];
							}

							$_SESSION['gebruikersnaam'] = $resultArray['gebruikersnaam'];
							$_SESSION['loggedIn'] = true;
							$_SESSION['time'] = time();//success
							
							
							unset($mailuid);
							unset($password);
							unset($resultArray);
							header('Location: ../home');
						}
					}
				}
			}
        } else {
            header('Location: ../Home');
        }
    }

    function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../home");
    }
}

?>