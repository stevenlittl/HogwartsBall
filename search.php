<?php
    // define variables and set to empty values
    $q = $_REQUEST["q"];
    $options = json_decode($_REQUEST["o"], true);


    if (isset($options["author"])){
        $options["author"] = null;
        $options["author_fname"] = true;
        $options["author_lname"] = true;
    }

    $rating = $options["rating"];
    $options["rating"] = null;


    require_once("sqlconfig.php");


    //Create request for the books whose title contains the search term
    $SELECT = 
    "SELECT * FROM books WHERE rating > " . ($rating - 1);
    $hasTrue = false;
    foreach ($options as $options_name => $options_value) {
        if ($options_value) {
            if($hasTrue) {
                $SELECT .= " OR";
            }
            else {
                $SELECT .= " AND";
                $hasTrue = true;
            }
            $SELECT .= " " . $options_name . " LIKE '%$q%'";

        }
    }
    $result = $conn->query($SELECT);
    $conn->close();

    

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo("<div class='book'><div><b>" . $row["title"]. "</b><br>" . $row["author_fname"] . " " . $row["author_lname"]);
            $url_title = str_replace(" ", "+", $row["title"]);   
            $rating = $row["rating"];
            if ($rating > 0) { echo("<br>"); }
            while($rating > 0) {
                echo('<span class="fa fa-star checked"></span>');
                $rating--;
            }
            echo('</div><a target="_blank" href="https://www.amazon.com/s?k=' . $url_title . '&rh=n%3A283155&dc&qid=1590187438&rnid=2941120011&ref=sr_nr_n_7"><img class="amazon_img"src="Assets/img/amazon.png" height="30" alt="amazon"></a>');
            echo("</div>");
        }
    } else {
        echo "No results";
    }

    $result = "";


    //Remove extra characters to avoid SQL Injection
    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
?>