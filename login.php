<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Set Website Title -->
    <title>BookFinder</title>
    <!-- Set Favicon -->
    <link rel="icon" href="Images/logo.png">
    <link rel="stylesheet" href="CSS/main.css">
    <!-- Add Bootstrap to Style Forms (can do myself but this is easier, "The Best Code is No Code") -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Add Font -->
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="JS/search.js"></script>
</head>
<?php include("includes/header.php"); ?>

<?php
    $error = "";
   include("sqlconfig.php");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myemail = mysqli_real_escape_string($conn,$_POST['email']);
      echo($myemail);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT userId FROM users WHERE userEmail = '$myemail' and userPassword= '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION["myusername"];
         $_SESSION['login_user'] = $myemail;
         header("location: list.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
      
   }
?>



<body>
    <div class="form-page">
        <div class="form">
            <div>
                Login
            </div>
            <div class="error">
                <?php
                    echo($error);
                ?>
            </div>
            <form action="" method="post">
                <input type="text" name="email" placeholder="Email" class="form-control">
                <input type="password" name="password" placeholder="Password" class="form-control">
                <button class="form-control">
                    Login
                </button>
            </form>
             
        </div>
    </div>
</body>
