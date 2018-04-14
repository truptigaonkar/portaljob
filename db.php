<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "portaljob";

    //Creat connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connnection
    if($conn->connect_error){
        die("connection Failed: ". $conn->connect_error);
    } 
?>