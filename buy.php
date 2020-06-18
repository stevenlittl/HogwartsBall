<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Set Favicon -->
    <link rel="icon" href="Images/logo.png">
    <link rel="stylesheet" href="CSS/main.css">
    <!-- Add Bootstrap to Style Forms (can do myself but this is easier, "The Best Code is No Code") -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Add Font -->
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    
</head>
<body>

    <!--Include Header-->
    <?php include("includes/header.php"); ?>
    <?php
        // run sql setup
        require_once("sqlconfig.php");
        
        // define variables and set to empty values
        $name = $author_fname = $author_lname = $genre = $review = "";
        $rating = 0;
        

        //When form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // get form entries
            $name = test_input($_POST["name"]);
            $author= test_input($_POST["author"]);
            $spaceIndex = strpos($author, " ");
            $author_fname = substr($author, 0, $spaceIndex);
            $author_lname = substr($author, $spaceIndex, strlen($author) - 1);
            $genre = test_input($_POST ["genre"]);
            $review = test_input($_POST ["review"]);
            $rating = test_input($_POST ["rating"]);

            $INSERT = "INSERT Into books (title, author_fname, author_lname, genre, rating, review) values(?, ?, ?, ?, ?, ?)";
            //prepare statement
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssssis", $name, $author_fname, $author_lname, $genre, $rating, $review);
            $stmt->execute();
            $stmt->close();
        }

        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
        
    ?>
    <!-- New Item Entry -->
    <div class="main">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
            <br>
            <label for="name">Name</label>
            <input required class="form-control" type="text" id="name" name="name">
            <label for="author">Email</label>
            <input class="form-control" type="text" id="author" name="author">
            <label for="street">Street Name</label>
            <input class="form-control" type="text" id="genre" name="genre">
            <label for="street">City</label>
            <input class="form-control" type="text" id="genre" name="genre">
            <label for="suburb">Suburb</label>
            <input class="form-control" type="text" id="genre" name="genre">
            <br>
            <label for="name">No. of Tickets</label>
            <input name="ticketNumber" type="number">
            <br>
            <label for="door">
                <input id="door" type="checkbox">
                I would like to collect my ticket from the door.
            </label>
            <input type="submit" name="submit" class="btn" value="Add Book">  
        </form>
    </div>
</body>
</html>




