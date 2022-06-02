<?php
session_start();
  
include("connection.php");
include("functions.php");

//    collect users data and connecting with database & will check if the user is logged in
$user_data = check_login($con); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log&Signs</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>This is the index pages</h1>

    <br>
    Hello, <?php echo $user_data['user_name']; ?>
</body>
</html>