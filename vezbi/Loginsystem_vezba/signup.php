<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
    <style>
       
       #text{
           font-weight: bold;
           height: 25px;
           margin-right: auto;
           margin-left: auto;
           border: thin grey;
           border-radius: 5px;
           padding: 4px;
           width: 80%;
       }
       #button{ 

           background-color: rgba(113, 163, 161, 0.877);
           color: black;
           font-size: 15px;
           font-weight: 100;
           font-family: Georgia, 'Times New Roman', Times, serif;
           border: 1px solid black;
           border-radius: 50px;
           cursor: pointer;
           padding: 10px;
           width: 100px;
           border: 1px grey;
       }
       #box{
           background-color:rgb(61, 100, 98);
           margin: auto;
           width: 300px;
           padding: 20px;
       }
       a{
           text-decoration: none;
           color: black;
           font-size: 15px;
       }
    </style>

     <div id="box">
         <form action="" method="POST">
             <div style="font-size: 20px; margin:10px;">Signup</div>

             <input type="text" name="user_name" id="text"> <br><br>
             <input type="password" name="password" id="text"> <br><br>

             <input type="submit" value="Signup" id="button"> <br><br>

             <a href="login.php"> Click to Login</a> <br><br>

         </form>
     </div>
</body>
</html>