<?php 
    // Connection file
    require_once "includes/config.php";   
    // Header file  
    require 'includes/header.inc.php';
?>
<body>
    <div class="container-1">
        <div class="header-logo">
            <!--This makes up the logo, its done this way so we can easily change the words dynamically-->
            <span class="gray-text">Stem</span><span class="blue-text">Applicatie</span>
        </div>
        <div class="header-back">
            <!-- This button brings the user to the party overview page-->
            <a href="municipalityselection.php">
                <button>Overzicht partijen</button>
            </a>
            <a href="voteresult.php">
                <button>Resultaten</button>
            </a>
        </div>
    </div>
    <div class="container-home">
         <!--This makes up the box for the homepage contents to allow for easy changes-->
        <div class="home-text">
            <span class="gray-text">Welkom</span>
        </div>
        <div class="home-button">
            <a href="verification.php">
                <button>Klik hier om te stemmen!</button>
            </a>
        </div>
<?php 
    // Footer file
    require 'includes/footer.inc.php';
?>