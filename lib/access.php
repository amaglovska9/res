<?php


function access($rank, $redirect = true)
{
   
    if(isset($_SESSION["ACCESS"]) && !$_SESSION["ACCESS"][$rank]) //if is set but it's false -> redirect
    {
        if($redirect)
        {
            header("Location: denied.php");
            die; 
        }
        return false;
    }
    return true;
}

$_SESSION["ACCESS"]["ADMIN"] = isset($_SESSION['myrank']) && trim( $_SESSION['myrank']) =="admin";

//All have access for user!
$_SESSION["ACCESS"]["USER"] = isset($_SESSION['myrank']) && (trim( $_SESSION['myrank']) =="user" || trim( $_SESSION['myrank']) =="admin");

?>