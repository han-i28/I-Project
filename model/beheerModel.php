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
                $html .= "<li class=\"uk-parent\"><a href='" . SITEURL . "beheer/beheerrubriek'>" . $item['naam'] . "</a></li>";
                $html .= $this->createBeheerderSubCategorie($items, $item['ID']);
                $html .= "</ul>";
            }
        }
        return $html;
    }
}
?>