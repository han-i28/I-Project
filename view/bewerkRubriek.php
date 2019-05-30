<?php 
    if (isset($_SESSION['isBeheerder']) && $_SESSION['isBeheerder'] == true) { ?>
        
    <?php } else { ?>
        <h2>U bent geen beheerder.</h2>
    <?php }
    ?>