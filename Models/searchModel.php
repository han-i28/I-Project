<?php

class homeModel extends Model {

    public function getResults() {
        
        $input = $_POST['search'];
        $input = trim(preg_replace('!\s+!', ' ', $input));
        
        foreach ($word in $input) {
            $word = '%' + $word + '%';
            $sql = "SELECT voorwerpnummer, titel, pad FROM voorwerp, bestand WHERE titel LIKE '$word' OR categorie LIKE '$word' OR beschrijving LIKE '$word'";
            $req = Database::getBdd()->prepare($sql);
            $req->execute();            
        }
        if ($req > 0) {
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo '<h1> Geen zoekresultaten </h1>'
        }
        
    }   
}

?>