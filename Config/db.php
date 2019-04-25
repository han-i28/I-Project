<?php

class Database
{
    private static $bdd = null;

    private function __construct()
    {
    }

    public static function getBdd()
    {
        $hostname = "(local)";
        $dbname = "deb107033n3_test";
        $username = "deb107033n3_test";
        $pw = "abc123";

        if (is_null(self::$bdd)) {
            self::$bdd = new PDO("mysql:host=localhost;dbname=deb107033n3_test", 'deb107033n3_test', 'abc123');
            //new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$pw");
        }
        return self::$bdd;
    }
}

?>