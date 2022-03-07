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
        <span class="gray-text">Stem</span><span class="blue-text">Applicatie</span>
    </a>
</div>
    <div class="header-back">
        <!-- This button brings the user back to the previous page-->
        <a href="javascript:history.go(-1)"><img src="media/back-icon.png"></a>    </div>
</div>
<div class="container-2">
    <div class="code-input-style">
    <script>
        // Function to check if the code has alpha-numeric characters
        function alphanumeric(inputtxt) {
            var letterNumber = /^[0-9a-zA-Z]+$/;
                if(inputtxt.value.match(letterNumber)) {
                    return true;
                }
                    else { 
                        //Deze alert message aanpassen???
                        alert('Uw code is incorrect.');
                        return false;
                    }
        }
    </script>
    <form action="includes/formhandler.inc.php" method="post" name="form1">
        Vul uw verificatiecode hier in 
        <br>
        <!--Form field that accepts text, has a minimum amount of characters, a placeholder and other fun stuff -->
        <input type="text" class="code-char-input" name="verifCode" size="16" minlength="8" placeholder="type code hier" 
        autocomplete="off" required autofocus>
        <br>

        <!--Button that submits data, verifies the code, and redirects user (doesn't have all that functionality yet!) -->
        <button type="submit" 
              onclick="alphanumeric(document.form1.verifCode)"> Code Valideren
        </button>
        
    </form>
</div>
<div class="code-error-message">
<?php
    if(isset($_GET["error"])){
            if ($_GET["error"] == "codeincorrect"){
              echo "<p>Uw code is incorrect of al gebruikt!</p>";
            }
        }
    ?>
</div>
</div>
</body>
<?php 
    require "includes/footer.inc.php"
?>