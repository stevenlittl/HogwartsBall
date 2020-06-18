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
            $fname = test_input($_POST["fname"]);
            $lname = test_input($_POST["lname"]);
            $streetName = test_input($_POST["address"]);
            $suburb = test_input($_POST["suburb"]);
            $city = test_input($_POST["city"]);
            $atDoorPickup = test_input($_POST["door"]);
            $ticketAmount = test_input($_POST["ticketNumber"]);
            $email = test_input($_POST["email"]);
        
            $INSERT = "INSERT Into ticketsales (fname, lname, streetName, suburb, city, atDoorPickup, ticketAmount, email) values(?, ?, ?, ?, ?, ?, ?, ?)";
            //prepare statement
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssssbis", $fname, $lname, $streetName, $suburb, $city, $atDoorPickup, $ticketAmount, $email);
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
            <label for="fname">First Name</label>
            <input required class="form-control" type="text" id="fname" name="fname">
            <label for="lname">Last Name</label>
            <input required class="form-control" type="text" id="lname" name="lname">
            <label for="author">Email</label>
            <input class="form-control" type="text" id="email" name="email">
            <label for="address">Address</label>
            <input class="form-control" type="text" id="address" name="address">
            <label for="street">City</label>
            <input class="form-control" type="text" id="city" name="city">
            <label for="suburb">Suburb</label>
            <input class="form-control" type="text" id="suburb" name="suburb">
            <br>
            <label for="name">No. of Tickets</label>
            <input name="ticketNumber" type="number">
            <br>
            <label for="door">
                <input id="door" name="door" type="checkbox">
                I would like to collect my ticket from the door.
            </label>
            <input type="submit" name="submit" class="btn" style="background-color: purple; color: white" value="Submit">  
        </form>
    </div>
</body>
</html>




