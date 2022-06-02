<?php
include "access.php" ;

$error = "";

//Function that will create uderid of length 20 from 4 to 20
    function create_userid()
    {
        $length = rand(4,20);
        $number = "";                           //number starts here, we start with empty string & it will be a random number 
        for ($i=0; $i<$length; $i++)
        {
            $new_rand = rand(0,9);

            $number = $number . $new_rand;
        }
        return $number;
    }

    // This is how we know that something is posted
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {

        // Connecting to database to save data
       if(!$DB = new PDO("mysql:dbhost=localcost;dbname=results","root","")) 
       {
           die("could not connect to the database");
       }
      
   

       $arr['user_id'] = create_userid();                                             //this gonna give us a value
       $condition = true;                                                           //assuming that this item exists in database
     while($condition)
    {
           
    //Creating a query that will check if the userid exists in the database
        $query = "select id from users where user_id = :user_id limit 1";            //limit 1 -> is used so as soon as it finds the id it stops searching
        $stm = $DB->prepare($query);                                              //prepared statement
       if($stm)
    {
        $check = $stm->execute($arr);                                        //because we have a variable(userid) we need to execute like this otherwise we can just execute it simple and empty
        if($check)
        {
           $data = $stm->fetchAll(PDO::FETCH_ASSOC);                       //we want to get our data from here
           if(is_array($data) && count($data) > 0)
            {    
                $arr['user_id'] = create_userid();                         //it wont repeat twice
                continue;                                    //it stops the loop right here and goes back to the top, check the condition again and runs again
            }
        }
      }
      $condition = false;
    }

        // Save to database
        $arr['uname'] = $_POST['uname'];                 //saving variable name in database
        $arr['email'] = $_POST['email'];   
        $arr['passw'] = hash('sha1', $_POST['passw']); 
        $arr['role'] = "user";
        
        $query = "insert into users (user_id,uname,email,passw,role) values (:user_id,:uname,:email,:passw,:role)";            
        $stm = $DB->prepare($query);                                            
        if($stm)
       {
           $chek = $stm->execute($arr);
           if(!$check)                                 //if not
            {
                $error = "could not save to database";
            }
            if($error == "")     //if error is empty means everything went well
            {
                header("Location: ../#!login");
                die;
            }
        }

    }

?>
