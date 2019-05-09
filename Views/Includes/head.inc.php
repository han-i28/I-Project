<?php
    session_start();
    require_once "../Core/functions.php";
?>
<!DOCTYPE html>
<head>
    <title><?=(!empty($this->vars['title']) ? $this->vars['title'] : "Eenmaal Andermaal veilingen"); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="/I-Project/assets/css/uikit.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.2/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.2/js/uikit-icons.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/I-Project/assets/css/style.css">

</head>