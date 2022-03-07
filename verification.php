<?php 
    // Connection file
    require_once "includes/config.php";   
    // Header file  
    require 'includes/header.inc.php';
?>
<html>
<body>
<div class="container-1">
<div class="header-logo">
    <a href="home.php">
        <span class="gray-text">Stem</span><span class="blue-text">Wijzer</span>
    </a>
</div>
    <div class="header-back">
   <!--Only put the back button here if needed, logo also returns the user to the homepage-->
    </div>
</div>
<div class="container-2">
    <div class="error-style">
    <script>
        // Function to check if the code has alpha-numeric characters
        function alphanumeric(inputtxt) {
            var letterNumber = /^[0-9a-zA-Z]+$/;
                if(inputtxt.value.match(letterNumber)) {
                    return true;
                }
                    else { 
                        alert('Uw code is incorrect.');
                        return false;
                    }
        }
    </script>

    
    <form action="includes/formhandler.inc.php" method="post" name="form1">
        Vul uw verificatiecode hier in:
        <!--Form field that accepts text, has a minimum amount of characters, a placeholder and other fun stuff -->
        <input type="text" name="verifCode" size="16" minlength="8" placeholder="code hier" 
        autocomplete="off" required autofocus>
        <br>

        <!--Button that submits data, verifies the code, and redirects user (doesn't have all that functionality yet!) -->
        <input type="submit" value="Verifiëer code" onclick="alphanumeric(document.form1.verifCode)">
        
    </form>
     </div>
     </div>

    <?php
    if(isset($_GET["error"])){
            if ($_GET["error"] == "codeincorrect"){
              echo "<p>Uw code is incorrect</p>";
            }
        }
    ?>
</body>
<?php 
    require "includes/footer.inc.php"
?>