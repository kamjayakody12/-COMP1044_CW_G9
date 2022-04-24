
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َLogin/Signup Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<img src="unilogo2.png" alt="University logo"width="375px" height="375px" class="logo">

<body>
<form class="box" action="signup.php" method="post">
    <h1>
    <a href="login.html"> 
    <img src="backarrow.png" alt="Back"width="25px" height="25px" class="arrow">
    </a>
    Signup</h1>
    <input type="text" name="firstname" placeholder="First Name" required>
    <input type="text" name="lastname" placeholder="Last Name" required>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" name="" value="Signup" >
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

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 

      $myusername=$_POST["username"];
      $mypassword=$_POST["password"];
      $firstname=$_POST["firstname"];
      $lastname=$_POST["lastname"];

      $sql = "SELECT * FROM users WHERE username= '$myusername'";
      $result = $conn->query($sql);

      if($result->num_rows == 1){
        echo '<script> alert("Username already exists"); </script>';
      }
      else {
        $sql = "INSERT INTO users (`password`,`lastname` ,`username`,`firstname`) VALUES ('$mypassword','$lastname','$myusername','$firstname')";
        $result = $conn->query($sql);
        header("location: signupvalid.html");
      }
   }

?>
