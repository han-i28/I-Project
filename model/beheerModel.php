<?php

class beheerModel extends Model {

    public function getAllGebruikers() {
        $sql = "SELECT gebruikersnaam, voornaam, tussenvoegsel, achternaam, adresregel_1, postcode, plaatsnaam, mailbox, isGeblokkeerd FROM gebruiker";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array());
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllVeilingen() {
        $sql = "SELECT voorwerpnummer, looptijdbegin, verkoper, veilingGesloten FROM voorwerp";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array());
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllOfRubriekByID($id){
        $sql = "SELECT * FROM categorie WHERE ID = :id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array('id' => $id));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParentByID($id){
        $sql = "SELECT * FROM categorie where id = :id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array('id' => $id));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getChildrenByID($id){
        $sql = "SELECT * FROM categorie where parent = :id ORDER BY naam ASC";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array('id' => $id));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParents(){
        $sql = "SELECT * FROM categorie WHERE parent = '-1' ORDER BY naam ASC";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    //creates <select> for the parent categories
    public function createParents(){
        $html = '';
        $parents = $this->getParents();

        foreach($parents as $parent){
            $html .= "<option value=\"" . $parent['ID'] . "\">";
            $html .= $parent['naam'];
            $html .= "</option>";
        }
        return $html;
    }

    //creates a list with the childrencategories
    public function createChildren($children){
        $items = $children;
        $html = "";
        $id = '';

        foreach ($children as $child) {
            $html .= "<li>";
            $html .= "<a href=\"?rubriek=" . $child['ID'] . "\">" . $child['naam'] . "</a>";
            $html .= "</li>";
            }
        return $html;
    }

    public function getAllCategorieen(){
        $sql = "SELECT * FROM categorie ORDER BY naam ASC";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }   

    public function blokkeerGebruiker($id, $status) {
        if($status == true) {
            $sql = "UPDATE gebruiker SET isGeblokkeerd = :status WHERE gebruikersnaam = :id";
            $req = Database::getBdd()->prepare($sql);
            return $req->execute(array(':id' => $id, ':status' => '0'));
        } else {
            $sql = "UPDATE gebruiker SET isGeblokkeerd = :status WHERE gebruikersnaam = :id";
            $req = Database::getBdd()->prepare($sql);
            return $req->execute(array(':id' => $id, ':status' => '1'));
        }
    }

    public function blokkeerVeiling($id) {
        $sql = "UPDATE voorwerp SET veilingGesloten = :status WHERE voorwerpnummer = :id";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute(array(':id' => $id, ':status' => '1'));
    }

    public function createCategorieen($rows) {
        $items = $rows;
        $html = "";
        $id = '';

        foreach ($items as $item) {
            if ($item['parent'] == -1) {
                $id = $item['ID'];
                $html .= "<li class=\"uk-parent\"><a href='" . SITEURL . "veiling/zoekopdracht/?rubriek=" . $item['ID'] . "'>" . $item['naam'] . "</a>";
                $html .= "<ul class=\"uk-nav-sub\" aria-hidden=\"false\">";
                $html .= $this->createBeheerderSubCategorie($items, $id);
                $html .= "</ul>";
                $html .= "</li>";
            }
        }
        return $html;
    }

    public function createBeheerderSubCategorie($items, $id){
        $html = "";

        foreach($items as $item) {
            if($item['parent'] == $id) {
                $html .= "<ul>";
                $html .= "<li class=\"uk-parent\"><a href='" . SITEURL . "beheer/bewerk/?rubriek=" . $item['ID'] . "'>" . $item['naam'] . "</a></li>";
                $html .= $this->createBeheerderSubCategorie($items, $item['ID']);
                $html .= "</ul>";
            }
        }
        return $html;
    }

    //changes the name
    public function bewerkNaam($naam, $id){
        $sql = "UPDATE categorie SET naam = :naam WHERE ID = :id";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute(array('naam' => $naam, 'id' => $id));
    }

    //adds new category
    public function voegToe($naam, $parent){
        $sql = "DECLARE @newid int;
        SELECT @newid = coalesce(MAX(ID),0) + 1 FROM categorie;
        
        INSERT INTO categorie (ID, naam, parent)
        VALUES (@newid, :naam, :parent)";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute(array('naam' => $naam, 'parent' => $parent));
    }

    //changes the parent of a category
    public function nieuweParent($parent, $id){
        $sql = "UPDATE categorie SET parent = :parent WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute(array('parent' => $parent, 'id' => $id));
    }
}
?>