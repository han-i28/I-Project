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
        $sql = "SELECT * from voorwerp_in_categorie vc 
                LEFT JOIN voorwerp v ON vc.voorwerp = v.voorwerpnummer
                LEFT JOIN bestand b ON b.voorwerp = v.voorwerpnummer
                WHERE categorie_op_laagste_niveau = :id";
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

    public function getBidHistory($id){
        $sql = "SELECT * FROM biedingen WHERE voorwerp = :id ORDER BY bod DESC";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array('id' => $id));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>