<?php

$servername = "localhost"; 
        $username = "root"; 
        $password = ""; 
        $dbname = "library"; 
        // Create connection 
        $conn = new mysqli($servername, $username, $password, $dbname); 

if(isset($_POST['delete']))
{
    $book_id = $_POST['book_id'];

    $sql = "DELETE FROM books WHERE book_id='$book_id' ";
    $result = $conn->query($sql);

    if($result)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("location:searchbooks.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

$conn->close();
?>