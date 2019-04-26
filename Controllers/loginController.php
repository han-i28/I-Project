<?php

class loginController extends Controller
{
    function index()
    {
        require('../Models/loginModel.php');
        $loginModel = new loginModel();

        $data['tasks'] = $loginModel->getAll();

        $data['title'] = "Eenmaal Andermaal - testtitle";
        $data['page'] = "userlogin";
        $this->set($data);
        $this->load_view("template");


        function userAuthentication()
        {
            if (isset($_POST['login_submit'])) {
                $mailuid = strip_tags((isset($_POST['gebruikersnaam']) ? $_POST['gebruikersnaam'] : null));

                $password = strip_tags((isset($_POST['wachtwoord']) ? $_POST['wachtwoord'] : null));
                if (empty($mailuid) || empty($password)) {
                //niet goed
                } else {
                    require('../Models/loginModel.php');
                    $loginModel = new loginModel();

                    $resultArray = $loginModel->getUserAuthentication();
                    if (empty($resultArray)) {
                    //niet goed
                    } else {

                        $pwdCheck = password_verify($password, $resultArray['wachtwoord']);

                        if ($pwdCheck == false) {

                            //do iets

                        } else if ($pwdCheck == true) {

                            session_start();

                            $_SESSION['gebruikersnaam'] = $resultArray['gebruikersnaam'];
                            $_SESSION['loggedIn'] = true;
                            $_SESSION['time'] = time();//success
                            header('Location: ' . $_SERVER['HTTP_REFERER']);
                        }

                    }

                }

            } else {

//niet goed

            }



        }
    }
}

?>