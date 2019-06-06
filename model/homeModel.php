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
		$sql = "SELECT TOP(3) titel, voorwerpnummer FROM [iproject28].[dbo].[voorwerp] WHERE [verkoper] = :gebruiker";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':gebruiker' => $gebruiker));
        return $req->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getUserBoden($gebruiker) {
		$sql = "SELECT TOP(3) voorwerp, bod FROM [iproject28].[dbo].[biedingen] WHERE [bieder] = :gebruiker ORDER BY bod DESC";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':gebruiker' => $gebruiker));
        return $req->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getTitel($id) {
		$sql = "SELECT titel FROM [iproject28].[dbo].[voorwerp] WHERE [voorwerpnummer] = :id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':id' => $id));
        return $req->fetchAll(PDO::FETCH_ASSOC);
	}
}

?>