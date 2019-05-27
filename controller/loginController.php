<?php

class loginController extends Controller {
    function index() {
        if(!isset($_SESSION['loggedIn'])) {
            if (isset($_POST['login_submit'])) {
                if (empty($_POST['gebruikersnaam']) || empty($_POST['wachtwoord'])) {
                    $data['error_input'] = "empty_fields";
                }
                else {
                    $mailuid = secure_input((isset($_POST['gebruikersnaam']) ? $_POST['gebruikersnaam'] : null));

                    $password = secure_input((isset($_POST['wachtwoord']) ? $_POST['wachtwoord'] : null));

                    if (empty($mailuid) || empty($password)) {
                        $data['error_input'] = "empty_fields";
                        header("Location: ../login?error=emptyfields");
                        exit();
                    } else {
                        require(PATH . '/model/loginModel.php');
                        $loginModel = new loginModel();

                        $resultArray = $loginModel->getUserAuthentication($mailuid);
                        if (empty($resultArray)) {
                            $data['error_input'] = "wrong_input";
                            header("Location: ../login?error=wronguidpwd");
                            exit();
                        } else {
                            $pwdCheck = password_verify($password, $resultArray['wachtwoord']);

                            if ($pwdCheck == false) {
                                $data['error_input'] = "wrong_input";
                                header("Location: ../login?error=wronguidpwd");
                                exit();
                            } elseif ($resultArray['is_geverifieerd'] == 0) {
                                $data['error_input'] = "not_verified";
                                header("Location: ../login?error=notverified");
                                exit();
                            } else if ($pwdCheck == true && $resultArray['is_geverifieerd'] == 1) {

                                ini_set('session.cookie_httponly', true); //Preventie van session hijacking door cookies niet door javascript te kunnen sturen

                                session_start();

                                if (isset($_SESSION['last_ip']) === false) {
                                    $_SESSION['last_ip'] = $_SERVER['REMOTE_ADDR'];
                                }

                                $_SESSION['gebruikersnaam'] = $resultArray['gebruikersnaam'];
                                $_SESSION['loggedIn'] = true;
                                $_SESSION['time'] = time();//success


                                unset($mailuid);
                                unset($password);
                                unset($resultArray);
                                header('Location: ' . SITEURL . '');
                            }
                        }
                    }
                }
            }

            $data['title'] = "Eenmaal Andermaal - Login";
            $data['page'] = "userlogin";
            $this->set($data);
            $this->load_view("template");
        } else {
            header("location: " . SITEURL . "");
        }
    }

    function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../");
    }
}

?>