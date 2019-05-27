<?php
if(!defined('PATH')){//PATH NOT SET
    if(file_exists($_SERVER['DOCUMENT_ROOT'].'/I-Project/localSettings.php')){//local
        require_once($_SERVER['DOCUMENT_ROOT'].'/I-Project/definedVariables.php');
    }else require_once($_SERVER['DOCUMENT_ROOT'].'/definedVariables.php');
}

require(PATH . '/Config/core.php');
require(PATH . '/router.php');
require(PATH . '/request.php');
require(PATH . '/dispatcher.php');

$dispatch = new Dispatcher();
$dispatch->dispatch();
?>