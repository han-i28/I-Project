<?php


class createNewPasswordController extends Controller
{
    function index()
    {
        $data['title'] = "Eenmaal Andermaal - Wachtwoord resetten";
        $data['page'] = "createNewPassword";
        $this->set($data);
        $this->load_view("template");
    }

    function resetPassword()
    {
        if (isset($_POST["reset-password-submit"])) {

            $selector = strip_tags((isset($_POST['selector']) ? $_POST['selector'] : null));
            $validator = strip_tags((isset($_POST['validator']) ? $_POST['validator'] : null));
            $password = strip_tags((isset($_POST['pwd']) ? $_POST['pwd'] : null));
            $passwordRepeat = strip_tags((isset($_POST['pwd-repeat']) ? $_POST['pwd-repeat'] : null));
            $currentDate = date("U");

            if (empty($password) || empty($passwordRepeat)) {
                header("Location: ../createNewPassword?newpwd=empty&selector= . $selector . &validator= . $validator .");
                exit();
            } elseif ($password != $passwordRepeat) {
                header("Location: ../createNewPassword?newpwd=pwdnotsame&selector= . $selector . &validator= . $validator .");
                exit();
            }

            $resetModel = new resetModel();

            $resultArray = $resetModel->getResetCheck($selector, $currentDate);
            if (empty($resultArray)) {
                header("Location: ../passwordResetRequest?newpwd=expired");
                exit();
            } else {
                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $resultArray["resetToken"]);

                if ($tokenCheck == false) {
                    header("Location: ../passwordResetRequest?newpwd=expired");
                    exit();
                } elseif ($tokenCheck == true) {
                    $tokenEmail = $resultArray["resetEmail"];

                    $userArray = $resetModel->getMailCheck($tokenEmail);
                    if (empty($userArray)) {
                        header("Location: ../createNewPassword?error=sqlerror&selector= . $selector . &validator= . $validator .");
                        exit();
                    } else {
                        $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                        $resetModel->setNewPwd($newPwdHash, $tokenEmail);

                        $resetModel->deleteDuplicates($tokenEmail);
                        header("Location: ../userlogin?newpwd=passwordupdated");
                    }

                }
            }
        } else {
            header("Location: home");
        }
    }
}