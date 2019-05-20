<?php

class signupModel extends Model {

    public function getUidCheck($gebruikersnaam) {
        $sql = "SELECT gebruikersnaam FROM Gebruiker WHERE gebruikersnaam=:gebruikersnaam";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':gebruikersnaam' => $gebruikersnaam));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function setSignupUser($gebruikersnaam, $voornaam, $tussenvoegsel, $achternaam, $adresregel_1, $adresregel_2, $postcode, $plaatsnaam, $land_id, $geboortedatum, $telefoon, $mailbox, $hashedPwd, $vraag, $antwoordtekst) {
        $sql = "INSERT INTO Gebruiker (gebruikersnaam, voornaam, tussenvoegsel, achternaam, adresregel_1, adresregel_2, postcode, plaatsnaam, land_id, geboortedatum, telefoon, mailbox, hashedPwd, vraag, antwoordtekst) 
                VALUES (:gebruikersnaam, :voornaam, :tussenvoegsel, :achternaam, :adresregel_1, :adresregel_2, :postcode, :plaatsnaam, :land_id, :geboortedatum, :telefoon, :mailbox, :hashedPwd, :vraag, :antwoordtekst)";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':gebruikersnaam' => $gebruikersnaam, ':voornaam' => $voornaam, ':tussenvoegsel' => $tussenvoegsel, ':achternaam' => $achternaam, ':adresregel_1' => $adresregel_1, ':adresregel_2' => $adresregel_2, ':postcode' => $postcode,
                            ':plaatsnaam' =>$plaatsnaam, ':land_id' => $land_id, ':geboortedatum' => $geboortedatum, ':telefoon' => $telefoon, ':mailbox' => $mailbox, ':hashedPwd' => $hashedPwd, ':vraag' => $vraag, ':antwoordtekst' => $antwoordtekst));
        return $req->fetch(PDO::FETCH_ASSOC);
    }
	
	public function getCountryList() {
		$sql = "SELECT id, name FROM country";
		$req = Database::getBdd()->prepare($sql);
		$req->execute();
		$stmt = $req->fetchAll(PDO::FETCH_ASSOC);
		return $stmt;
	}
}

?>