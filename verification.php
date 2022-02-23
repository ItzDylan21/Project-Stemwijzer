<?php 
    // Connection file
    require_once "includes/config.php";   
    // Header file  
    require 'includes/header.inc.php';
?>

<body>
    <p>Verification<p>

    <!--Form field for inputting verification code -->
    <form action="partyVote.php" method="post">
        Vul uw verificatiecode hier in: <input type="text" name="verifCode" value="12345678"><br>
        <!--Button that submits data, verifies the code, and redirects user (doesn't have all that functionality yet!) -->
        <input type="submit" value="Verifiëer code">
    </form>

</body>

<?php
    // Footer file
    require 'includes/footer.inc.php';
?>