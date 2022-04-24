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
                    <h2>SEARCH BORROWER</h2>
                </div>
                <div class="col-md-6">
                    <a href="addborrowerdetails.php" class="btn btn-success" style="margin-left: 80%;"> ADD <br> BORROWER </a>    
                </div>
                <div class="col-md-12">
                    <hr> 
                </div>
            </div>


<form action="" method="post">
Search <input type="text" class="form-control" name="search" placeholder="Enter Keyword"><br>

Filter By: <select name="column" class="form-control">
	<option value="borrow_details_id">Borrower ID</option>
	<option value="book_id">Book ID</option>
	<option value="borrow_id">Borrow ID</option>
    <option value="borrow_status">Borrow Status</option>
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

$sql = "SELECT * FROM borrowdetails WHERE $column like '%$search%'";

$result = $conn->query($sql);

?>
<div class="row">
        <div class="col-md-12">
        <div class="table-responsive">
            <table id="output">
                    <tr>
                        <th> Borrower ID </th>
                        <th> Book ID </th>
                        <th> Borrow ID</th>
                        <th> Borrow Status </th>
                        <th> Date Return </th>
                        <th> EDIT </th>
                        <th> DELETE </th>
                    </tr>
                
                <tbody>

<?php

        if ($result->num_rows > 0){
        while($row = mysqli_fetch_array($result) ){
            ?>
            <tr>
                    <td> <?php echo $row['borrow_details_id']; ?> </td>
                    <td> <?php echo $row['book_id']; ?> </td>
                    <td> <?php echo $row['borrow_id']; ?> </td>
                    <td> <?php echo $row['borrow_status']; ?> </td>
                    <td> <?php echo $row['date_return']; ?> </td>
                    <td>
                                    <form action="updateborrowerdetail.php" method="post">
                                        <input type="hidden" name="borrow_details_id" value="<?php echo $row['borrow_details_id'] ?>">
                                        <input type="submit" name="edit" class="btn btn-success" value="EDIT">
                                    </form>
                    </td>
                    <td>
                    <form action="deleteborrowerdetails.php" method="post">
                                    <input type="hidden" name="borrow_details_id" value="<?php echo $row['borrow_details_id'] ?>">
                                    <input type="submit" name="delete" class="btn btn-danger" value="DELETE" onclick="if (!confirm('Are you sure?')) { return false }"> 
                    </td>                  
                    </form>
                                        
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