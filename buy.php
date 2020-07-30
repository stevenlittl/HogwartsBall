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
            // Get form entries
            $fname = test_input($_POST["fname"]);
            $lname = test_input($_POST["lname"]);
            $streetName = test_input($_POST["address"]);
            $suburb = test_input($_POST["suburb"]);
            $city = test_input($_POST["city"]); 
            if (isset($_POST["door"])){
                $atDoorPickup = true;
            }
            else{
                $atDoorPickup = false;
            }
            $ticketAmount = test_input($_POST["ticketNumber"]);
            $email = test_input($_POST["email"]);

            // For Mail Plugin
            $message = 
            "<div style='width: 100%; height: 50px; background-color: purple;'>
            </div>Thanks for purchasing tickets to the Hogwarts Ball <br> You purchased " . $ticketAmount . " tickets. <br> Please pay bank account 4456-2344-2342-2343 or Send Cash via Owl";
            $emailTo = test_input($_POST["email"]);
        
            $INSERT = "INSERT Into ticketsales (fname, lname, streetName, suburb, city, atDoorPickup, ticketAmount, email) values(?, ?, ?, ?, ?, ?, ?, ?)";
            //Prepare statement
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssssbis", $fname, $lname, $streetName, $suburb, $city, $atDoorPickup, $ticketAmount, $email);
            $stmt->execute();
            $stmt->close();
        }

        //Function to remove special charcters to santize db inputs.
        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
        
    ?>
    <!-- Ticket Information Entry -->
    <div class="main">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
            <br>
            <div class="form-grid">
                <div class="column">
                    <label for="fname">First Name</label>
                    <input required class="form-control" type="text" id="fname" name="fname">
                </div>
                <div class="column">
                    <label for="lname">Last Name</label>
                    <input required class="form-control" type="text" id="lname" name="lname">
                </div>
            </div>
            <label for="author">Email</label>
            <input required class="form-control" type="email" id="email" name="email">
            <label for="address">Address</label>
            <input required class="form-control" type="text" id="address" name="address">
            <label for="street">City</label>
            <input required class="form-control" type="text" id="city" name="city">
            <label for="suburb">Suburb</label>
            <input required class="form-control" type="text" id="suburb" name="suburb">
            <br>
            <label for="name">No. of Tickets</label>
            <input value="1" min="1" max="30" name="ticketNumber" type="number">
            <br>
            <label for="door">
                <input id="door" name="door" type="checkbox">
                I would like to collect my ticket from the door.
            </label>
            <input type="submit" name="submit" class="btn" style="background-color: purple; color: white" value="Submit"> 
            
            <?php
                //Check if the sql connection went successful
                if (mysqli_errno($conn) == 0 && $isEntered){
                    // Run Mail Script
                    include("mail.php");
                    if ($mailsuccess != true){
                        //If there was a problem with the mail alert the user
                        echo("<script>alert('There was a problem you have entered but there was a problem with the email')</script>");
                    }
                    header('Location: success.php');
                }
                else if ($isEntered){
                    echo("<script>alert('There was a problem please try again')</script>");
                    //Reload the page
                    echo("<script>window.location.reload(false)</script>");
                }
            ?> 
        </form>

        
    </div>
</body>
</html>




