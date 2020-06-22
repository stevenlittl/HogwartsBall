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
        $isEntered = false;
        

        //When form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $isEntered = true;
            // get form entries
            $fname = test_input($_POST["fname"]);
            $lname = test_input($_POST["lname"]);
            $email = test_input($_POST["email"]);
            $message = test_input($_POST["message"]);
            $emailFrom = $email;
            $subject = $fname . " " . $lname;
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
            <div class="form-grid">
                <label for="fname">First Name</label>
                <label for="lname">Last Name</label>
                <input required class="form-control" type="text" id="fname" name="fname">
                <input required class="form-control" type="text" id="lname" name="lname">
            </div>
            <label for="author">Email</label>
            <input required class="form-control" type="email" id="email" name="email">
            <label for="message">Message</label>
            <textarea name="message" class="form-control" id="message" cols="30" rows="10"></textarea>
            <br>
            <input type="submit" name="submit" class="btn" style="background-color: purple; color: white" value="Send"> 
            
            <?php
                if ($isEntered){
                    include("mail.php");
                    if ($success == true){
                        header('Location: contact-success.php');
                    }
                }
            ?> 
        </form>

        
    </div>
</body>
</html>




