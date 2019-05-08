<?php
session_start();
print_R($_SESSION);
?>
<!DOCTYPE html>
<head>
    <title><?php echo (!empty($this->vars['title']) ? $this->vars['title'] : "Eenmaal Andermaal veilingen"); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="/I-Project/assets/css/uikit.min.css">
    <script src="/I-Project/assets/js/uikit-icons.min.js"></script>
    <script src="/I-Project/assets/js/uikit.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/I-Project/assets/css/style.css">

</head>