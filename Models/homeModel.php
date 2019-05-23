<?php

class homeModel extends Model {

    public function getAll() {
        $sql = "SELECT naam FROM gebruikers";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getVoorwerp(){
        $sql = "SELECT *, pad FROM voorwerp, bestand where voorwerp.voorwerpnummer = bestand.voorwerp";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }    
}

?>