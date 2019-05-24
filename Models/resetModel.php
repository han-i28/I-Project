<?php

class resetModel extends Model {

    public function deleteDuplicates($resetEmail) {
        $sql = "DELETE FROM wachtwoordReset WHERE resetEmail = :resetEmail";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':resetEmail' => $resetEmail));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function setResetRequest($resetEmail, $resetSelector, $resetToken, $resetExpires) {
        $sql = "INSERT INTO wachtwoordReset (resetEmail, resetSelector, resetToken, resetExpires) VALUES ($resetEmail, $resetSelector, $resetToken, $resetExpires)";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':resetEmail' => $resetEmail, ':resetSelector' => $resetSelector, ':resetToken' => $resetToken, ':resetExpires' => $resetExpires));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getResetCheck($resetSelector, $resetExpires) {
        "SELECT * FROM wachtwoordReset WHERE resetSelector = :resetSelector AND resetExpires >= :resetExpires";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':resetSelector' => $resetSelector, ':resetExpires' => $resetExpires));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getMailCheck($mailbox) {
        $sql = "SELECT * FROM gebruiker WHERE mailbox = :mailbox";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':mailbox' => $mailbox));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function setNewPwd($wachtwoord, $mailbox) {
        $sql = "UPDATE gebruiker SET wachtwoord = :wachtwoord WHERE mailbox = :mailbox";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':wachtwoord' => $wachtwoord, ':mailbox' => $mailbox));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

}