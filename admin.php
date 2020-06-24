<?php
    // session_start();
    // if (!isset($_SESSION['login'])) {
    //     location("header", "adminlogin");
    // }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Add Font -->
     <link rel="stylesheet" href="CSS/main.css">
     <link rel="stylesheet" href="CSS/admin.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>
<body>
    <div class="page-container">
        <!--Include Header-->
        <?php include("includes/header.php"); ?>
        <?php
            // define variables and set to empty values
            require_once("sqlconfig.php");
            

            if (!isset($_SESSION['login'])){
                if (!($_SESSION['login'])){
                    header("Location: login.php");
                }
            }
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $password = password_hash(test_input($_POST["password"]), PASSWORD_DEFAULT);
                require_once("sqlconfig.php");
                //Create request for the books whose title contains the search term
                $UPDATE = 
                "UPDATE globals
                SET adminPassword = '" . $password . "'";
                $result = $conn->query($UPDATE);
            }


            //Remove extra characters to avoid SQL Injection
            function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }
        ?>
        
        <div class="page">
            <div class="tab-area">
                <ul class="tab-menu">
                    <li>All Ticket Orders</li>
                    <li>Not Paid</li>
                    <li>Pay at Door</li>
                </ul>
                <div class="tabs">
                    <div class="all">
                    </div>
                    <div class="nopay">
                    </div>
                    <div class="doorpay">
                    </div>
                    <table>
                        <?php
                            $SELECT = "SELECT * from ticketsales ORDER BY fname";
                            $result = $conn->query($SELECT);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()){
                                    if ($row["paid"] == 1) {
                                        $class = "green";
                                    }
                                    else if ($row["atDoorPickup"] == 1) {
                                        $class = "orange";
                                    }
                                    else {
                                        $class = "red";
                                    }
                                    echo("<tr><td><p class='" . $class . "'>●</p><td>" . $row["fname"] . "</td><td> " . $row["lname"] . "</td><td>" . $row["email"] . "</td><td>" . $row["ticketAmount"] . "</td></tr>");
                                }
                            } else {
                                echo "ERROR, Please Contact Admin";
                            }
                        ?>
                    </table>
                </div>
            </div>
            <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password">
            </form>
        </div>
    </div>
</body>
</html>

