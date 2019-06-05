<?php

class loginModel extends Model {

    public function getUserAuthentication($username) {
        $sql = "SELECT gebruikersnaam, wachtwoord, is_geverifieerd FROM gebruiker WHERE gebruikersnaam = :gebruikersnaam";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':gebruikersnaam' => $username));
        return $req->fetch(PDO::FETCH_ASSOC);
    }
}

?>