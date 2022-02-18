<?php 
    // Database file
    require_once "includes/config.php";   
    // Header file  
    require 'includes/header.inc.php';
?>

<body>
<?php
    $data = "partylogo";
    $sql2 = "SELECT * FROM party ORDER BY ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql2)) {
        echo "SQL statement failed";
    } else{
        mysqli_stmt_bind_param($stmt, "s", $data );
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='party-container'>
                <a href='partydetails.php?ID=".$row['partyID']."'>
                    <img src='media/".$row['partylogo']."'>
                </a></div>";
        }
    }

?>
</body>

<?php 
    // Footer file
    require 'includes/footer.inc.php';
?>