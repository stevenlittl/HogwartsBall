<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        location("header", "adminlogin");
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Add Font -->
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>
<body>
    <div class="page-container">
        <?php
            // define variables and set to empty values
            $name = "";
            require_once("sqlconfig.php");
            //Create Request for all the books
            $SELECT = "SELECT * FROM books";
            $result = $conn->query($SELECT);
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = test_input($_POST["name"]);
                require_once("sqlconfig.php");
                //Create request for the books whose title contains the search term
                $SELECT = 
                "SELECT * FROM books
                WHERE title LIKE '%$name%'";
                $result = $conn->query($SELECT);
            }


            //Remove extra characters to avoid SQL Injection
            function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }
        ?>
        <!--Include Header-->
        <?php include("includes/header.php"); ?>
        <div class="main">
        </div>
    </div>
</body>
</html>

