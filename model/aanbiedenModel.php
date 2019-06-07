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

    public function voegVeilingToe($user_data){
        print_r($user_data);
        $sql = "DECLARE @newid int;
        SELECT @newid = coalesce(MAX(voorwerpnummer),0) + 1 FROM voorwerp;
        
        INSERT INTO categorie (voorwerpnummer, titel, beschrijving, startprijs, betalingswijze, betalingsinstructie, postcode, plaatsnaam, GBA_CODE,
		looptijdBegin, verzendkosten, verzendinstructies, verkoper, looptijdEinde, veilingGesloten, conditie)
        VALUES (
		@newid, :titel, :beschrijving, :startprijs, :betalingswijze, :betalingsinstructie, :postcode, :plaatsnaam, :GBA_CODE,
		:looptijdBegin, :verzendkosten, :verzendinstructies, :verkoper, :looptijdEinde, :veilingGesloten, :conditie)";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute(array(':titel' => $user_data['0'], ':beschrijving' => $user_data['1'], ':startprijs' => $user_data['2'], ':betalingswijze' => $user_data['3'], ':betalingsinstructie' => $user_data['4'], ':postcode' => $user_data['5'],
            ':plaatsnaam' => $user_data['6'], ':GBA_CODE' => $user_data['7'], ':looptijdBegin' => $user_data['8'], ':verzendkosten' => $user_data['9'], ':verzendinstructies' => $user_data['10'], ':verkoper' => $user_data['11'], ':koper' => $user_data['12'], ':looptijdEinde' => $user_data['13'],
            ':veilingGesloten' => $user_data['14']));
    }


    public function setAfbeelding($pad, $voorwerp) {
        $sql = "INSERT INTO dbo.bestand(pad, voorwerp) VALUES (:pad, :voorwerp)";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute(array(':pad' => $pad, ':voorwerp'=>$voorwerp));
    }
}
