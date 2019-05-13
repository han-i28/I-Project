<?php

class Database {
    private static $bdd = null;

    public static function getBdd() {
        $hostname = "(local)";
        $dbname = "EA";
        $username = NULL;
        $pw = NULL;

        if (is_null(self::$bdd)) {
            self::$bdd = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$pw");
        }

    }
}

?>
