<?php
    // Connection file
    require_once "config.php";
       //Vars to be used
        $verifCode = $_POST['verifCode'];
        $codeUsed = "0";
        //This query checks if the code exists in the database or not
        $sql = "SELECT * FROM code WHERE uniqueCode = ? AND codeUsed = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            echo "SQL statement failed";
        }
            else {
                mysqli_stmt_bind_param($stmt, "ss", $param_verifCode, $param_codeUsed);
                //Parameters
                $param_verifCode = $verifCode;
                $param_codeUsed = $codeUsed;
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) {
                    require 'session.inc.php';
                    header('Location: ../partyvote.php?ID='.$row['municipalityID']);
                }
            }
            //If the code has already been used and is expired the user gets send back to the validation page
            if (mysqli_num_rows($result) == 0) {                
                $sql1 = "UPDATE code SET usedAfterExpired = usedAfterExpired +1 WHERE uniqueCode = '$verifCode'";
                mysqli_query($conn, $sql1);
                Header('Location: ../verification.php?error=codeincorrect');
                }
            $_SESSION['code'] = $verifCode;
            $_SESSION['codeID'] = "test";
            
?>  