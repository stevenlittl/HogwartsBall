

<head>
    <!-- Set Website Title -->
    <title>Hogwarts Ball</title>
    <!-- Add header CSS folder -->
    <link rel="stylesheet" href="CSS/header.css">
</head>

<?php
    // If the webpage has specified that it wants the header clear.
    if(isset($isClear)){
        echo("<header class='clear'>");
    }
    else {
        echo("<header class='solid'>");
    }
?>
    <div>
        <img src="Assets/img/logo.png" alt="Logo">
        <h1>
            Hogwarts PTA    
        </h1>
    </div>
    <!-- Nav Bar -->
    <ul>
        <a href="index.php"><li>Home</li></a>
        <a href="buy.php"><li>Buy Tickets</li></a>
        <a href="contact.php"><li>Contact</li></a>
    </ul>
</header>
