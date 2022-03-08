<?php 
    // Connection file
    require_once "includes/config.php";   
    // Header file  
    require 'includes/header.inc.php';
    // Session file
    require 'includes/session.inc.php';
?>

<body>
<div class="container-1">
<div class="header-logo">
    <a href="home.php">
        <span class="gray-text">Stem</span><span class="blue-text">Applicatie</span>
    </a>
</div>
    <div class="header-back">
        <!-- This button brings the user back to the previous page-->
        <a href="javascript:history.go(-1)"><img src="media/back-icon.png"></a>
    </div>
</div>
<div class="container-2">
    <div class="error-style">
        Candidate Vote page
    </div>
</div>
</body>

<?php 
    require "includes/footer.inc.php"
?>