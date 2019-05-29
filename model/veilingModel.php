<?php

class veilingModel extends Model {

    public function getVeilingById($id) {
        $sql = "SELECT * FROM voorwerp WHERE voorwerpnummer = :id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array('id' => $id));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getAfbeeldingenById($id) {
        $sql = "SELECT * FROM afbeeldingen WHERE voorwerp = :id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array('id' => $id));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getVeilingenByRubriek($id) {
        $sql = "select * from voorwerp_in_categorie vc 
                LEFT JOIN voorwerp v on vc.voorwerp = v.voorwerpnummer
                LEFT JOIN bestand b on b.voorwerp = v.voorwerpnummer
                where categorie_op_laagste_niveau = :id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array('id' => $id));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParentRubriek($id) {
        $sql = "SELECT * FROM categorie WHERE ID = :id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array('id' => $id));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getRubriekenByParent($id) {
        $sql = "SELECT * FROM categorie WHERE parent = :id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array('id' => $id));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>