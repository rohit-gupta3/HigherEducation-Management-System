<?php
// Connecting to the Database
    $servername = "localhost:8111";
    $username = "root";
    $password = '';
    $database = "iwp_project";

    $conn = mysqli_connect($servername, $username, $password, $database);
    // Die if connection was not successful
    if (!$conn){
        die("Sorry we failed to connect: ". mysqli_connect_error());
    }
    
?>