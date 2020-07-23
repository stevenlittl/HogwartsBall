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


        
        if (isset($_SESSION['login'])){
            if ($_SESSION['login']){
                header("Location: admin.php");
            }
        }
    
        //When form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $password = $_POST["password"];
            $SELECT = "SELECT adminPassword from globals";
            $result = $conn->query($SELECT);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()){
                    $hash =  $row["adminPassword"];
                    echo('<script>alert("'. strlen($hash) . '")</script>');
                    if (password_verify($password, $hash)) {
                        $_SESSION["login"] = true;
                        header("Location: admin.php");
                    } else {
                        
                    }
                }
            } else {
                echo "ERROR, Please Contact Admin";
            }
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
            <label for="author">Password (hello)</label>
            <input required class="form-control" type="password" id="password" name="password"><br>
            <input type="submit" name="submit" class="btn" style="background-color: purple; color: white" value="Login"> 
        </form>

        
    </div>
</body>
</html>




