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

    button{
        background-color: #38B2F9;
    }
</style>
<body>
    <div class="main-content">
        <h1>Bedankt voor het stemmen.</h1>

        <button onclick="window.location.href='home.php';">
        Klik hier om terug te keren naar het startscherm
        </button>

        
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

