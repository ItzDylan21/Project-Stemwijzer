<?php
    // Connection file
    require_once "config.php";   
        //This query checks if the code exists in the database or not
        $verifCode = $_POST['verifCode'];
        $codeUsed = "0";
        $sql = "SELECT * FROM code WHERE uniqueCode = ? AND codeUsed = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            echo "SQL statement failed";
        } 

            else {
                mysqli_stmt_bind_param($stmt, "ss", $verifCode, $codeUsed);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) {
                    header('Location: /partyVote.php?ID='.$row['municipalityID']);
                }
            }
            //If the code does not exist the user gets send back to the validation page
            if (mysqli_num_rows($result) == 0) { 
                header('Location: /verification.php?error=codeincorrect');
            }
            

 
?>  