<?php

class registratieModel extends Model {

    public function getGebruikersnaamCheck($gebruikersnaam) {
        $sql = "SELECT gebruikersnaam FROM Gebruiker WHERE gebruikersnaam=:gebruikersnaam";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':gebruikersnaam' => $gebruikersnaam));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function setSignupUser($user_data) {
		print_r($user_data);
		$sql = "INSERT INTO dbo.gebruiker 
		(gebruikersnaam, voornaam, tussenvoegsel, achternaam, adresregel_1, adresregel_2, postcode, plaatsnaam, GBA_CODE,
		geboortedatum, telefoon, mailbox, vraag, antwoordtekst, rating, wachtwoord, isGeblokkeerd, isBeheerder, vkey)
		VALUES (
		:gebruikersnaam, :voornaam, :tussenvoegsel, :achternaam, :adresregel_1, :adresregel_2, :postcode, :plaatsnaam, :land_id,
		:geboortedatum, :telefoon, :mailbox, :vraag, :antwoordtekst, :rating, :hashedPwd, :isGeblokkeerd, :isBeheerder, :vkey)";

        $req = Database::getBdd()->prepare($sql);
		return $req->execute(array(':gebruikersnaam' => $user_data['0'], ':voornaam' => $user_data['1'], ':tussenvoegsel' => $user_data['2'], ':achternaam' => $user_data['3'], ':adresregel_1' => $user_data['4'], ':adresregel_2' => $user_data['5'], ':postcode' => $user_data['6'],
            ':plaatsnaam' => $user_data['7'], ':land_id' => $user_data['8'], ':geboortedatum' => $user_data['9'], ':telefoon' => $user_data['10'], ':mailbox' => $user_data['11'], ':vraag' => $user_data['12'], ':antwoordtekst' => $user_data['13'], ':rating' => $user_data['14'],
            ':hashedPwd' => $user_data['15'], 'isGeblokkeerd' => $user_data['16'], ':isBeheerder' => $user_data['17'] ,':vkey' => $user_data['18']));
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