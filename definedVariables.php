<?php
    if(file_exists($_SERVER['DOCUMENT_ROOT'].'/I-Project/localSettings.php')){
        require('localSettings.php');
        define('PATH', $serverRoot);
        define('SITEURL', $siteURL);
    }else{
        define('PATH', $_SERVER['DOCUMENT_ROOT'].'/');
        define('SITEURL', 'http://'.$_SERVER['SERVER_NAME'].'/');
    }
?>