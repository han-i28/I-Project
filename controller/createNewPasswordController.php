<?php


class createNewPasswordController extends Controller
{
    function index()
    {
        $data['title'] = "Eenmaal Andermaal - Wachtwoord resetten";
        $data['page'] = "createNewPassword";
        $this->set($data);
        $this->load_view("template");


        if (isset($_POST['reset-password-submit'])) {

            if (!isset($_POST['pwd']) || !isset($_POST['pwd-repeat'])) {
                $data['newpwd'] = "empty";
                header("Location: ../createNewPassword?selector=" . $_POST['selector'] . "&validator=" . $_POST['validator']);
                exit();
            } elseif ($_POST['pwd'] != $_POST['pwd-repeat']) {
                $data['newpwd'] = "pwdnotsame";
                header("Location: ../createNewPassword?selector=" . $_POST['selector'] . "&validator=" . $_POST['validator']);
                exit();
            }

            $this->secure_form($_POST);
            $selector = $_POST['selector'];
            $validator = $_POST['validator'];

            $currentDate = date("U");
            require(PATH . '/model/resetModel.php');
            $resetModel = new resetModel();
            $resultArray = $resetModel->getResetCheck($selector, $currentDate);
            if(empty($resultArray)) {
                $data['newpwd'] = "expired";
                header("Location: " . SITEURL . "/passwordResetRequest");
                exit();
            } else {
                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $resultArray["resetToken"]);

                if (!$tokenCheck) {
                    $data['newpwd'] = "expired";
                    header("Location: " . SITEURL . "/passwordResetRequest");
                    exit();
                } elseif ($tokenCheck) {
                    $tokenEmail = $resultArray["resetEmail"];

                    $userArray = $resetModel->getMailCheck($tokenEmail);
                    if (empty($userArray)) {
                        $data['newpwd'] = "no_account";
                        header("Location: " . SITEURL . "/passwordResetRequest");
                        exit();
                    } else {
                        $newPwdHash = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
                        $resetModel->setNewPwd($newPwdHash, $tokenEmail);

                        $resetModel->deleteDuplicates($tokenEmail);
                        $data['newpwd'] = "passwordupdated";
                        header("Location: ../userlogin");
                    }

                }
            }

        } else {
            header("Location: " . SITEURL . "");
        }
    }
}