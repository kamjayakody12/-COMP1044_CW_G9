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

    $borrow_details_id = $_POST['borrow_details_id'];
    $sql = "SELECT * FROM borrowdetails WHERE borrow_details_id='$borrow_details_id'";
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
                            <input type="hidden" name="borrow_details_id" value="<?php echo $row['borrow_details_id'] ?>">
                                 <div class="form-group">
                                    <label for=""> Book ID </label>
                                    <input type="text" name="book_id" class="form-control" value="<?php echo $row['book_id'] ?>" placeholder="Enter Book ID" >
                                </div>    
                                <div class="form-group">
                                    <label for="">  Borrow ID </label>
                                    <input type="text" name="borrow_id" class="form-control" value="<?php echo $row['borrow_id'] ?>" placeholder="Enter Borrow ID" >
                                </div>
                                <div class="form-group">
                                    <label for=""> Borrow Status </label>
                                    <select name="borrow_status" class="form-control" >
                                        <option value="pending"
                                        <?php if($row["borrow_status"] == "pending"){
                                            echo "selected";
                                            }?>>Pending</option>
                                        <option value="returned"
                                        <?php if($row["borrow_status"] == "returned"){
                                            echo "selected";
                                            }?>>Returned</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for=""> Date Returned </label>
                                    <input type="text" name="date_return" class="form-control" value="<?php echo $row['date_return'] ?>" placeholder="Enter Date Return" >
                                </div>  
                                <button type="submit" name="update" class="btn btn-primary"> Update Data </button>

                                <a href="searchborrowerdetails.php" class="btn btn-danger"> CANCEL </a>
                            </form>

                        </div>
                    </div>
                    
                    <?php
                    if(isset($_POST['update']))
                    {
                        $borrow_details_id = $_POST["borrow_details_id"];
                        $book_id = $_POST["book_id"];
                        $borrow_id = $_POST["borrow_id"];
                        $borrow_status = $_POST["borrow_status"];
                        $date_return = $_POST["date_return"];

                        $sql = "UPDATE borrowdetails SET book_id ='$book_id', borrow_id ='$borrow_id', borrow_status ='$borrow_status', date_return ='$date_return' WHERE borrow_details_id ='$borrow_details_id'";
                        $result = $conn->query($sql);

                        if($result)
                        {
                            echo '<script> alert("Data Updated"); </script>';
                            header("location:searchborrowerdetails.php");
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