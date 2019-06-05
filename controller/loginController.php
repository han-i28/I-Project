<?php

class loginController extends Controller {
    function index() {
        if(!isset($_SESSION['loggedIn'])) {
            if (isset($_POST['login_submit'])) {
                $this->secure_form($_POST);
                if (empty($_POST['gebruikersnaam']) || empty($_POST['wachtwoord'])) {
                    $data['error_input'] = "empty_fields";
                } else {
                    require(PATH . '/model/loginModel.php');
                    $loginModel = new loginModel();

                    $resultArray = $loginModel->getUserAuthentication($_POST['gebruikersnaam']);

                    if (empty($resultArray) && !isset($data['error_input'])) {
                        $data['error_input'] = "wrong_input";
                    } else {
                        $pwdCheck = password_verify($_POST['wachtwoord'], $resultArray['wachtwoord']);

                        if (!$pwdCheck) {
                            $data['error_input'] = "wrong_input";
                        } elseif ($resultArray['isGeverifieerd'] == 0) {
                            $data['error_input'] = "not_verified";
                        } else if ($pwdCheck == true && $resultArray['isGeverifieerd'] == 1) {
                            ini_set('session.cookie_httponly', true); //Preventie van session hijacking door cookies niet door javascript te kunnen sturen
                            session_start();

                            if (isset($_SESSION['last_ip']) === false) {
                                $_SESSION['last_ip'] = $_SERVER['REMOTE_ADDR'];
                            }

                            $_SESSION['gebruikersnaam'] = $resultArray['gebruikersnaam'];
                            $_SESSION['loggedIn'] = true;
                            $_SESSION['time'] = time();//success


                            unset($_POST['gebruikersnaam']);
                            unset($_POST['wachtwoord']);
                            unset($resultArray);
                            header('Location: ' . SITEURL . '');
                        }
                    }
                }

            }

            $data['title'] = "Eenmaal Andermaal - Login";
            $data['page'] = "userlogin";
            $this->set($data);
            $this->load_view("template");
        } else {
            header('Location: ' . SITEURL . '');
        }
    }

    function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('location: ' . SITEURL . '');
    }
}

?>
