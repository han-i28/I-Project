<?php

class aanbiedenModel extends Model{

    public function getVerkoper($gebruikersnaam) {
        $sql = "SELECT gebruikersnaam, postcode, plaatsnaam, GBA_CODE FROM Gebruiker WHERE gebruikersnaam=:gebruikersnaam";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':gebruikersnaam' => $gebruikersnaam));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getVoorwerpnummer() {
        $sql = "SELECT TOP 1 voorwerpnummer FROM voorwerp ORDER BY voorwerpnummer DESC";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function setVeiling($veiling_data){
        print_r($veiling_data);
        $sql = "INSERT INTO dbo.voorwerp 
		(voorwerpnummer, titel, beschrijving, startprijs, betalingswijze, betalingsinstructie, postcode, plaatsnaam, GBA_CODE,
		looptijdBegin, verzendkosten, verzendinstructies, verkoper, looptijdEinde, veilingGesloten, conditie)
		VALUES (
		:voorwerpnummer, :titel, :beschrijving, :startprijs, :betalingswijze, :betalingsinstructie, :postcode, :plaatsnaam, :GBA_CODE,
		:looptijdBegin, :verzendkosten, :verzendinstructies, :verkoper, :looptijdEinde, :veilingGesloten, :conditie)";

        $req = Database::getBdd()->prepare($sql);
        return $req->execute(array(':voorwerpnummer' => $veiling_data['0'], ':titel' => $veiling_data['1'], ':beschrijving' => $veiling_data['2'], ':startprijs' => $veiling_data['3'], ':betalingswijze' => $veiling_data['4'], ':betalingsinstructie' => $veiling_data['5'], ':postcode' => $veiling_data['6'],
            ':plaatsnaam' => $veiling_data['7'], ':GBA_CODE' => $veiling_data['8'], ':looptijdBegin' => $veiling_data['9'], ':verzendkosten' => $veiling_data['10'], ':verzendinstructies' => $veiling_data['11'], ':verkoper' => $veiling_data['12'], ':koper' => $veiling_data['13'], ':looptijdEinde' => $veiling_data['14'],
            ':veilingGesloten' => $veiling_data['15']));
    }

    public function setAfbeelding($pad, $voorwerp) {
        $sql = "INSERT INTO dbo.bestand(pad, voorwerp) VALUES (:pad, :voorwerp)";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute(array(':pad' => $pad, ':voorwerp'=>$voorwerp));
    }
}
