<?php

class homeModel extends Model {

    public function getRubrieken() {
        $sql = "SELECT * FROM Categorieen";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>