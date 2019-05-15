<?php

class loginModel extends Model {

    public function getUserAuthentication($username, $password) {
        $sql = "SELECT gebruikersnaam, wachtwoord FROM gebruiker WHERE gebruikersnaam = :gebruikersnaam";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':gebruikersnaam' => $username));
        return $req->fetch(PDO::FETCH_ASSOC);
    }
}

?>