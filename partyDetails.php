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
        <a href="home.php">
        <!--This makes up the logo, its done this way so we can easily change the words dynamically-->
        <span class="gray-text">Stem</span><span class="blue-text">Wijzer</span>
        </a>
    </div>
    <div class="header-back">
        <!-- This button brings the user back to the previous page-->
        <a href="javascript:history.go(-1)"><img src="media/back-icon.png"></a>
    </div>
</div>
<div class="container-4">
    <div class="partyleader-picture">
        <?php
        // This shows the picture of the party leader
        $data =  $_GET['ID'];
        $listOrder = "1";
        $sql2 = "SELECT * FROM member WHERE partyID = ? AND memberListOrder = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql2)) {
            echo "SQL statement failed";
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $data, $listOrder,);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<img src='media/party-members/".$row['memberPicture']."'>";
                $firstName = $row['memberFirstName'];
                $lastName = $row['memberLastName'];
            }
        }
    ?>
</div>
<?php
    // Shows the name of the party leader connected to that party in the chosen muncipality
    echo "<div class='partyleader-name'><p>Lijsttrekker:<span>
    ".$firstName."</span>" , "<span>".$lastName."</span></p>","</div>";
?>
</div>
<div class="container-5">
    <?php
        // Shows the party name of the chosen municipality,
        // and thus changes dynamically depending on the chosen party
        echo "<div class='party-info-title'><p>".$title."</p>","</div>";

        $data =  $_GET['ID'];
        $sql2 = "SELECT * FROM party WHERE partyID = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql2)) {
            echo "SQL statement failed";
        } else {
            mysqli_stmt_bind_param($stmt, "s", $data );
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            // Shows the information about the party chosen by the user
                while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='party-info-text'>". $row['partyinfo']."</div>";
                }
        }
    
    ?>
</div>
</body>
</html>