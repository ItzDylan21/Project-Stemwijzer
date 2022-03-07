<?php 
    // Connection file
    require_once "includes/config.php";   
    // Header file  
    require 'includes/header.inc.php';
?>

<body>
<div class="container-1">
<div class="header-logo">
    <a href="home.php">
        <span class="gray-text">Stem</span><span class="blue-text">Applicatie</span>
    </a>
</div>
    <div class="header-back">
   <!--Only put the back button here if needed, logo also returns the user to the homepage-->
    </div>
</div>
<div class="container-2">
    <div class="error-style">
    </div>
</div>
</body>

<?php 
    require "includes/footer.inc.php"
?>