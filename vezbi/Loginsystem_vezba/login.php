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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
             <div style="font-size: 20px; margin:10px;">Login</div>

             <input type="text" name="user_name" id="text"> <br><br>
             <input type="password" name="password" id="text"> <br><br>

             <input type="submit" value="Login" id="button"> <br><br>

             <a href="signup.php"> Click to Signup</a> <br><br>

         </form>
     </div>
</body>
</html>