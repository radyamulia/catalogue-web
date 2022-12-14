<?php
    $servername = "localhost";
    $database = "catalogue_web";
    $username = "root";
    $password = "";

    // Create Connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check Connection
    if (!$conn) {
        die("Connection failed : ". mysqli_connect_error());
    }    
?>
