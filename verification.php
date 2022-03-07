<?php 
    // Connection file
    require_once "includes/config.php";   
    // Header file  
    require 'includes/header.inc.php';
?>
<html>
<body>
    <p>Verification<p>
<?php
    $verifCode = "";
?>

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

    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="form1">
        Vul uw verificatiecode hier in:
        <!--Form field that accepts text, has a minimum amount of characters, a placeholder and other fun stuff -->
        <input type="text" name="verifCode" size="16" minlength="8" placeholder="code hier" 
        autocomplete="off" required autofocus>
        <br>

        <!--Button that submits data, verifies the code, and redirects user (doesn't have all that functionality yet!) -->
        <input type="submit" value="Verifiëer code" onclick="alphanumeric(document.form1.verifCode)">
        
    </form>

</body>
</html>
<?php
    // Footer file
    require 'includes/footer.inc.php';
?>

