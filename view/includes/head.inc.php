<?php
	if(!isset($_SESSION)) {
		session_start();
	}
//	if(isset($_SESSION['last_ip']) === false) {
//		$_SESSION['last_ip'] = $_SERVER['REMOTE_ADDR'];
//	}
//	if ($_SESSION['last_ip'] !== $_SERVER['REMOTE_ADDR']) {
//		session_unset();
//		session_destroy();
//	}
?>
<!DOCTYPE html>
<head>
    <title><?=(!empty($this->vars['title']) ? $this->vars['title'] : "Eenmaal Andermaal veilingen"); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="<?=SITEURL?>/assets/images/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.4/css/uikit.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.2/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.2/js/uikit-icons.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo SITEURL . "/assets/css/style.css" ?>">

</head>