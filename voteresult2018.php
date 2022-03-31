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
        data.addColumn('number', 'Zetels');
        data.addRows([
            <?php
                  $query = "SELECT * FROM results2018";
                  $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $query)) {
                        echo "SQL statement failed";
                    } else{
                         // Set parameters
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "['".$row["partyName"]."', ".$row["zetels"]."], \n";
                        }
                    }
            ?>
        ]);
        

        var piechart_options = {title:'Cirkeldiagram: Stemmen per partij',
            width:700, 
            height:500,
            is3D: true,
            pieSliceText: 'value'};

        var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
        piechart.draw(data, piechart_options);

        var barchart_options = {title:'Staafdiagram: Aantal stemmen per partij',
            width:700, 
            height:500,
            legend: 'none'};

        var barchart = new google.visualization.ColumnChart(document.getElementById('barchart_div'));
        barchart.draw(data, barchart_options);

      }
     

    </script>
</head>

<body>
    <div class="container-1">
        <div class="header-logo">
            <!--This makes up the logo, its done this way so we can easily change the words dynamically-->
            <span class="gray-text">Stem</span><span class="blue-text">Applicatie</span>
        </div>
        <div class="header-back">
            <!-- This button brings the user to the party overview page-->
            <a href="javascript:history.go(-1)"><img src="media/back-icon.png"></a>
        </div>
    </div>
    <div class="container-home">
        <label for="year">Kies een jaar:</label>      
        <select name="year" id="yearID" onchange= "location = this.value;">
            <option value="voteresult2018.php">2018</option>
            <option value="voteresult2022.php">2022</option>
        </select>
    
    <div id="chart-wrap">
        <div id="piechart_div"></div>
        <div id="barchart_div"></div>
    </div>

<?php 
    // Footer file
    require 'includes/footer.inc.php';
?>
