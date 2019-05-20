<?php

class Database {
    private static $bdd = null;

    public static function getBdd() {
        require_once "credentials.php";
        $hostname = "mssql2.iproject.icasites.nl";
        $dbname = "iproject28";

        if (is_null(self::$bdd)) {
            self::$bdd = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$pw");
        }
        return self::$bdd;
    }
}

?>
