<?php
 // Connection file
 require_once "includes/config.php";  
 // Session file
 require "includes/session.inc.php";
 // Check if session has been started
 if(!isset($_SESSION['code']))
{
    session_destroy();
    header("location: home.php");
    exit;
} 
    $partydata = $_GET['ID'];
    $uniqueCode = $_SESSION['code'];
    $memberID = $_GET['member'];
    $sql3 = "SELECT codeID FROM code WHERE uniqueCode = ?";
    $sql4 = "INSERT INTO vote (codeID, memberID) VALUES (?, ?)";
    $sql5 = "UPDATE code SET codeUsed = ?, timeUsed = ? WHERE codeID = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql3)) {
        echo "SQL statement failed";
    } else{
        mysqli_stmt_bind_param($stmt, "s", $uniqueCode);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $codeID = $row['codeID'];
        if (!mysqli_stmt_prepare($stmt, $sql4)) {
            echo "SQL statement failed";
        } else{
            mysqli_stmt_bind_param($stmt, "ss", $param_codeID, $param_memberID);
            // Set parameters
            $param_codeID = $codeID;
            $param_memberID = $memberID;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                if (!mysqli_stmt_prepare($stmt, $sql5)) {
                    echo "SQL statement failed";
                } else{
                    mysqli_stmt_bind_param($stmt, "sss", $param_codeUsed, $param_timeUsed, $param_codeID);
                    // Set parameters
                    $param_codeUsed = 1;
                    $param_timeUsed = date("Y-m-d H:i:s");
                    $param_codeID = $codeID;
                    if(mysqli_stmt_execute($stmt))
                    {
                        session_destroy();
                        // Redirect to thank you page
                        header("location: thanks.php");
                    }
                    else
                    {
                        header("location: processing.php?ID=".$partydata."&member=".$memberID."");
                    }
                }
            }
            else 
            {
                echo "Something went wrong. Please try again later.";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($conn);
?>