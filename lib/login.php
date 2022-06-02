<?php

session_start();
include "access.php";

$error = "";


    function create_userid()
    {
        $length = rand(4,20);
        $number = "";                          
        for ($i=0; $i<$length; $i++)
        {
            $new_rand = rand(0,9);

            $number = $number . $new_rand;
        }
        return $number;
    }


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {

       if(!$DB = new PDO("mysql:dbhost=localcost;dbname=results","root","")) 
       {
           die("could not connect to the database");
       }
     
       //save to database
        $arr['email'] = $_POST['email'];   
        $arr['passw'] = hash('sha1', $_POST['passw']); 

        
        $query = "select * from users where email = :email && passw =:passw limit 1";            
        $stm = $DB->prepare($query);                                            
        if($stm)
       {
        $check = $stm->execute($arr);                                      
        if($check)
        {
           $data = $stm->fetchAll(PDO::FETCH_ASSOC);                       
           if(is_array($data) && count($data) > 0)
            {    
                $_SESSION['myid'] =  $data[0]['user_id'];
                $_SESSION['myname'] =  $data[0]['email'];
                $_SESSION['myrank'] =  $data[0]['role'];



            }else{
                $error = "Wrong username or password!!";
            }
        }           
            if($error == "")     
            {
                header("Location: index.php");
                die;
            }
        }

    }
    if($error != "")
    {
        echo "<br> <span style='color:red'> $error .<br><br>";
    }
?>
