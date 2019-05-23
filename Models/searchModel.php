<?php

class searchModel extends Model {

    public function getResults($input) {
        
        $input = trim(preg_replace('!\s+!', ' ', $input));
        $array = explode(" ", $input);
        foreach ($array as $word) {
            
            $word = '%' . $word . '%';
            $sql = "SELECT voorwerpnummer, beschrijving, titel, looptijdEinde, pad FROM voorwerp, bestand WHERE beschrijving LIKE '$word' AND voorwerp.voorwerpnummer = bestand.voorwerp";
            $req = Database::getBdd()->prepare($sql);
            $req->execute();            
        }
        
        return $req->fetchAll(PDO::FETCH_ASSOC);
        
    }   
}

?>