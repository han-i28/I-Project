<?php

class searchModel extends Model {

    public function getResults($input) {
        
        $input = trim(preg_replace('!\s+!', ' ', $input));
        $array = explode(" ", $input);
        // foreach ($array as $word) {
            
        //     $word = '%' . $word . '%';
        //     $sql = "SELECT voorwerpnummer, titel, looptijdEinde, pad, bod FROM voorwerp, bestand, biedingen WHERE titel LIKE '$word' 
        //     AND voorwerp.voorwerpnummer = bestand.voorwerp AND voorwerpnummer = biedingen.voorwerp";
        //     $req = Database::getBdd()->prepare($sql);
        //     $req->execute();            
        // }
        foreach ($array as $word) {
            
            $word = '%' . $word . '%';
            $sql = "SELECT voorwerpnummer, titel, looptijdEinde, pad, max(bod) as bod FROM voorwerp, bestand, biedingen WHERE titel LIKE '$word' 
            AND voorwerp.voorwerpnummer = bestand.voorwerp AND voorwerpnummer = biedingen.voorwerp
            group by voorwerpnummer, titel, looptijdEinde, pad";
            $req = Database::getBdd()->prepare($sql);
            $req->execute();            
        }
        
        return $req->fetchAll(PDO::FETCH_ASSOC);
        
    }   
}

?>