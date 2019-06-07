<?php
    if(file_exists($_SERVER['DOCUMENT_ROOT'].'/I-Project/localSettings.php')){//local
        require_once($_SERVER['DOCUMENT_ROOT'].'/I-Project/definedVariables.php');
    }else require_once($_SERVER['DOCUMENT_ROOT'].'/definedVariables.php');

    require(PATH.'/index.php');
?>