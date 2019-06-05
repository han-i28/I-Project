<?php

class aanbiedenModel extends Model{

    public function setVeiling($user_data){
        print_r($user_data);
        $sql = "INSERT INTO dbo.voorwerp 
		(voorwerpnummer, titel, beschrijving, startprijs, betalingswijze, betalingsinstructie, postcode, plaatsnaam, GBA_CODE,
		looptijdBegin, verzendkosten, verzendinstructies, verkoper, koper, looptijdEinde, veilingGesloten, verkoopprijs, conditie)
		VALUES (
		:voorwerpnummer, :titel, :beschrijving, :startprijs, :betalingswijze, :betalingsinstructie, :postcode, :plaatsnaam, :GBA_CODE,
		:looptijdBegin, :verzendkosten, :verzendinstructies, :verkoper, :koper, :looptijdEinde, :veilingGesloten, :verkoopprijs, :conditie)";

        $req = Database::getBdd()->prepare($sql);
        return $req->execute(array(':voorwerpnummer' => $user_data['0'], ':titel' => $user_data['1'], ':beschrijving' => $user_data['2'], ':startprijs' => $user_data['3'], ':betalingswijze' => $user_data['4'], ':betalingsinstructie' => $user_data['5'], ':postcode' => $user_data['6'],
            ':plaatsnaam' => $user_data['7'], ':GBA_CODE' => $user_data['8'], ':looptijdBegin' => $user_data['9'], ':verzendkosten' => $user_data['10'], ':verzendinstructies' => $user_data['11'], ':verkoper' => $user_data['12'], ':koper' => $user_data['13'], ':looptijdEinde' => $user_data['14'],
            ':veilingGesloten' => $user_data['15'], ':verkoopprijs' => $user_data['16'], ':conditie' => $user_data['17']));
    }
}
