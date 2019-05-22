<?php

class homeModel extends Model {

    public function getResults() {
        $start = "'%";
        $end = "%'";
        $search = str_replace(' ', '%', $_POST['search']);
        $keywords = $start + $search + $end;
    
        $sql = "SELECT voorwerpnummer, titel, pad FROM voorwerp, bestand
        WHERE voorwerp.voorwerpnummer = bestand.voorwerp
        AND titel IN (SELECT titel FROM voorwerp WHERE titel LIKE '$search' OR beschrijving LIKE '$search'
        OR categorie LIKE '$search')";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }   
}

?>