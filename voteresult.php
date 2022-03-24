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

    <?php 
        $query = "SELECT COUNT(vote.memberID) AS 'AantalStemmen', party.partyname AS 'Partij'
        FROM vote
        INNER JOIN member ON vote.memberID = member.memberID
        INNER JOIN party ON party.partyID = member.partyID
        GROUP BY party.partyID 
        ORDER BY COUNT(vote.memberID) DESC;";
        $result = mysqli_query($conn, $query);
    
        while($value = mysqli_fetch_assoc($result)){
            echo $value['Partij'].$value['AantalStemmen'];
                    }
      ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Partij', 'AantalStemmen'],
          <?php
                          while($row = mysqli_fetch_array($result))
                          {
                               echo "['".$row["Partij"]."', ".$row["AantalStemmen"]."],";
                          }
                          ?>
        
        ]);

        var options = {
          title: 'My Daily Activities',  
                      //is3D:true,  
                      pieHole: 0.4  
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
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
        <div id="piechart" style="width: 900px; height: 500px;"></div>

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