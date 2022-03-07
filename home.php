<?php 
    // Connection file
    require_once "includes/config.php";   
    // Header file  
    require 'includes/header.inc.php';
    $nummer = "0";
    $naam = "";

    // This is a example of prepared statements and how they work
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
<body>
    <div class="container-1">
        <div class="header-logo">
            <!--This makes up the logo, its done this way so we can easily change the words dynamically-->
            <span class="gray-text">Stem</span><span class="blue-text">Wijzer</span>
        </div>
        <div class="header-back">
            <!-- This button brings the user to the party overview page-->
            <a href="municipalityselection.php">
                <button>Overzicht partijen</button>
            </a>
        </div>
    </div>
    <div class="container-home">
         <!--This makes up the box for the homepage contents to allow for easy changes-->
        <div class="home-text">
            <span class="gray-text">Welkom</span>
        </div>
        <div class="home-button">
            <a href="verification.php">
                <button>Klik hier om te stemmen!</button>
            </a>
        </div>
    
</body>
<?php 
    // Footer file
    require 'includes/footer.inc.php';
?>