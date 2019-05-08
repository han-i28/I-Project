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

            $mailuid = strip_tags((isset($_POST['gebruikersnaam']) ? $_POST['gebruikersnaam'] : null));

            $password = strip_tags((isset($_POST['wachtwoord']) ? $_POST['wachtwoord'] : null));

            echo $mailuid ."<br>";
            echo $password ."<br>";
            if (empty($mailuid) || empty($password)) {
                echo 'empty';
                //niet goed
            } else {
                require('../Models/loginModel.php');
                $loginModel = new loginModel();

                $resultArray = $loginModel->getUserAuthentication($mailuid, $password);
                print_R($resultArray);
                if (empty($resultArray)) {
                    echo 'empty';
                    //niet goed
                } else {

                    $pwdCheck = password_verify($password, $resultArray['wachtwoord']);

                    if ($pwdCheck == false) {
                        echo '<br>passwords dont match';
                        echo password_hash($password, PASSWORD_DEFAULT);
                        //do iets

                    } else if ($pwdCheck == true) {

                        session_start();

                        $_SESSION['gebruikersnaam'] = $resultArray['gebruikersnaam'];
                        $_SESSION['loggedIn'] = true;
                        $_SESSION['time'] = time();//success
                        header('Location: ../home');
                    }

                }

            }

        } else {
            //niet goed
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