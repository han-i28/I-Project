<?php

class loginModel extends Model {

    public function getUserAuthentication($username) {
        $sql = "SELECT gebruikersnaam, wachtwoord, isBeheerder FROM gebruiker WHERE gebruikersnaam = :gebruikersnaam";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':gebruikersnaam' => $username));
        return $req->fetch(PDO::FETCH_ASSOC);
    }
}

?>