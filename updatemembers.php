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

    $member_id = $_POST['member_id'];
    $sql = "SELECT * FROM member WHERE member_id='$member_id' ";
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
                            <input type="hidden" name="member_id" value="<?php echo $row['member_id'] ?>">
                                <div class="form-group">
                                    <label for=""> First Name </label>
                                    <input type="text" name="firstname" class="form-control" value="<?php echo $row['firstname'] ?>" placeholder="Enter First Name" >
                                </div>    
                                <div class="form-group">
                                    <label for=""> Last Name </label>
                                    <input type="text" name="lastname" class="form-control" value="<?php echo $row['lastname'] ?>" placeholder="Enter Last Name" >
                                </div>
                                <div class="form-group">
                                    <label for=""> Gender </label>
                                    <select name="gender" class="form-control" >
                                        <option value="Male"
                                        <?php if($row["gender"] == "Male"){
                                            echo "selected";
                                            }?>>Male</option>
                                        <option value="Female"
                                        <?php if($row["gender"] == "Female"){
                                            echo "selected";
                                            }?>>Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for=""> Address </label>
                                    <input type="text" name="address" class="form-control" value="<?php echo $row['address'] ?>" placeholder="Enter Address" >
                                </div>  
                                <div class="form-group">
                                    <label for=""> Contact </label>
                                    <input type="text" name="contact" class="form-control" value="<?php echo $row['contact'] ?>" placeholder="Enter Contact" >
                                </div> 
                                <div class="form-group">
                                    <label for=""> Type ID </label>
                                    <select name="type_id" class="form-control" >
                                        <option value="2" 
                                        <?php if($row["type_id"] == "2"){
                                            echo "selected";
                                            }?>>Teacher</option>
                                        <option value="20"
                                        <?php if($row["type_id"] == "20"){
                                            echo "selected";
                                            }?>>Employee</option>
                                        <option value="21"
                                        <?php if($row["type_id"] == "21"){
                                            echo "selected";
                                            }?>>Non-Teaching</option>
                                        <option value="22" 
                                        <?php if($row["type_id"] == "22"){
                                            echo "selected";
                                            }?>>Student</option>
                                        <option value="32"
                                        <?php if($row["type_id"] == "32"){
                                            echo "selected";
                                            }?>>Construction</option>
                                    </select> 
                                </div> 
                                <div class="form-group">
                                    <label for=""> Year Level </label>
                                    <select name="year_level" class="form-control" >
                                        <option value="Faculty"
                                        <?php if($row["year_level"] == "Faculty"){
                                            echo "selected";
                                            }?>>Faculty</option>
                                        <option value="First Year"
                                        <?php if($row["year_level"] == "First Year"){
                                            echo "selected";
                                            }?>>First Year</option>
                                        <option value="Second Year"
                                        <?php if($row["year_level"] == "Second Year"){
                                            echo "selected";
                                            }?>>Second Year</option>
                                        <option value="Third Year"
                                        <?php if($row["year_level"] == "Third Year"){
                                            echo "selected";
                                            }?>>Third Year</option>
                                        <option value="Fourth Year"
                                        <?php if($row["year_level"] == "Fourth Year"){
                                            echo "selected";
                                            }?>>Fourth Year</option>
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for=""> Status </label>
                                    <select name="status" class="form-control" >
                                        <option value="Active"
                                        <?php if($row["status"] == "Active"){
                                            echo "selected";
                                            }?>>Active</option>
                                        <option value="Banned"
                                        <?php if($row["status"] == "Banned"){
                                            echo "selected";
                                            }?>>Banned</option>
                                    </select>
                                </div> 
                                <button type="submit" name="update" class="btn btn-primary"> Update Data </button>

                                <a href="searchmembers.php" class="btn btn-danger"> CANCEL </a>
                            </form>

                        </div>
                    </div>
                    
                    <?php
                    if(isset($_POST['update']))
                    {
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $gender = $_POST['gender'];
                        $address = $_POST['address'];
                        $contact = $_POST['contact'];
                        $type_id = $_POST['type_id'];
                        $year_level = $_POST['year_level'];
                        $status = $_POST['status'];

                        $sql = "UPDATE `member` SET `member_id`='$member_id',firstname='$firstname',`lastname`='$lastname',`gender`='$gender',address='$address',`contact`='$contact',type_id='$type_id',`year_level`='$year_level',`status`='$status' WHERE member_id='$member_id'";
                        $result = $conn->query($sql);

                        if($result)
                        {
                            echo '<script> alert("Data Updated"); </script>';
                            header("location:searchmembers.php");
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