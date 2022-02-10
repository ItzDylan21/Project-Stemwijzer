<?php 
    // Connection file
    require_once "config.php";   
    // Header file  
    require 'includes/header.inc.php';
    $nummer = 66666666;
    $naam = "";
    // Prepare statements
    $sql1 = "SELECT Naam FROM testtabel WHERE Nummer = ?";
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
 <p>what the dog doin?<p>
<p><?php echo $naam; ?></p>

</body>

<?php 
    // Footer file
    require 'includes/footer.inc.php';
?>
