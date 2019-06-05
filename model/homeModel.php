<?php

class homeModel extends Model {

    public function getAll() {
        $sql = "SELECT naam FROM Users";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getVoorwerp(){
        $sql = "SELECT *, pad FROM Voorwerp, bestand WHERE voorwerp.voorwerpnummer = bestand.voorwerp";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRubrieken() {
        $sql = "SELECT * FROM categorie ORDER BY naam ASC";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
	
	public function getUserVeilingen($gebruiker) {
		$sql = "";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':gebruiker' => $gebruiker));
        return $req->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getUserBoden($gebruiker) {
		$sql = "SELECT TOP(5) voorwerp, bod FROM [iproject28].[dbo].[biedingen] WHERE [bieder] = :gebruiker";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':gebruiker' => $gebruiker));
        return $req->fetchAll(PDO::FETCH_ASSOC);
	}
}

?>