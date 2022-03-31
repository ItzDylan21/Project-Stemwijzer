<?php 
    // Connection file
    require_once "includes/config.php";
    
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="media/favicon.png"/>
    <title>StemApplicatie</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    
      // Load Charts and the corechart and barchart packages.
      google.charts.load('current', {'packages':['corechart']});

      // Draw the pie chart and bar chart when Charts is loaded.
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Partijnaam');
        data.addColumn('number', 'Zetels 2018');
        data.addColumn('number', 'Zetels 2022');
        data.addRows([
            <?php
                  $query = "SELECT results2018.partyName AS 'partijNaam' , results2018.zetels AS 'zetels2018', results2022.zetels AS 'zetels2022'
                  FROM results2018
                  INNER JOIN results2022
                  ON results2018.partyID = results2022.partyID;";
                  $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $query)) {
                        echo "SQL statement failed";
                    } else{
                         // Set parameters
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "['".$row["partijNaam"]."', ".$row["zetels2018"].", ".$row["zetels2022"]."], \n";
                        }
                    }
            ?>
        ]);
        
        var barchart_options = {title:'Staafdiagram: Vergelijking zetels 2018 en 2022',
            bar: {groupWidth: "65%"},
            width:1000, 
            height:500,
            };

        var barchart = new google.visualization.ColumnChart(document.getElementById('barchart_div'));
        barchart.draw(data, barchart_options);

      }
     
    </script>
</head>

<body>
    <div class="container-1">
        <div class="header-logo">
        <a href="home.php">
              <span class='gray-text'>Stem</span><span class="blue-text">Applicatie</span>
            </a>
        </div>
        <div class="header-back">
            <!-- This button brings the user to the party overview page-->
            <a href="javascript:history.go(-1)"><img src="media/back-icon.png"></a>
        </div>
    </div>
    <div class="container-home">
    <label for="year">Kies een jaar:</label>      
        <select name="year" id="yearID" onchange= "location = this.value;">
        <option value="votecompare.php">Vergelijken</option>    
        <option value="voteresult2022.php">2022</option>
        <option value="voteresult2018.php">2018</option>
        </select>
    
    <div id="chart-wrap">
        <div id="barchart_div"></div>
    </div>

<?php 
    // Footer file
    require 'includes/footer.inc.php';
?>