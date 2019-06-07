<?php
class veilingModel extends Model {
    public function getVeilingById($id) {
        $sql = "SELECT * FROM voorwerp WHERE voorwerpnummer = :id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array('id' => $id));
        return $req->fetch(PDO::FETCH_ASSOC);
    }
    public function getVerkoperByID($id){
        $sql = "SELECT verkoper FROM voorwerp WHERE voorwerpnummer = :id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array('id' => $id));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getStartPrijsByID($id){
        $sql = "SELECT startprijs FROM voorwerp WHERE voorwerpnummer = :id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array('id' => $id));
        return $req->fetchAll(PDO::FETCH_ASSOC);
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
        $sql = "SELECT * FROM categorie WHERE parent = :id ORDER BY naam ASC";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array('id' => $id));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBidHistory($id){
        $sql = "SELECT voorwerp, CONCAT(CONVERT(varchar, datum, 1), ' ', CONVERT(varchar, datum, 8)) as datum, bieder, bod FROM biedingen WHERE voorwerp = :id ORDER BY bod DESC";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array('id' => $id));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHoogsteBod($voorwerpId) {
        $sql = "SELECT TOP 1 MAX([bod]) as bod, bieder  FROM [iproject28].[dbo].[biedingen] WHERE [voorwerp] = :voorwerpId GROUP BY bieder, bod ORDER BY bod DESC";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':voorwerpId' => $voorwerpId));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function createNewBod($datum, $currentUser, $voorwerpId, $bod) {
        $sql = "INSERT INTO dbo.biedingen
           (voorwerp
           ,bod
           ,bieder
           ,datum)
		VALUES
           (:voorwerpId
           ,:bod
           ,:gebruikersnaam
           ,:datum)";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array(':voorwerpId' => $voorwerpId, ':bod' => (float)$bod, ':gebruikersnaam' => $currentUser, ':datum' => $datum));
        return $req->fetch(PDO::FETCH_ASSOC);
    }
}
?>
