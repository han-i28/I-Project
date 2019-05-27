<?php

class accountController extends Controller {
    function index() {
        session_start();
        if(isset($_SESSION['loggedIn'])) {
            require(PATH . '/model/accountModel.php');
            $accountModel = new accountModel();
            if(isset($_SESSION['loggedIn'])) {
                $gebruikersnaam = $_SESSION['gebruikersnaam'];

                $accountInfo = $accountModel->getAccountInfo($gebruikersnaam);
                $data['accountInfo'] = $accountInfo;
            }
            $data['title'] = "Eenmaal Andermaal - Account informatie";
            $data['page'] = "account";
            $this->set($data);
            $this->load_view("template");
        } else {
            header("location: " . SITEURL . "");
        }

    }
	
	public function forwardAccountInformation() 
	{
		
		
		echo $accountInfo;
	}
	
}