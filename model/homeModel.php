<?php

class homeModel extends Model {

    public function getVoorwerp(){
        $sql = "SELECT MAX(bi.bod) AS bod, v.voorwerpnummer, v.titel, v.startprijs, v.looptijdBegin, v.looptijdEinde, v.veilingGesloten, be.pad
                FROM voorwerp v 
                LEFT JOIN bestand be ON v.voorwerpnummer = be.voorwerp
                LEFT JOIN biedingen bi ON v.voorwerpnummer = bi.voorwerp
                LEFT JOIN voorwerp_in_categorie vc ON v.voorwerpnummer = vc.voorwerp
                WHERE v.veilingGesloten = 0
                GROUP BY v.voorwerpnummer, v.titel, v.startprijs, v.looptijdBegin, v.looptijdEinde, v.veilingGesloten, be.pad";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRubrieken() {
        $sql = "SELECT c.ID, c.naam, c.parent, v.categorie_op_laagste_niveau, COUNT(categorie_op_laagste_niveau) AS aantal
                FROM categorie c
                LEFT JOIN voorwerp_in_categorie v ON c.ID = v.categorie_op_laagste_niveau
                GROUP BY ID, c.naam, c.parent, v.categorie_op_laagste_niveau
                ORDER BY naam ASC";
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
