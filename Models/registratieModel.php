<?php

class registratieModel extends Model {

    public function getUidCheck($gebruikersnaam) {
        $sql = "SELECT gebruikersnaam FROM Gebruiker WHERE gebruikersnaam=:gebruikersnaam";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':gebruikersnaam' => $gebruikersnaam));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function setSignupUser($gebruikersnaam, $voornaam, $tussenvoegsel, $achternaam, $adresregel_1, $adresregel_2, $postcode, $plaatsnaam, $land_id, $geboortedatum, $telefoon, $mailbox, $hashedPwd, $vraag, $antwoordtekst) {
        try {
		$sql = "INSERT INTO Gebruiker (gebruikersnaam, voornaam, tussenvoegsel, achternaam, adresregel_1, adresregel_2, postcode, plaatsnaam, GBA_CODE, geboortedatum, telefoon, mailbox, wachtwoord, vraag, antwoordtekst, rating) 
                VALUES (:gebruikersnaam, :voornaam, :tussenvoegsel, :achternaam, :adresregel_1, :adresregel_2, :postcode, :plaatsnaam, :land_id, :geboortedatum, :telefoon, :mailbox, :hashedPwd, :vraag, :antwoordtekst, :rating)";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute(array(':gebruikersnaam' => $gebruikersnaam, ':voornaam' => $voornaam, ':tussenvoegsel' => $tussenvoegsel, ':achternaam' => $achternaam, ':adresregel_1' => $adresregel_1, ':adresregel_2' => $adresregel_2, ':postcode' => $postcode,
            ':plaatsnaam' =>$plaatsnaam, ':land_id' => $land_id, ':geboortedatum' => $geboortedatum, ':telefoon' => $telefoon, ':mailbox' => $mailbox, ':hashedPwd' => $hashedPwd, ':vraag' => $vraag, ':antwoordtekst' => $antwoordtekst, ':rating' => $rating));
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			exit();
		}
    }

    public function getVragenLijst() {
        $sql = "SELECT id, vraag FROM vraag ORDER BY id ASC";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>