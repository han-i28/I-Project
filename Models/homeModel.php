<?php

class homeModel extends Model {

    public function getAll() {
        $sql = "SELECT naam FROM gebruiker";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>