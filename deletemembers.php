<?php

        $servername = "localhost"; 
        $username = "root"; 
        $password = ""; 
        $dbname = "library"; 
        // Create connection 
        $conn = new mysqli($servername, $username, $password, $dbname); 

        if ($conn->connect_error){
            die("Connection failed: ". $conn->connect_error);
        }

if(isset($_POST['delete']))
{
    $member_id = $_POST['member_id'];

    $sql = "DELETE FROM member WHERE member_id='$member_id' ";
    $result = $conn->query($sql);

    if($result)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("location:searchmembers.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

$conn->close();
?>