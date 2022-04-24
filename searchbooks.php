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
                <div class="col-md-10">
                    <h2>SEARCH BOOKS</h2>
                </div>
                <div>
                <div class="col-md-2">
                    <a href="addbooks.php" class="btn btn-success" style="margin-left: 80%;"> ADD BOOK </a>    
                </div>
                </div>
                <div class="col-md-12">
                    <hr> 
                </div>
            </div>


<form action="" method="post">
Search <input type="text" class="form-control" name="search" placeholder="Enter Keyword"><br>

Filter By: <select name="column" class="form-control">
	<option value="book_title">Book Title</option>
	<option value="book_id">Book ID</option>
	<option value="author">Author</option>
    <option value="classname">Category</option>
    <option value="book_pub">Publisher</option>
    <option value="publisher_name">Publisher Name</option>
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

$sql = "SELECT books.book_id, books.book_title, category.classname, books.author,books.book_copies, books.book_pub, books.publisher_name, books.isbn, books.copyright_year, books.date_receive, books.date_added, books.status FROM books INNER JOIN category ON books.category_id = category.category_id WHERE $column like '%$search%'";

$result = $conn->query($sql);

?>
<div class="row">
        <div class="col-md-12">
        <div class="table-responsive">
            <table id="output">
                    <tr>
                        <th> ID </th>
                        <th> Book Title </th>
                        <th> Category</th>
                        <th> Author </th>
                        <th> Book Copies </th>
                        <th> Publisher </th>
                        <th> Publisher Name </th>
                        <th> ISBN </th>
                        <th> Copyright Year </th>
                        <th> Date Received </th>
                        <th> Date Added </th>
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
                    <td> <?php echo $row['book_id']; ?> </td>
                    <td> <?php echo $row['book_title']; ?> </td>
                    <td> <?php echo $row['classname']; ?> </td>
                    <td> <?php echo $row['author']; ?> </td>
                    <td> <?php echo $row['book_copies']; ?> </td>
                    <td> <?php echo $row['book_pub']; ?> </td>
                    <td> <?php echo $row['publisher_name']; ?> </td>
                    <td> <?php echo $row['isbn']; ?> </td>
                    <td> <?php echo $row['copyright_year']; ?> </td>
                    <td> <?php echo $row['date_receive']; ?> </td>
                    <td> <?php echo $row['date_added']; ?> </td>
                    <td> <?php echo $row['status']; ?> </td>
                    <td>
                                    <form action="updatebook.php" method="post">
                                        <input type="hidden" name="book_id" value="<?php echo $row['book_id'] ?>">
                                        <input type="submit" name="edit" class="btn btn-success" value="EDIT">
                                    </form>
                    </td>
                    <td>
                    <form action="deletebooks.php" method="post">
                                        <input type="hidden" name="book_id" value="<?php echo $row['book_id'] ?>">
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