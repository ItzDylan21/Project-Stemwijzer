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
        mysqli_stmt_bind_param($stmt, "s", $partydata,);
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
        // Shows the party name as title of the tab
            echo "$title";
        ?>
    </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" type="image/png" href="media/favicon.png"/>
</head>
<body>
<div class="container-1">
    <div class="header-logo">
         <!--This makes up the logo, its done this way so we can easily change the words dynamically-->
        <a href="home.php">
              <span class="gray-text">Stem</span><span class="blue-text">Wijzer</span>
        </a>
    </div>
    <div class="header-back">
        <!-- This button brings the user back to the previous page-->
        <a href="javascript:history.go(-1)"><img src="media/back-icon.png"></a>
    </div>
</div>
<div class="container-3">
<?php
    /*This shows clickable images of all the parties in the municipality of the user*/ 
    $data = $_GET['ID'];
    $sql2 = "SELECT * FROM member WHERE partyID = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql2)) {
        echo "SQL statement failed";
    } else{
        mysqli_stmt_bind_param($stmt, "s", $data );
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            $firstName = $row['memberFirstName'];
            $lastName = $row['memberLastName'];
            
            echo "<div class='member-container'>
                <a href='votesend.php?ID=".$row['partyID']."'>
                    <img src='media/party-members/".$row['memberPicture']."'><br><span class='member-name'>
                    ".$firstName."</span>" , "<span class= 'member-name'>".$lastName."</span>
                </a></div>";
        }
    }
?>
</div>
</body>
<?php 
    // Footer file
    require 'includes/footer.inc.php';
?>