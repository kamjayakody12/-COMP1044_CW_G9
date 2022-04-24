<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">

</script>


    <title>ADD BORROWER DETAILS</title>

</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-12">
                  
                    <h2> Add Borrower Details </h2>
                    <hr>
                    <form action="" method="post" >
                        <div class="form-group">
                            <label for="">Borrow Details ID </label>
                            <input type="number" name="borrow_details_id" class="form-control" placeholder="Enter Borrow Details ID" required min="1" max="9999999">
                        </div>
                        <div class="form-group">
                            <label for=""> Book ID</label>
                            <input type="text" name="book_id" class="form-control" placeholder="Enter Book ID" required maxlength="63">
                        </div>
						<div class="form-group">
                            <label for=""> Borrow ID</label>
                            <input type="text" name="borrow_id" class="form-control" placeholder="Enter Borrow ID" required maxlength="63">
                        </div>
						<div class="form-group">
                            <label for=""> Borrow Status</label>
                            <input type="text" name="borrow_status" class="form-control" placeholder="Enter Borrow Status" required maxlength="63">
                        </div>
						<div class="form-group">
                            <label for=""> Date Return</label>
                            <input type="text" name="date_return" class="form-control" placeholder="Enter Date Return" required maxlength="63">
                        </div>

                        <button type="submit" name="insert" class="btn btn-primary"> Save Data </button>

                        <a href="searchborrowerdetails.php" class="btn btn-danger"> Back </a>
                    </form>
                      
                </div>
            </div>
        </div>
    </div>

    





</body>
</html>

<?php

        $servername = "localhost"; 
        $username = "root"; 
        $password = ""; 
        $dbname = "library"; 
        // Create connection 
        $conn = new mysqli($servername, $username, $password, $dbname); 

        if(isset($_POST['insert']))
        {
            $borrow_details_id = $_POST["borrow_details_id"];
			$book_id = $_POST["book_id"];
			$borrow_id = $_POST["borrow_id"];
			$borrow_status = $_POST["borrow_status"];
			$date_return = $_POST["date_return"];

            $sql = "SELECT * FROM borrowdetails WHERE borrow_details_id= '$borrow_details_id'";
            $result = $conn->query($sql);

            if($result->num_rows == 1){
                echo '<script> alert("Borrow Details ID already exists"); </script>';
            }
            else {
                $sql = "INSERT INTO `borrowdetails` (`book_id` , `borrow_id` , `borrow_status` , `date_return`, `borrow_details_id`) VALUES ('$book_id','$borrow_id','$borrow_status','$date_return','$borrow_details_id')";
                $result = $conn->query($sql);

                if($result)
                {
                    echo '<script> alert("Data Inserted"); </script>';
                }
                else
                {
                    echo '<script> alert("Failed to insert data"); </script>';
                }
            }

        }


?>






