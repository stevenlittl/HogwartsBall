<?php
    session_start();
    
    if (!isset($_SESSION['login'])){
        if (!($_SESSION['login'])){
            header("Location: login.php");
        }
    }

    require_once("sqlconfig.php");
    $output;

    if (isset($_GET['paid']) && isset($_GET['id'])) {
        $UPDATE = "
        UPDATE ticketsales
        SET paid = ". $_GET["paid"] ."
        WHERE ID = ". $_GET['id']."
        ";
        $result = $conn->query($UPDATE);
        $SELECT = "
            SELECT paid, atDoorPickup from ticketsales
            WHERE ID = ". $_GET['id']
        ;
        $result = $conn->query($SELECT);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                echo(implode(",",$row)); 
            }
        }
         
    } else {
        
    }
?>

