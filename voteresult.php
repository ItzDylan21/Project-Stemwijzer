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
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
            <?php
                  $query = "SELECT COUNT(vote.memberID) AS 'AantalStemmen', party.partyname AS 'Partij'
                  FROM vote
                  INNER JOIN member ON vote.memberID = member.memberID
                  INNER JOIN party ON party.partyID = member.partyID
                  GROUP BY party.partyID 
                  ORDER BY COUNT(vote.memberID) DESC;";
                  $result = mysqli_query($conn, $query);
                          while($row = mysqli_fetch_array($result))
                          {
                            echo "['".$row["Partij"]."', ".$row["AantalStemmen"]."], \n";
                          }
                          ?>
        ]);
        

        var piechart_options = {title:'Cirkeldiagram: Stemmen per partij',
                       width:900,
                       height:500};
        var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
        piechart.draw(data, piechart_options);

        var barchart_options = {title:'Staafdiagram: Aantal stemmen per partij',
                       width:900,
                       height:500,
                       legend: 'none'};
        var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
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

        <select name="year" id="year">
            <option value = "2018">2018</option>
            <option value = "2022">2022</option>
        </select>
        <table class="columns">
      <tr>
        <td><div id="piechart_div" style="border: 1px solid #ccc"></div></td>
        <td><div id="barchart_div" style="border: 1px solid #ccc"></div></td>
      </tr>
    </table>


        <?php






?>

       <!-- <div class="piechart"></div>-->
        <?php

        ?>
    </div>
<?php 
    // Footer file
    require 'includes/footer.inc.php';
?>