<?php
require('localSettings.php');
define('PATH', $serverRoot);
define('SITEURL', $siteURL);

require(PATH . '/Config/core.php');
require(PATH . '/router.php');
require(PATH . '/request.php');
require(PATH . '/dispatcher.php');

$dispatch = new Dispatcher();
$dispatch->dispatch();
?>