<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>ADD MEMBERS</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-12">
                  
                    <h2> Add Member </h2>
                    <hr>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Member ID </label>
                            <input type="text" name="member_id" class="form-control" placeholder="Enter Member ID" required min="1" max="9999999">
                        </div>
                        <div class="form-group">
                            <label for=""> First Name </label>
                            <input type="text" name="firstname" class="form-control" placeholder="Enter First Name" required maxlength="12">
                        </div>
                        <div class="form-group">
                            <label for=""> Last Name</label>
                            <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name" required maxlength="9">
                        </div>
                        <div class="form-group">
                            <label for=""> Gender </label>
                            <select name="gender" class="form-control" >
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>  
                        </div>
                        <div class="form-group">
                            <label for=""> Address </label>
                            <input type="text" name="address" class="form-control" placeholder="Enter Address" required maxlength="13">
                        </div>
                        <div class="form-group">
                            <label for=""> Contact Number </label>
                            <input type="text" name="contact" class="form-control" placeholder="Enter Contact Number" required maxlength="7" pattern="[0-9]+"> 
                        </div>
                        <div class="form-group">
                            <label for="">Type ID </label>
                            <select name="type_id" class="form-control" >
                                <option value="2">Teacher</option>
                                <option value="20">Employee</option>
                                <option value="21">Non-Teaching</option>
                                <option value="22">Student</option>
                                <option value="32">Construction</option>
                            </select> 
                        </div>
                        <div class="form-group">
                            <label for=""> year_level </label>
                            <select name="year_level" class="form-control" >
                                <option value="Faculty">Faculty</option>
                                <option value="First Year">First Year</option>
                                <option value="Second Year">Second Year</option>
                                <option value="Third Year">Third Year</option>
                                <option value="Fourth Year">Fourth Year</option>
                            </select>  
                        </div>
                        <div class="form-group">
                            <label for=""> Status </label>
                            <select name="status" class="form-control" >
                                <option value="Active">Active</option>
                                <option value="Banned">Banned</option>
                            </select>  
                        </div>

                        <button type="submit" name="insert" class="btn btn-primary"> Save Data </button>

                        <a href="searchmembers.php" class="btn btn-danger"> Back </a>
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
            $member_id = $_POST['member_id'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $contact = $_POST['contact'];
            $type_id = $_POST['type_id'];
            $year_level = $_POST['year_level'];
            $status = $_POST['status'];


            $sql = "SELECT * FROM member WHERE member_id= '$member_id'";
            $result = $conn->query($sql);

            if($result->num_rows == 1){
                echo '<script> alert("Member ID already exists"); </script>';
            }
            else {
                $sql = "INSERT INTO `member`(`member_id`, `firstname`, `lastname`, `gender`, `address`, `contact`, `type_id`, `year_level`, `status`) VALUES ('$member_id','$firstname','$lastname','$gender','$address','$contact','$type_id','$year_level','$status')";
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

        $conn->close();
?>