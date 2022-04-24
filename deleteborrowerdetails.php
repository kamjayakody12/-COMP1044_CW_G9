
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
    $borrow_details_id = $_POST['borrow_details_id'];

    $sql = "DELETE FROM borrowdetails WHERE borrow_details_id = '$borrow_details_id' ";
    $result = $conn->query($sql);

    if($result)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("location:searchborrowerdetails.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

$conn->close();
?>