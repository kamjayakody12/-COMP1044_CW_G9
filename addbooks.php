<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">

    <script type="text/javascript">
    window.onload = function year() {
        //Reference the DropDownList.
        var year = document.getElementById("year");
 
        //Determine the Current Year.
        var currentYear = (new Date()).getFullYear();
 
        //Loop and add the Year values to DropDownList.
        for (var i = 1901; i <= currentYear; i++) {
            var option = document.createElement("OPTION");
            option.innerHTML = i;
            option.value = i;
            year.appendChild(option);
        }

};
</script>


    <title>ADD BOOKS</title>

</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-12">
                  
                    <h2> Add Book </h2>
                    <hr>
                    <form action="" method="post" >
                        <div class="form-group">
                            <label for="">Book ID </label>
                            <input type="number" name="book_id" class="form-control" placeholder="Enter Book ID" required min="1" max="9999999">
                        </div>
                        <div class="form-group">
                            <label for=""> Book Title </label>
                            <input type="text" name="book_title" class="form-control" placeholder="Enter Book Title" required maxlength="63">
                        </div>
                        <div class="form-group">
                            <label for=""> Category ID </label>
                            <select name="category_id" class="form-control" id="category_id" >
                                <option value="1">Periodical</option>
                                <option value="2">English</option>
                                <option value="3">Math</option>
                                <option value="4">Science</option>
                                <option value="5">Encyclopedia</option>
                                <option value="6">Filipiniana</option>
                                <option value="7">Newpaper</option>
                                <option value="8">General</option>
                                <option value="9">References</option>
                            </select>
        
                        </div>
                        <div class="form-group">
                            <label for=""> Author </label>
                            <input type="text" name="author" class="form-control" placeholder="Enter Author" required maxlength="31">
                        </div>
                        <div class="form-group">
                            <label for=""> Book Copies </label>
                            <input type="number" name="book_copies" class="form-control" placeholder="Enter Book Copies" required min="1" max="9999999">
                        </div>
                        <div class="form-group">
                            <label for=""> Book Publisher </label>
                            <input type="text" name="book_pub" class="form-control" placeholder="Enter Book Publisher" required maxlength="30">
                        </div>
                        <div class="form-group">
                            <label for="">Publisher Name </label>
                            <input type="text" name="publisher_name" class="form-control" placeholder="Enter Publisher Name" required maxlength="55">
                        </div>
                        <div class="form-group">
                            <label for=""> ISBN </label>
                            <input type="text" name="isbn" class="form-control" placeholder="Enter ISBN" required maxlength="17">
                        </div>
                        <div class="form-group">
                            <label for=""> Copyright Year </label><br>
                            <select name="copyright_year" class="form-control" id="year"></select>

                        </div>
                        <div class="form-group">
                            <label for=""> Status </label>

                            <select name="status" class="form-control" id="status" >
                                <option value="New">New</option>
                                <option value="Old">Old</option>
                                <option value="Damage">Damage</option>
                                <option value="Lost">Lost</option>
                                <option value="Archive">Archive</option>
                            </select>

                           
                        </div>

                        <button type="submit" name="insert" class="btn btn-primary"> Save Data </button>

                        <a href="searchbooks.php" class="btn btn-danger"> BACK </a>
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
            $book_id = $_POST['book_id'];
            $book_title = $_POST['book_title'];
            $category_id = $_POST['category_id'];
            $author = $_POST['author'];
            $book_copies = $_POST['book_copies'];
            $book_pub = $_POST['book_pub'];
            $publisher_name = $_POST['publisher_name'];
            $isbn = $_POST['isbn'];
            $copyright_year = $_POST['copyright_year'];
            $status = $_POST['status'];

            $sql = "SELECT * FROM books WHERE book_id= '$book_id'";
            $result = $conn->query($sql);

            if($result->num_rows == 1){
                echo '<script> alert("Book ID already exists"); </script>';
            }
            else {
                $sql = "INSERT INTO `books`(`book_id`, `book_title`, `category_id`, `author`, `book_copies`, `book_pub`, `publisher_name`, `isbn`, `copyright_year`, `date_receive`, `date_added`, `status`) VALUES ('$book_id','$book_title','$category_id','$author','$book_copies','$book_pub','$publisher_name','$isbn','$copyright_year','0000-00-00 00:00:00',NOW(),'$status')";
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