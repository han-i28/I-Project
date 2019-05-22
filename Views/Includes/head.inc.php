<?php
	if(!isset($_SESSION)) {
		session_start();
	}
	
	$link = $_SERVER['REQUEST_URI']; //bekijken welke pagina we op zitten
	if ($link === "/I-Project/login") { //checken of we op de login pagina zitten als we ingelogd zijn
		if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
			header('Location: home');
			exit();
		}
	} elseif ($link === "/I-Project/signup") {
		if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
			header('Location: home');
			exit();
		}
	} elseif ($link === "/I-Project/account") {
		if (!isset($_SESSION['loggedIn'])) {
			header('Location: home');
			exit();
		}
	}
	
	if(isset($_SESSION['last_ip']) === false) {
		$_SESSION['last_ip'] = $_SERVER['REMOTE_ADDR'];
	}
	if ($_SESSION['last_ip'] !== $_SERVER['REMOTE_ADDR']) {
		session_unset();
		session_destroy();
	}
	print_r($_SESSION);
?>
<!DOCTYPE html>
<head>
    <title><?php echo (!empty($this->vars['title']) ? $this->vars['title'] : "Eenmaal Andermaal veilingen"); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="/I-Project/assets/css/uikit.min.css">
    <script src="/I-Project/assets/js/uikit-icons.min.js"></script>
    <script src="/I-Project/assets/js/uikit.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/I-Project/assets/css/style.css">

</head>