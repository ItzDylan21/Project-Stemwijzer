<?php 
    // Connection file
    require_once "includes/config.php";   
    // Session file
    require 'includes/session.inc.php';
    $partydata = $_GET['ID'];
    $sql2 = "SELECT party.partyname, municipality.municipalityname FROM party INNER JOIN municipality ON
     party.municipalityID = municipality.municipalityID WHERE party.partyID = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql2)) {
        echo "SQL statement failed";
    } else{
        mysqli_stmt_bind_param($stmt, "s", $partydata);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
        $row = mysqli_fetch_assoc($result);
        $title = $row['partyname'];
        $muniTitle = $row['municipalityname'];
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
<div class="top"></div>
<button class="scrollButton2" id="scrollButtoonclick=" onclick="location.href='#top';"><a href="#top">&#8593;</a></button>
<button class="scrollButton" id="scrollButtoonclick=" onclick="location.href='#bottom';"><a href="#bottom">&#8595;</a></button>
<div class="container-1">
    <div class="header-logo">
         <!--This makes up the logo, its done this way so we can easily change the words dynamically-->
         <span class='gray-text'>Stem</span>
        <?php
        echo "<span class='blue-text'>".$muniTitle."</span>";
        ?>
    </div>
    <div class="header-back">
        <!-- This button brings the user back to the previous page-->
        <a href="javascript:history.go(-1)"><img src="media/back-icon.png"></a>
    </div>
</div>
<div class="container-3">

<?php

    echo "<div class='party-info-title text-center'>
    <p>Overzicht partijleden $title</p>
    </div>";

    /*This shows clickable images of all the parties in the municipality of the user*/ 
    $data = $_GET['ID'];
    $sql2 = "SELECT * FROM member WHERE partyID = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql2)) {
        echo "SQL statement failed";
    }
    else {
        mysqli_stmt_bind_param($stmt, "s", $data );
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            $firstName = $row['memberFirstName'];
            $lastName = $row['memberLastName'];
            
            echo "<div class='member-container'>
                <a href='votesend.php?ID=".$row['partyID']."&member=".$row['memberID']."'>
                    <img src='media/party-members/".$row['memberPicture']."'><br><span class='member-name'>
                    ".$firstName." </span>" , "<span class= 'member-name'>".$lastName."</span>
                </a></div>";
        }
    }
?>
</div>
<div name ="bottom" id="bottom" class="bottom"></div>
<?php 
    // Footer file
    require 'includes/footer.inc.php';
?>
