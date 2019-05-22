<?php

class accountModel extends Model {

    public function getAccountInfo($gebruikersnaam) {
        $sql = "SELECT gebruikersnaam, voornaam, tussenvoegsel, achternaam, adresregel_1, adresregel_2, postcode, plaatsnaam, land_id, geboortedatum, telefoon, mailbox FROM Gebruiker WHERE gebruikersnaam=:gebruikersnaam";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':gebruikersnaam' => $gebruikersnaam));
        return $req->fetch(PDO::FETCH_ASSOC);
    }
}



?>