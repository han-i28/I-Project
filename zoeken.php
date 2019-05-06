<?php
session_start();
include 'dbconnection.php';
include 'header.php';

if (isset($_GET['search'])){
    $search = $_GET['search'];
    $_SESSION['search'] = $search;

    $sqlsearch = "SELECT * FROM voorwerp WHERE titel like (?)";
    $querysearch = $dbh->prepare($sqlsearch);
    $querysearch->execute(array($search));
    $resultssearch = $querysearch->fetch(PDO::FETCH_ASSOC);
}

if(isset($_GET['minprice'])){
    if(isset($_GET['maxprice'])){
        $minprice = $_GET['minprice'];
        $_SESSION['minprice'] = $minprice;
        $maxprice = $_GET['maxprice'];
        $_SESSION['maxprice'] = $maxprice;

        $sql = "SELECT * FROM voorwerp WHERE startprijs > :minprice AND startprijs < :maxprice";
        $query = $dbh->prepare($sql);
        $query->execute(array(':minprice'=>$minprice, ':maxprice'=>$maxprice));
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eenmaal Andermaal | Zoekresultaten</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.2/css/uikit.min.css" />
    <link rel="stylesheet" href="style.css">
    <!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.2/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.2/js/uikit-icons.min.js"></script>

</head>
    <body>
        <!--Filters-->
        <div class="uk-width-1-4">
            <form action="zoeken.php" method="get" class="uk-flex">
                <div>
                    <legend class="uk-legend">&euro;</legend>
                    <input type="text" name="minprice" id="minprice" class="uk-input uk-width-1-5" placeholder="10">
                    <legend class="uk-legend"> tot: </legend>
                    <input type="text" name="maxprice" id="maxprice" class="uk-input uk-width-1-5" placeholder="100">                                
                    <button type="submit" class="uk-button-primary"><span uk-icon="icon: chevron-right"></span></button>
                </div>                    
            </form>
        </div>
        <!--Laat de resultaten zien-->
        <div class="uk-container" id="resultaten">
        
        </div>
    </body>
</html>