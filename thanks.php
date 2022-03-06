<?php 
    // Connection file
    require_once "includes/config.php";   
    // Header file  
    require 'includes/header.inc.php';
?>


<style>
    /* Temporary styling */
    body{
        background-color: white;
        text-align: center;
    }

    .main-content{
        margin-left: 10%;
        margin-right: 10%;
        border-style: solid;
        border-width: 1px;
        border-color: #a1a1a1;
    }
</style>
<div class="main-content">
<div class="container-1">
    <div class="header-logo">
         <!--This makes up the logo, its done this way so we can easily change the words dynamically-->
        <a href="home.php">
              <span class="gray-text">Stem</span><span class="blue-text">Wijzer</span>
        </a>
    </div>
    <div class="header-back">
        <!-- This button brings the user back to the previous page-->
        <a href="javascript:history.go(-1)"><img src="media/back-icon.png"></a>
    </div>
</div>
<body>
    
        <h1>Bedankt voor het stemmen.</h1>

        <button onclick="window.location.href='home.php';">
        Klik hier om terug te keren naar het startscherm
        </button>
        <br>

        
        <script type="text/javascript">   
            function Redirect() 
                {  
                    window.location="home.php"; 
                } 
                document.write("Over 20 seconden wordt u automatisch teruggestuurd naar de homepagina."); 
                setTimeout('Redirect()', 20000);   
        </script>
    </div>
</body>

