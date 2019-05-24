<?php

class userAuthModel extends Model {

    public function getUserAuthentication($username, $password) {
        $sql = "SELECT gebruikersnaam, wachtwoord FROM gebruiker WHERE gebruikersnaam = :gebruikersnaam";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array('gebruikersnaam' => $username));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function registerUser($data) {
        $sql = "INSERT INTO gebruiker (gebruikersnaam, voornaam, tussenvoegsel, achternaam, adresregel_1, adresregel_2, postcode, plaatsnaam, land_id, geboortedatum, telefoon, mailbox, wachtwoord, vraag, antwoordtekst) VALUES (:gebruikersnaam, :voornaam, :tussenvoegsel, :achternaam, :adresregel_1, adresregel_2, :postcode, :plaatsnaam, :land_id, :geboortedatum, :telefoon, :mailbox, :wachtwoord, :vraag, :antwoordteskt)";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array('voornaam' => $data['voornaam'], 'tussenvoegsel' => $data['tussenvoegsel'], 'achternaam' => $data['achternaam'], 'adresregel_1' => $data['adresregel_1'], 'adresregel_2' => $data['adresregel_2'], 'postcode' => $data['postcode'], 'plaatsnaam' => $data['plaatsnaam'], 'land_id' => $data['land_id'], 'geboortedatum' => $data['geboortedatum'], 'telefoon' => $data['telefoon'], 'mailbox' => $data['email'], 'gebruikersnaam' => $data['gebruikersnaam'], 'wachtwoord' => $data['wachtwoord'], 'antwoordtekst' => $data['antwoordtekst']));
        return $req->fetch(PDO::FETCH_ASSOC);
    }
}
?>