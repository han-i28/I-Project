<?php

class accountController extends Controller {
    function index() {
        session_start();
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
    }
	
	public function forwardAccountInformation() 
	{
		
		
		echo $accountInfo;
	}
	
}