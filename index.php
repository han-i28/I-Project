<?php
if(!defined('PATH')){//PATH NOT SET
    if(file_exists($_SERVER['DOCUMENT_ROOT'].'/I-Project/localSettings.php')){//local
        require_once($_SERVER['DOCUMENT_ROOT'].'/I-Project/definedVariables.php');
    }else require_once($_SERVER['DOCUMENT_ROOT'].'/definedVariables.php');
}

require(PATH . '/Config/core.php');//configuration
require(PATH . '/request.php');//url handling
require(PATH . '/router.php');//controller selection
require(PATH . '/dispatcher.php');//load controller

$dispatch = new Dispatcher();
$dispatch->dispatch();
?>