<?php

class loginModel extends Model {

    public function getUserAuthentication($username) {
        $sql = "SELECT gebruikersnaam, wachtwoord, is_geverifieerd FROM gebruiker WHERE gebruikersnaam = :gebruikersnaam";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':gebruikersnaam' => $username));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getVkeyCheck($vkey) {
        $sql = "SELECT is_geverifieerd, vkey FROM gebruiker WHERE is_geverifieerd = 0 AND vkey=:vkey";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':vkey' => $vkey));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function setVerification($vkey) {
        $sql = "UPDATE gebruiker SET is_geverifieerd = 1 WHERE vkey=:vkey";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':vkey' => $vkey));
        return $req->fetch(PDO::FETCH_ASSOC);
    }
}

?>