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


    public function voegVeilingToe($veiling_data){
        print_r($veiling_data);
        $sql = "DECLARE @newid int;
        SELECT @newid = coalesce(MAX(voorwerpnummer),0) + 1 FROM voorwerp;  
        INSERT INTO categorie (voorwerpnummer, titel, beschrijving, startprijs, betalingswijze, betalingsinstructie, postcode, plaatsnaam, GBA_CODE,
		looptijdBegin, verzendkosten, verzendinstructies, verkoper, looptijdEinde, veilingGesloten, conditie)
        VALUES (
		@newid, :titel, :beschrijving, :startprijs, :betalingswijze, :betalingsinstructie, :postcode, :plaatsnaam, :GBA_CODE,
		:looptijdBegin, :verzendkosten, :verzendinstructies, :verkoper, :looptijdEinde, :veilingGesloten, :conditie)";
        $req = Database::getBdd()->prepare($sql);Ø
        return $req->execute(array(':titel' => $veiling_data['0'], ':beschrijving' => $veiling_data['1'], ':startprijs' => $veiling_data['2'], ':betalingswijze' => $veiling_data['3'], ':betalingsinstructie' => $veiling_data['4'], ':postcode' => $veiling_data['5'],
            ':plaatsnaam' => $veiling_data['6'], ':GBA_CODE' => $veiling_data['7'], ':looptijdBegin' => $veiling_data['8'], ':verzendkosten' => $veiling_data['9'], ':verzendinstructies' => $veiling_data['10'], ':verkoper' => $veiling_data['11'], ':koper' => $veiling_data['12'], ':looptijdEinde' => $veiling_data['13'],
            ':veilingGesloten' => $veiling_data['14']));
    }


    public function setAfbeelding($pad, $voorwerp) {
        $sql = "INSERT INTO dbo.bestand(pad, voorwerp) VALUES (:pad, :voorwerp)";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute(array(':pad' => $pad, ':voorwerp'=>$voorwerp));
    }
}
