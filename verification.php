<?php 
    // Connection file
    require_once "includes/config.php";   
    // Header file  
    require 'includes/header.inc.php';
?>
<html>

<head>
</head>

<body>  
    <?php
    // define variables and set to empty values
    $verifCode = "";
    $verifCodeErrorMsg = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["verifCode"])) {
        $verifcodeErrorMsg = "Verificatie code is vereist";
    } else {
        $verifCode = test_input($_POST["verifCode"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$verifCode)) {
        $verifCodeErrorMsg = "Only letters and white space allowed";
        }
    }
    }

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
    ?>

    <p>* required field</p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Verificatie code:
    <br>
    <input type="text" name="verifCode">
    *
    <?php echo $verifCodeErrorMsg;?>
    <br><br>
    <input type="submit" name="submit" value="Valideer">  
    </form>

    <?php
    echo "<h2>Your Input:</h2>";
    echo $verifCode;
    ?>

</body>
</html>

<?php
    // Footer file
    require 'includes/footer.inc.php';
?>