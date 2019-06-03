<?php

class registratieModel extends Model {

    public function getGebruikersnaamCheck($gebruikersnaam) {
        $sql = "SELECT gebruikersnaam FROM Gebruiker WHERE gebruikersnaam=:gebruikersnaam";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':gebruikersnaam' => $gebruikersnaam));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function setSignupUser($gebruikersnaam, $voornaam, $tussenvoegsel, $achternaam, $adresregel_1, $adresregel_2, $postcode, $plaatsnaam, $land_id, $geboortedatum, $telefoonnummer, $mailbox, $hashedPwd, $beveiligingsvraag, $antwoordtekst, $rating, $isGeblokkeerd, $isBeheerder, $vkey) {
		$sql = "INSERT INTO dbo.gebruiker 
		(gebruikersnaam
		, voornaam
		, tussenvoegsel
		, achternaam
		, adresregel_1
		, adresregel_2
		, postcode
		, plaatsnaam
		, GBA_CODE
		, geboortedatum
		, telefoon
		, mailbox
		, vraag
		, antwoordtekst
		, rating
		, wachtwoord
		, isGeblokkeerd
		, isBeheerder
		, vkey)
		VALUES 
		(:gebruikersnaam
		, :voornaam
		, :tussenvoegsel
		, :achternaam
		, :adresregel_1
		, :adresregel_2
		, :postcode
		, :plaatsnaam
		, :land_id
		, :geboortedatum
		, :telefoon
		, :mailbox
		, :vraag
		, :antwoordtekst
		, :rating
		, :hashedPwd
		, :isGeblokkeerd
		, :isBeheerder
		, :vkey)";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute(array(':gebruikersnaam' => $gebruikersnaam, ':voornaam' => $voornaam, ':tussenvoegsel' => $tussenvoegsel, ':achternaam' => $achternaam, ':adresregel_1' => $adresregel_1, ':adresregel_2' => $adresregel_2, ':postcode' => $postcode,
			':plaatsnaam' => $plaatsnaam, ':land_id' => $land_id, ':geboortedatum' => $geboortedatum, ':telefoon' => $telefoonnummer, ':mailbox' => $mailbox, ':vraag' => $beveiligingsvraag, ':antwoordtekst' => $antwoordtekst, ':rating' => $rating,
			':hashedPwd' => $hashedPwd, 'isGeblokkeerd' => $isGeblokkeerd, ':isBeheerder' => $isBeheerder ,':vkey' => $vkey));
    }

    public function getVragenLijst() {
        $sql = "SELECT id, vraag beveiligingsvraag FROM vraag ORDER BY id ASC";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
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