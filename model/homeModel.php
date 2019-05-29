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
}

?>