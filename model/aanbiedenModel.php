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

    public function setVeiling($user_data){
        print_r($user_data);
        $sql = "INSERT INTO dbo.voorwerp 
		(voorwerpnummer, titel, beschrijving, startprijs, betalingswijze, betalingsinstructie, postcode, plaatsnaam, GBA_CODE,
		looptijdBegin, verzendkosten, verzendinstructies, verkoper, looptijdEinde, veilingGesloten, conditie)
		VALUES (
		:voorwerpnummer, :titel, :beschrijving, :startprijs, :betalingswijze, :betalingsinstructie, :postcode, :plaatsnaam, :GBA_CODE,
		:looptijdBegin, :verzendkosten, :verzendinstructies, :verkoper, :looptijdEinde, :veilingGesloten, :conditie)";

        $req = Database::getBdd()->prepare($sql);
        return $req->execute(array(':voorwerpnummer' => $user_data['0'], ':titel' => $user_data['1'], ':beschrijving' => $user_data['2'], ':startprijs' => $user_data['3'], ':betalingswijze' => $user_data['4'], ':betalingsinstructie' => $user_data['5'], ':postcode' => $user_data['6'],
            ':plaatsnaam' => $user_data['7'], ':GBA_CODE' => $user_data['8'], ':looptijdBegin' => $user_data['9'], ':verzendkosten' => $user_data['10'], ':verzendinstructies' => $user_data['11'], ':verkoper' => $user_data['12'], ':koper' => $user_data['13'], ':looptijdEinde' => $user_data['14'],
            ':veilingGesloten' => $user_data['15']));
    }

    public function setAfbeelding($pad, $voorwerp) {
        $sql = "INSERT INTO dbo.bestand(pad, voorwerp) VALUES (:pad, :voorwerp)";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute(array(':pad' => $pad, ':voorwerp'=>$voorwerp));
    }
}
