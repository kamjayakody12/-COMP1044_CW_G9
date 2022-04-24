<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"/>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Search</title>


</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="home.html">Library</a>
      
        <!-- Links -->
        <ul class="navbar-nav">
          <!-- Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              Search
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="searchbooks.php">Book</a>
              <a class="dropdown-item" href="searchmembers.php">Member</a>
              <a class="dropdown-item" href="searchborrowerdetails.php">Borrow Details</a>
            </div>
          </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"></li>
                <a href="login.html" class="btn btn-danger"> Log Out </a>
            </li>
        </ul>
          
        
      </nav>

<div class="header">
<div class="container">
        <div class="jumbotron">

            <div class="row">
                <div class="col-md-6">
                    <h2>SEARCH MEMBER</h2>
                </div>
                <div class="col-md-6">
                    <a href="addmembers.php" class="btn btn-success" style="margin-left: 80%;"> ADD<br>MEMBER </a>    
                </div>
                <div class="col-md-12">
                    <hr> 
                </div>
            </div>


<form action="" method="post">
Search <input type="text" class="form-control" name="search" placeholder="Enter Keyword"><br>
<div class="input-group-btn">
Filter By: <select name="column" class="form-control">
	<option value="member_id">Member ID</option>
	<option value="firstname">First Name</option>
	<option value="lastname">Last Name</option>
    <option value="status">Status</option>
    <option value="borrowertype">Type</option>
    <option value="year_level">Year Level</option>
	</select><br>
<input type ="submit" class="btn btn-primary" value="Search"><br><br>
</form>



<?php

$search = $_POST['search'];
$column = $_POST['column'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "library";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}


$sql = "SELECT member_id, firstname, lastname, gender, address, contact, borrowertype, year_level, status FROM member INNER JOIN type on member.type_id= type.type_id WHERE $column like '%$search%'";

$result = $conn->query($sql);

?>
<div class="row">
        <div class="col-md-12">
        <div class="table-responsive">
            <table id="output">
                    <tr>
                        <th> Member ID </th>
                        <th> First Name </th>
                        <th> Last Name </th>
                        <th> Gender </th>
                        <th> Address </th>
                        <th> Contact </th>
                        <th> Type </th>
                        <th> Year Level </th>
                        <th> Status </th>
                        <th> EDIT </th>
                        <th> DELETE </th>
                    </tr>
                
                <tbody>

<?php

        if ($result->num_rows > 0){
        while($row = mysqli_fetch_array($result) ){
            ?>
            <tr>
                <td> <?php echo $row['member_id']; ?> </td>
                <td> <?php echo $row['firstname']; ?> </td>
                <td> <?php echo $row['lastname']; ?> </td>
                <td> <?php echo $row['gender']; ?> </td>
                <td> <?php echo $row['address']; ?> </td>
                <td> <?php echo $row['contact']; ?> </td>
                <td> <?php echo $row['borrowertype']; ?> </td>
                <td> <?php echo $row['year_level']; ?> </td>
                <td> <?php echo $row['status']; ?> </td>
                <td>
                                <form action="updatemembers.php" method="post">
                                    <input type="hidden" name="member_id" value="<?php echo $row['member_id'] ?>">
                                    <input type="submit" name="edit" class="btn btn-success" value="EDIT">
                                </form>
                    </td>
                    <td>
                                <form action="deletemembers.php" method="post">
                                    <input type="hidden" name="member_id" value="<?php echo $row['member_id'] ?>">
                                    <input type="submit" name="delete" class="btn btn-danger" value="DELETE" onclick="if (!confirm('Are you sure?')) { return false }"> 
                                </form>
                    </td>        
            </tr>
            <?php
        }
        }
        else
        {
            ?>
                <tr>    
                    <td colspan="12"> No Record Found </td>
                </tr>
            <?php
        }
            ?>
                </tbody>
            </table>
        </div>
        </div>
</div>
</div>
</body>
</html>