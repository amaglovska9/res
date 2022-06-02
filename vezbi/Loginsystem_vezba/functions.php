<?php

function check_login($con)
{
    // checking if session value exists
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        // read from database
        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0)
        {
            // collect data
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    // If session value does not exist we redirect to login
    //redirect to login
    header("Location: login.php");
    die; 
}
function  random_num($length)
{
     $text = "";
     if($length <5)
     {
         $length = 5;
     }
     $len = rand(4,$length);

     for($i=0; $i < $len ; $i++)
     {
         $text .= rand(0,9);
     }
     return $text;
}
