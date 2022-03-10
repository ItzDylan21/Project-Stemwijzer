<?php 
    // Connection file
    require_once "includes/config.php";   
    // Header file  
    require 'includes/header.inc.php';
?>
<body>
<div class="main-content">
<div class="container-1">
    <div class="header-logo">
         <!--This makes up the logo, its done this way so we can easily change the words dynamically-->
        <a href="home.php">
              <span class='gray-text'>Stem</span>
        
        <span class="blue-text">Applicatie</span>
        
        </a>
    </div>
    <div class="header-back">
        <!-- This button brings the user back to the previous page-->
    </div>
</div>
        <h1><span class="gray-text">Bedankt voor het stemmen.</span></h1>
    <div class="return-home-button">
        <button onclick="window.location.href='home.php';">
        Klik hier om terug te keren naar het startscherm
        </button>
    </div>
        <br>
<div class="timer-text">
        <script type="text/javascript">   
            function Redirect() 
                {  
                    window.location="home.php"; 
                } 
                document.write("Over 20 seconden wordt u automatisch teruggestuurd naar de homepagina."); 
                setTimeout('Redirect()', 20000);   
        </script>
    </div>
</div>
<?php
    // Footer file
    require "includes/footer.inc.php";
?>

