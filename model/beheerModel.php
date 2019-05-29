<?php

class beheerModel extends Model {

    public function getAllGebruikers() {
        $sql = "SELECT gebruikersnaam, voornaam, tussenvoegsel, achternaam, adresregel_1, postcode, plaatsnaam, mailbox, isGeblokkeerd FROM gebruiker";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array());
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllVeilingen() {
        $sql = "SELECT voorwerpnummer, looptijdbegin, verkoper, veilingGesloten FROM voorwerp";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array());
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function blokkeerGebruiker($id, $status) {
        if($status == true) {
            $sql = "UPDATE gebruiker SET isGeblokkeerd = :status WHERE gebruikersnaam = :id";
            $req = Database::getBdd()->prepare($sql);
            return $req->execute(array(':id' => $id, ':status' => '0'));
        } else {
            $sql = "UPDATE gebruiker SET isGeblokkeerd = :status WHERE gebruikersnaam = :id";
            $req = Database::getBdd()->prepare($sql);
            return $req->execute(array(':id' => $id, ':status' => '1'));
        }
    }

    public function blokkeerVeiling($id) {
        $sql = "UPDATE voorwerp SET veilingGesloten = :status WHERE voorwerpnummer = :id";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute(array(':id' => $id, ':status' => '1'));
    }


}

?>