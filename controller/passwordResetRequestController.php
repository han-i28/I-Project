<?php


class passwordResetRequestController extends Controller
{
    function index()
    {
        if (isset($_POST["reset-request-submit"])) {
            $this->secure_form($_POST);

            if (!isset($_POST['mailbox'])) {
                $data['error_input'] = "empty_fields";
            } elseif (!filter_var($_POST['mailbox'], FILTER_VALIDATE_EMAIL)) { //					mailbox validate
                $data['error_input'] = "invalid_mail";
            }

            if(!isset($data['error_input'])) {
                $selector = $this->secure_input(bin2hex(random_bytes(8)));
                $token = $this->secure_input(bin2hex(random_bytes(32)));
                $url = "iproject28.icasites.nl/createNewPassword?selector=" . $selector . "&validator=" . $token;
                $expires = date("U") + 1800;


                require( PATH. '/model/resetModel.php');
                $resetModel = new resetModel();

                $resetModel->deleteDuplicates($_POST['mailbox']);
                $hashedToken = password_hash($token, PASSWORD_DEFAULT);
                $resetModel->setResetRequest($_POST['mailbox'], $selector, $hashedToken, $expires);

                $mailSent = false;
                for($i=0; $i < 10; $i++){//try to send mail 10 times
                    if($this->sendResetEmail($url, $_POST['mailbox'])){
                        $mailSent = true;
                        break;
                    }else{
                        sleep(0.5);//wait for retry
                    }
                }

                if(!$mailSent){
                    $data['reset'] = "mail-error";//upon failing 10 times, send mail error
                } else {
                    $data['reset'] = "success";
                }
            }
        }
        $data['title'] = "Eenmaal Andermaal - Wachtwoord resetten";
        $data['page'] = "passwordResetRequest";
        $this->set($data);
        $this->load_view("template");
    }

    private function sendResetEmail($url, $to){
        $subject = 'Wachtwoord reset Eenmaal Andermaal';

        $message = '<p>We hebben een verzoek ontvangen voor het resetten van uw wachtwoord. De link om uw wachtwoord te resetten vindt u hieronder. Als u niet heeft gevraagd om uw wachtwoord te resetten, dan kunt u deze email negeren.</p>';
        $message .= '<p>Hier is uw wachtwoord reset link: </br>';
        $message .= '<a href="' . $url . '">' . $url . '</a></p>';

        $headers = "From: Eenmaal Andermaal <noreply@EenmaalAndermaal.com>\r\n";
        $headers .= "Reply-To: noreply@EenmaalAndermaal.com\r\n";
        $headers .= "Content-type: text/html\r\n";

        mail($to, $subject, $message, $headers);

        try{
            return (mail($to, $subject, $message, $headers));
        }catch(Exception $e){
            return false;
        }
    }

    private function secure_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}