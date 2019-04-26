<?php

class homeModel extends Model {

    public function getAll() {
        $sql = "SELECT * FROM test";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}

?>