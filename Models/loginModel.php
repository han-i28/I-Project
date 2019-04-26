<?php

class homeModel extends Model {

    public function getUserAuthentication($username, $password) {
        $sql = "SELECT username, password FROM Gebruiker WHERE username = (:username))";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':username' => $username, ':password' => $password));
        return $req->fetchAll();



    }
}

?>