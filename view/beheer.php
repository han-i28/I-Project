<?php 
    if (isset($_SESSION['isBeheerder']) && $_SESSION['isBeheerder'] == true) { ?>
        <h2>U bent een beheerder.</h2>
    <?php } else { ?>
        <h2>U bent geen beheerder.</h2>
    <?php } 
?>