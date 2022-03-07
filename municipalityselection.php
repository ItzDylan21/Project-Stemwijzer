<?php 
    // Database file
    require_once "includes/config.php";   
    // Header file  
    require 'includes/header.inc.php';
?>

<body>
<div class="container-1">
    <div class="header-logo">
      <a href="home.php">
              <span class="gray-text">Stem</span><span class="blue-text">Wijzer</span>
        </a>
    </div>
    <div class="header-back">
        <!-- This button brings the user back to the previous page-->
        <a href="javascript:history.go(-1)"><img src="media/back-icon.png"></a>
    </div>
</div>

<div class="container-2">
    <div class="box-mun-button">
<?php
    /*This shows clickable images of all the parties in the municipality of the user*/ 
    $data = "municipalityID";
    $sql2 = "SELECT * FROM municipality ORDER BY ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql2)) {
        echo "SQL statement failed";
    } else{
        mysqli_stmt_bind_param($stmt, "s", $data );
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='box-mun-button'>
                <a href='overviewparties.php?ID=".$row['municipalityID']."'>
                    <button>".$row['municipalityname']."</button>
                </a></div>";
        }
    }

?>
    </div>
</div>
</body>

<?php 
    // Footer file
    require 'includes/footer.inc.php';
?>