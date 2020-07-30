

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Add Font -->
     <link rel="stylesheet" href="CSS/main.css">
     <link rel="stylesheet" href="CSS/admin.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <script src="JS/admin-tabs.js"></script>
</head>
<body>
    <div class="page-container">
        <!--Include Header-->
        <?php include("includes/header.php"); ?>
        <?php
            require_once("sqlconfig.php");
            
            if (!isset($_SESSION['login'])){
                if (!($_SESSION['login'])){
                    header("Location: login.php");
                }
            }
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $current_password = test_input($_POST["current_password"]);
                $SELECT = "SELECT adminPassword from globals";
                $result = $conn->query($SELECT);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()){
                        $hash =  $row["adminPassword"];
                        if (password_verify($current_password, $hash)) {
                            $new_password = $_POST["new_password"];
                            $current_password = $_POST["current_password"];
                            if ($new_password == $current_password) {
                                $password = password_hash($new_password, PASSWORD_DEFAULT);
                                require_once("sqlconfig.php");
                                $UPDATE = 
                                "UPDATE globals
                                SET adminPassword = '" . $password . "'";
                                $result = $conn->query($UPDATE);
                            }
                            else {
                                echo '<script>alert("New Passwords do not match")</script>';
                            }
                            
                        } else {
                            echo '<script>alert("Wrong Password. Please Try Again")</script>';
                        }
                    }
                } else {
                    echo "<script>alert('ERROR, Please Contact Admin')</script>";
                }
                
            }


            //Remove extra characters to avoid SQL Injection
            function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }
        ?>
        <div class="sidebar">
            <table class="legend">
                <tr>
                    <td class="red"></td>
                    <td>Not Paid</td>
                </tr>
                <tr>
                    <td class="green"></td>
                    <td>Paid</td>
                </tr>
                <tr>
                    <td class="orange"></td>
                    <td>Not Paid but opted for Door Collection</td>
                </tr>
            </table>
            <h3>Set New Password</h3>
            <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <table>
                    <tr>
                        <td>
                            <label for="current_password">Current Password</label>
                        </td>
                        <td>
                            <input type="password" name="current_password" id="current_password">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="new_password">New Password</label>     
                        </td>
                        <td>
                            <input type="password" name="new_password" id="new_password">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="confirm_password">Confirm Password</label>
                        </td>
                        <td>
                            <input type="password" name="confirm_password" id="confirm_password">
                        </td>
                    </tr>
                        <td>
                        <input type="submit" value="Change Password" class="button">
                        </td>
                </table>
            </form>
        </div> 
        <div class="page">
            <table class="statistics">
                <tr>
                <?php
                    function echo_row($result){
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()){
                                $checked = '';
                                if ($row["paid"] == 1) {
                                    $class = "green";
                                    $checked = 'checked';
                                }
                                else if ($row["atDoorPickup"] == 1) {
                                    $class = "orange";
                                }
                                else {
                                    $class = "red";
                                }
                                echo("<tr>
                                <td class='" . $class . "'></td>
                                <td>" . $row["fname"] . "</td>
                                <td> " . $row["lname"] . "</td>
                                <td>" . $row["email"] . "</td>
                                <td>" . $row["streetName"] . "<br>" . $row["suburb"] . "<br>" . $row["city"] ."</td>
                                <td>" . $row["ticketAmount"] . "</td>
                                <td><input class='" .$row["ID"].  "' type='checkbox' ". $checked . "></td>
                                </tr>");
                            }
                        } else {
                            echo "ERROR, Please Contact Admin";
                        }
                        
                    }
                    function echo_card($value, $title) {
                        $html = 
                        '<td>
                            <div>
                                <h2>' . $value . '</h2>
                                <p>' . $title . '</p> 
                            </div>
                        </td>';
                        echo $html;
                    }
                    $ticketNum = 0;
                    $paymentsMade = 0;
                    $ticketsPaid = 0;
                    $ticketsAtDoor = 0;
                    // Get all ticket orders
                    $ALL_SELECT = "SELECT * from ticketsales ORDER BY fname";

                    // Get tickets that haven't been paid for
                    $NO_PAY_SELECT = "SELECT * from ticketsales WHERE paid = false OR paid is NULL ORDER BY fname";

                    // Get the tickets that haven't been paid for and that the user has opted for door pickup.
                    $DOOR_PAY_SELECT = "SELECT * from ticketsales WHERE (paid = false OR paid is NULL) AND atDoorPickup = true ORDER BY fname";
                    $result = $conn->query($ALL_SELECT);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            $ticketNum += $row["ticketAmount"];
                            if ($row["paid"]){
                                $paymentsMade += 1;
                                $ticketsPaid += $row["ticketAmount"];
                            }
                            if ($row["atDoorPickup"]) {
                                $ticketsAtDoor += $row["ticketAmount"];
                            }
                        }
                    }
                    echo_card($ticketNum, "Tickets Ordered");
                    echo_card($paymentsMade, "Payments Made");
                    echo_card($ticketsPaid, "Tickets Paid");
                    echo_card($ticketsAtDoor, "Tickets to be collected at the door");
                    ?>
                    </tr>
                </table>

            <button class="button" onclick="reload()">Reload</button>
            <div class="tab-area">
                <ul class="tab-menu">
                    <li id="all" class="active" onclick="setactive('all')" >All Ticket Orders</li>
                    <li id="nopay" onclick="setactive('nopay')">Not Paid</li>
                    <li id="doorpay" onclick="setactive('doorpay')">Pay at Door</li>
                </ul>
                <div class="tabs">
                    <div class="all">
                        <table>
                            <?php
                                $result = $conn->query($ALL_SELECT);
                                echo_row($result)
                            ?>
                        </table>
                    </div>
                    <div class="nopay hidden">
                    <table>
                            <?php
                                
                                $result = $conn->query($NO_PAY_SELECT);
                                echo_row($result)
                            ?>
                        </table>
                    </div>
                    <div class="doorpay hidden">
                        <table>
                            <?php
                                $result = $conn->query($DOOR_PAY_SELECT);
                                echo_row($result)
                            ?>
                        </table>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>

