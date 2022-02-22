<?php 
    // Connection file
    require_once "includes/config.php";   
    // Header file  
    $partydata = $_GET['ID'];
    $sql2 = "SELECT * FROM party WHERE partyID = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql2)) {
        echo "SQL statement failed";
    } else{
        mysqli_stmt_bind_param($stmt, "s", $partydata );
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
    
    
    $row = mysqli_fetch_assoc($result);
    $title = $row['partyname'];
    }
    
    ?>
    <!DOCTYPE html>
    <html>
    
    <head>
            <title>
             <?php
                echo "$title";
            ?>
            </title>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" href="../images/logo.png">
            <link rel="stylesheet" href="css/style.css">
    </head>
    
    <body>
    <div class="container-1">
    <div class="header-logo">
      <a href="home.php">
              <span class="gray-text">Stem</span><span class="blue-text">Wijzer</span>
        </a>
    </div>
    <div class="header-back">
        <a href="municipalityselection.php"><img src="media/back-icon.png"></a>
    </div>
</div>
<div class="container-3">
    <div class="member-picture">
    <?php
    /*This shows clickable images of all the parties in the municipality of the user*/ 
    $data =  $_GET['ID'];
    $sql2 = "SELECT * FROM member WHERE partyID = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql2)) {
        echo "SQL statement failed";
    } else{
        mysqli_stmt_bind_param($stmt, "s", $data );
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<img src='media/party-members/".$row['memberPicture']."'>";
        }
    }
?>
    </div>
        <div class="party-info">
            <?php
                $data =  $_GET['ID'];
                $sql2 = "SELECT * FROM party WHERE partyID = ?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt,$sql2)) {
                    echo "SQL statement failed";
                } else{
                    mysqli_stmt_bind_param($stmt, "s", $data );
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
            
                    while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='artbox'>". $row['partyinfo']."</div>";
                    }
                }
    
            ?>
        </div>
</div>
    </body>
    
    </html>