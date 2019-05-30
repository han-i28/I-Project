<?php

class searchModel extends Model {

    public function getResults($input) {
        if($input==''){
            return null;
        }
        $input = trim(preg_replace('!\s+!', ' ', $input));
        $array = explode(" ", $input);
        foreach ($array as $word) {
            
            $word = '%' . $word . '%';
            $sql = "SELECT voorwerpnummer, beschrijving, titel, looptijdEinde, pad, bod FROM voorwerp, bestand, biedingen WHERE titel LIKE '$word' 
            AND voorwerp.voorwerpnummer = bestand.voorwerp AND voorwerpnummer = biedingen.voorwerp";
            $req = Database::getBdd()->prepare($sql);
            $req->execute();            
        }
        
        return $req->fetchAll(PDO::FETCH_ASSOC);
        
    }   
}

?>