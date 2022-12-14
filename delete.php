<?php
    include_once("connect.php");

    $product_id = $_GET['product_id'];

    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 0;"); 
    mysqli_query($conn, "DELETE FROM product WHERE product_id = '$product_id';");
    mysqli_query($conn, "DELETE FROM images WHERE product_id = '$product_id';");
    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 1;");

    header("Location:index.php");
?>