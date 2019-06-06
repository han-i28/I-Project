<?php

class registratieModel extends Model {

    public function checkUsernameTaken($gebruikersnaam) {
        $sql = "SELECT gebruikersnaam FROM gebruiker WHERE gebruikersnaam = :gebruikersnaam";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':gebruikersnaam' => $gebruikersnaam));
		$result = $req->fetch(PDO::FETCH_ASSOC);
		return !empty($result);//if user is in database, return true
    }

    public function insertUser($user_data) {
		$sql = "INSERT INTO gebruiker(
			gebruikersnaam, voornaam, tussenvoegsel, achternaam, adresregel_1, adresregel_2,
			postcode, plaatsnaam, GBA_CODE, geboortedatum, telefoon, mailbox, vraag, antwoordtekst,
			rating, wachtwoord, isGeblokkeerd, isBeheerder, vkey
		)VALUES(
			:gebruikersnaam, :voornaam, :tussenvoegsel, :achternaam, :adresregel_1, :adresregel_2,
			:postcode, :plaatsnaam, :GBA_CODE, :geboortedatum, :telefoon, :mailbox, :vraag, :antwoordtekst,
			:rating, :wachtwoord, :isGeblokkeerd, :isBeheerder, :vkey
		);";

		$req = Database::getBdd()->prepare($sql);
		$req->execute(array(
			':gebruikersnaam' => $user_data['gebruikersnaam'],
			':voornaam' => $user_data['voornaam'],
			':tussenvoegsel' => $user_data['tussenvoegsel'],
			':achternaam' => $user_data['achternaam'],
			':adresregel_1' => $user_data['adres_1'],
			':adresregel_2' => $user_data['adres_2'],
			':postcode' => $user_data['postcode'],
			':plaatsnaam' => $user_data['plaatsnaam'],
			':GBA_CODE' => $user_data['GBA_CODE'],
			':geboortedatum' => $user_data['geboortedatum'],
			':telefoon' => $user_data['telefoon'],
			':mailbox' => $user_data['mailbox'],
			':vraag' => $user_data['vraag'],
			':antwoordtekst' => $user_data['antwoordtekst'],
			':rating' => $user_data['rating'],
			':wachtwoord' => $user_data['wachtwoord'],
			':isGeblokkeerd' => $user_data['isGeblokkeerd'],
			':isBeheerder' => $user_data['isBeheerder'],
			':vkey' => $user_data['vkey']));
        return $req->fetch(PDO::FETCH_ASSOC);
	}

    public function getVragenLijst() {
        $sql = "SELECT id, vraag beveiligingsvraag FROM vraag ORDER BY id ASC";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getVkeyCheck($vkey) {
        $sql = "SELECT isGeverifieerd, vkey FROM gebruiker WHERE isGeverifieerd = 0 AND vkey=:vkey";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':vkey' => $vkey));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function setVerification($vkey) {
        $sql = "UPDATE gebruiker SET isGeverifieerd = 1 WHERE vkey=:vkey";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':vkey' => $vkey));
        return $req->fetch(PDO::FETCH_ASSOC);
	}
}

?>