<?php

class Database {
    private static $bdd = null;

    public static function getBdd() {
        require_once "credentials.php";
        $hostname = "mssql2.iproject.icasites.nl";
        $dbname = "iproject28";

        if (is_null(self::$bdd)) {
            try{
                if (self::$bdd = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$pw")){
                    //connected
                }
            } catch(Exception $e){
                echo '<h1>Connection error</h1>';
                exit;
            }
        }
        return self::$bdd;
    }
}

?>
