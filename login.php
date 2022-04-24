<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َLogin/Signup Page</title>
    <link rel="stylesheet" href="style.css">
  </head>

  <img src="unilogo2.png" alt="University logo"width="375px" height="375px" class="logo">

  <body>
<form class="box" action="" method="post">
  <h1>Login</h1>
  <input type="text" name="username" placeholder="Username" id="username" required>
  <input type="password" name="password" placeholder="Password" id="password" required>
  <input type="submit" name="" value="Login">
  <p style="color: antiquewhite;">Not a user? <a href="signup.php">Signup</a> now!</p>
  
</form>


  </body>
</html>


<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $db = "library";

   $conn = new mysqli($servername, $username, $password, $db);

   if ($conn->connect_error){
       die("Connection failed: ". $conn->connect_error);
   }

   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 

      $myusername=$_POST["username"];
      $mypassword=$_POST["password"];

      $sql = "SELECT user_id FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = $conn->query($sql);



      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {

         $_SESSION['username'] = $myusername;
         $_SESSION['password'] = $mypassword;
         header("location: home.html");

      }else {
        echo '<script> alert("Wrong username or password"); </script>' ;
        
      }
   }
?>
