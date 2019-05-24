<?php

class veilingModel extends Model {

    public function getVeilingById($id) {
        $sql = "SELECT * FROM Items WHERE ID = :id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array('id' => $id));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getVeilingenByRubriek($id) {
        $sql = "SELECT * FROM Items WHERE Categorie = :id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array('id' => $id));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParentRubriek($id) {
        $sql = "SELECT * FROM Categorieen WHERE ID = :id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array('id' => $id));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getRubriekenByParent($id) {
        $sql = "SELECT * FROM Categorieen WHERE Parent = :id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array('id' => $id));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>