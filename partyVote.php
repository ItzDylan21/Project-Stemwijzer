<?php 
    // Connection file
    require_once "includes/config.php";   
    // Header file  
    require 'includes/header.inc.php';
?>

<body>
    <p>Party<p>
    Ingevulde code is:
    <br>
    <?php
    echo $_POST["verifCode"];
    
    ?>
    <br>
    
</body>

<?php
    // Footer file
    require 'includes/footer.inc.php';
?>