<?php
define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
define('PATH', $_SERVER['DOCUMENT_ROOT'] . '/I-Project');
define('SITEURL', '/I-Project/');

require(PATH . '/Config/core.php');
require(PATH . '/router.php');
require(PATH . '/request.php');
require(PATH . '/dispatcher.php');

$dispatch = new Dispatcher();
$dispatch->dispatch();
?>