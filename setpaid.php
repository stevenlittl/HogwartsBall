
<?php
    // Toggle Paid Attribute
    // Called by jquery ajax function in the admin page. 
    session_start();
    
    //If user is not logged into send him to the login page
    if (!isset($_SESSION['login'])){
        if (!($_SESSION['login'])){
            header("Location: login.php");
        }
    }

    require_once("sqlconfig.php");

    // Check the request is valid.
    if (isset($_GET['paid']) && isset($_GET['id'])) {
        // Update the paid attribute
        $UPDATE = "
        UPDATE ticketsales
        SET paid = ". $_GET["paid"] ."
        WHERE ID = ". $_GET['id']."
        ";
        $result = $conn->query($UPDATE);
        // Get the result to validate success
        $SELECT = "
            SELECT paid, atDoorPickup from ticketsales
            WHERE ID = ". $_GET['id']
        ;
        $result = $conn->query($SELECT);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                // Return paid and atDoorPickup values for colour purposes.
                echo(implode(",",$row)); 
            }
        }
    }
?>

