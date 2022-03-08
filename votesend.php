<?php 
    // Connection file
    require_once "includes/config.php";   
    // Session File
    require 'includes/session.inc.php';
    $partydata = $_GET['ID'];
    $uniqueCode = $_POST['code']; //Moet je niet session code gebruiken? bijv: $_SESSION['code']
    $memberID = $_GET['member'];
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
        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
    $sql3 = "SELECT codeID FROM code WHERE uniqueCode = ?";
    $sql4 = "INSERT INTO vote (codeID, memberID) VALUES (?, ?)";
    $sql5 = "UPDATE code SET codeUsed = ?, timeUsed = ? WHERE codeID = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql3)) {
        echo "SQL statement failed";
    } else{
        mysqli_stmt_bind_param($stmt, "s", $uniqueCode);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $codeID = $row['codeID'];
        if (!mysqli_stmt_prepare($stmt, $sql4)) {
            echo "SQL statement failed";
        } else{
            mysqli_stmt_bind_param($stmt, "ss", $param_codeID, $param_memberID);
            // Set parameters
            $param_codeID = $codeID;
            $param_memberID = $memberID;
            // Attempt to execute the prepared statement
            mysqli_stmt_execute($stmt)
            
            {
                // Redirect to thank you page
                header("location: thanks.php");
            }
            else 
            {
                echo "Something went wrong. Please try again later.";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($conn);
    };
?>
<!DOCTYPE html>
<html>   
<head>
    <title>
        
        <?php
        // Shows the party name as title of the tab
            echo "$muniTitle";
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
    <p> Uw stem op $title</p>
    </div>";
    /*This shows clickable images of all the parties in the municipality of the user*/ 
    $data = $_GET['ID'];
    $member = $_GET['member'];
    $sql2 = "SELECT * FROM member WHERE partyID = ? AND memberID = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql2)) {
        echo "SQL statement failed";
    } else{
        mysqli_stmt_bind_param($stmt, "ss", $data, $member );
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            $firstName = $row['memberFirstName'];
            $lastName = $row['memberLastName'];
            
            echo "<div class='member-container'>
                <a href='votesend.php?ID=".$row['partyID']."?member=".$row['memberID']."'>
                    <img src='media/party-members/".$row['memberPicture']."'><br><span class='member-name'>
                    ".$firstName." </span>" , "<span class= 'member-name'>".$lastName."</span>
                </a></div>";
        }
    }
?>
 <form class= vote-form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <p>U heeft deze selectie gemaakt!</p>
            <div class="form-group">
                <input type="submit" class="vote-button" value="STEM">
            </div>
</form>
</div>
</body>
<?php 
    // Footer file
    require 'includes/footer.inc.php';
?>