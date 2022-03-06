<?php 
    // Connection file
    require_once "includes/config.php";   
    // Header file  
    require 'includes/header.inc.php';
    $nummer = "0";
    $naam = "";


    // Prepare statements
    $sql1 = "SELECT partyname FROM party WHERE partyID = ?";
    if($stmt = mysqli_prepare($conn, $sql1))
    {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_nummer);
        // Set parameter
        $param_nummer = $nummer;
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt))
        {
            // Store result
            mysqli_stmt_store_result($stmt);          
            // Bind result variables    
            mysqli_stmt_bind_result($stmt, $naam);
            if(mysqli_stmt_fetch($stmt))
            {
                // Close statement
                 mysqli_stmt_close($stmt);
            }
        }
    }
?>

<!DOCTYPE html>
<html>   
<head>
    <title>StemWijzer Home</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" type="image/png" href="media/favicon.png"/>
</head>
<body>
<div class="container-main">
    <div class="container-1">
        <div class="header-logo">
            <!--This makes up the logo, its done this way so we can easily change the words dynamically-->
            <span class="gray-text">Stem</span><span class="blue-text">Wijzer</span>
        </div>
        <div class="header-back">
            <!-- This button brings the user to the party overview page-->
            <a href="overviewparties.php">
                <button>Overzicht partijen</button>
            </a>
        </div>
    </div>
    <div class="container-home">
         <!--This makes up the box for the homepage contents to allow for easy changes-->
        <div class="home-text">
            <span class="gray-text">WELKOM</span>
        </div>
        <div class="home-button">
            <a href="verification.php">
                <button>Klik hier om te stemmen!</button>
            </a>
        </div>
    </div>
</div>    

</body>
</html>
<?php 
    // Footer file
    require 'includes/footer.inc.php';
?>