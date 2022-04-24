<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Edit and Update Data</title>
</head>
<body>
    <?php
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "library"; 
    // Create connection 
    $conn = new mysqli($servername, $username, $password, $dbname); 

    $book_id = $_POST['book_id'];
    $sql = "SELECT * FROM books WHERE book_id='$book_id' ";
    $result = $conn->query($sql);

    if($result)
    {
        while($row = mysqli_fetch_array($result))
        {
            ?>
            <div class="container">
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <h2>Update Data</h2>
                            <hr>
                            <form action="" method="post">
                            <input type="hidden" name="book_id" value="<?php echo $row['book_id'] ?>">
                                <div class="form-group">
                                    <label for=""> Book Title </label>
                                    <input type="text" name="book_title" class="form-control" value="<?php echo $row['book_title'] ?>" placeholder="Enter Book Title" >
                                </div>    
                                <div class="form-group">
                                    <label for=""> Category ID </label>
                                    <input type="text" name="category_id" class="form-control" value="<?php echo $row['category_id'] ?>" placeholder="Enter Category ID" >
                                </div>
                                <div class="form-group">
								<label for=""> Author </label>
                                    <input type="text" name="author" class="form-control" value="<?php echo $row['author'] ?>" placeholder="Enter Author" >
                                </div>
                                <div class="form-group">
                                    <label for=""> Book Copies </label>
                                    <input type="text" name="book_copies" class="form-control" value="<?php echo $row['book_copies'] ?>" placeholder="Enter Book Copies" >
                                </div>  
                                <div class="form-group">
                                    <label for=""> Book Publisher </label>
                                    <input type="text" name="book_pub" class="form-control" value="<?php echo $row['book_pub'] ?>" placeholder="Enter Book Pub" >
                                </div> 
								<div class="form-group">
                                    <label for=""> Publisher Name </label>
                                    <input type="text" name="publisher_name" class="form-control" value="<?php echo $row['publisher_name'] ?>" placeholder="Enter Publisher Name" >
                                </div> 
								<div class="form-group">
                                    <label for=""> ISBN </label>
                                    <input type="text" name="isbn" class="form-control" value="<?php echo $row['isbn'] ?>" placeholder="Enter ISBN" >
                                </div> 
								<div class="form-group">
                                    <label for=""> Copyright Year </label>
                                    <input type="text" name="copyright_year" class="form-control" value="<?php echo $row['copyright_year'] ?>" placeholder="Enter Copyright Year" >
                                </div>
                                <div class="form-group">
                                    <label for=""> Date Receive </label>
                                    <input type="text" name="date_receive" class="form-control" value="<?php echo $row['date_receive'] ?>" placeholder="Enter Date Receiver" >
                                </div>
                                <div class="form-group">
                                    <label for=""> Date Added </label>
                                    <input type="text" name="date_added" class="form-control" value="<?php echo $row['date_added'] ?>" placeholder="Enter Date Added" >
                                </div>
								<div class="form-group">
                                    <label for=""> Status </label>
                                    <input type="text" name="status" class="form-control" value="<?php echo $row['status'] ?>" placeholder="Enter Status" >
                                </div>
                                <button type="submit" name="update" class="btn btn-primary"> Update Data </button>

                                <a href="searchbooks.php" class="btn btn-danger"> CANCEL </a>
                            </form>

                        </div>
                    </div>
                    
                    <?php
                    if(isset($_POST['update']))
                    {
                        $book_id = $_POST["book_id"];
						$book_title = $_POST["book_title"];
						$category_id = $_POST["category_id"];
						$author = $_POST["author"];
						$book_copies = $_POST["book_copies"];
						$book_pub = $_POST["book_pub"];
						$publisher_name = $_POST["publisher_name"];
						$isbn = $_POST["isbn"];
						$copyright_year = $_POST["copyright_year"];
						$date_receive = $_POST["date_receive"];
						$date_added = $_POST["date_added"];
						$status = $_POST["status"];

                        $sql = "UPDATE books SET book_title ='$book_title',category_id ='$category_id',author ='$author', book_copies ='$book_copies',book_pub= '$book_pub',publisher_name= '$publisher_name',isbn= '$isbn',copyright_year= '$copyright_year',date_receive='$date_receive', date_added='$date_added',status='$status' WHERE book_id ='$book_id'";
                        $result = $conn->query($sql);

                        if($result)
                        {
                            echo '<script> alert("Data Updated"); </script>';
                            header("location:searchbooks.php");
                        }
                        else
                        {
                            echo '<script> alert("Data Not Updated"); </script>';
                        }
                    }
                    ?>

                </div>
            </div>
            <?php
        }
    }
    else
    {
        // echo '<script> alert("No Record Found"); </script>';
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>No Record Found</h4>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</body>
</html>





