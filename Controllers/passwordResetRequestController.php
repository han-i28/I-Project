<?php


class passwordResetRequestController extends Controller
{
    function index()
    {
        $data['title'] = "Eenmaal Andermaal - Wachtwoord resetten";
        $data['page'] = "passwordResetRequest";
        $this->set($data);
        $this->load_view("template");
    }

    function resetRequest()
    {
        if (isset($_POST["reset-request-submit"])) {

            $selector = bin2hex(random_bytes(8));
            $token = random_bytes(32);
            $url = "iproject28.icasites.nl/createNewPassword?selector=" . $selector . "&validator=" . bin2hex($token);
            $expires = date("U") + 1800;
            $userEmail = strip_tags((isset($_POST['email']) ? $_POST['email'] : null));

            require('../Models/resetModel.php');
            $resetModel = new resetModel();

            $resetModel->deleteDuplicates($userEmail);
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            $resetModel->setResetRequest($userEmail, $selector, $hashedToken, $expires);

            $to = $userEmail;
            $subject = 'Wachtwoord reset Eenmaal Andermaal';

            $message = '<p>We hebben een verzoek ontvangen voor het resetten van uw wachtwoord. De link om uw wachtwoord te resetten vindt u hieronder. Als u niet heeft gevraagd om uw wachtwoord te resetten, dan kunt u deze email negeren.</p>';
            $message .= '<p>Hier is uw wachtwoord reset link: </br>';
            $message .= '<a href="' . $url . '">' . $url . '</a></p>';

            $headers = "From: Eenmaal Andermaal <noreply@EenmaalAndermaal.com>\r\n";
            $headers .= "Reply-To: noreply@EenmaalAndermaal.com\r\n";
            $headers .= "Content-type: text/html\r\n";

            mail($to, $subject, $message, $headers);

            header("Location: ../passwordResetRequest?reset=success");
        } else {
            header("Location: home");
        }
    }
}