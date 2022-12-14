<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style-add.css">
    <title>Add Product</title>
</head>

<body>
    <div class="content">
        <div class="title">
            <h1>Add Product</h1>
            <div class="line"></div>
        </div> <br>

        <form method="POST" action="./add.php" enctype="multipart/form-data">
            <table>
                <tr><td><label for="name">Product Name</label></td></tr>
                <tr><td><input type="text" name="product_name" id="name"></td></tr>
                <tr><td><label for="price">Product Price</label></td></tr>
                <tr><td><input type="text" name="product_price" placeholder="Rp. xxx.xxx.xxx" id="price"></td></tr>
                <tr><td><label for="material">Product Material</label></td></tr>
                <tr><td><input type="text" name="product_material" id="material"></td></tr>
                <tr><td><label for="color">Product Color</label></td></tr>
                <tr><td><input type="text" name="product_color" id="color"></td></tr>
                <tr><td><label for="size">Product Size</label></td></tr>
                <tr><td><input type="text" name="product_size" id="size"></td></tr>
                <tr><td><label for="desc">Product Description</label></td></tr>
                <tr><td><input type="text" name="product_desc" id="desc"></td></tr>
                <tr><td><label for="img">Image of the Product</label></td></tr>
                <tr><td><input type="file" name="image" id="img" accept="image/*"/></td></tr>
                <tr><td><button type="submit" name="upload" class="btn-submit">Add</button></td></tr>
            </table>
        </form>
    </div>
</body>
</html>

<?php
    include_once("connect.php");

    // if submit button clicked
    if (isset($_POST['upload'])) {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_material = $_POST['product_material'];
        $product_color = $_POST['product_color'];
        $product_size = $_POST['product_size'];
        $product_desc = $_POST['product_desc'];

        $file = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];    
            $folder = "image/".$file;

        // Insert to table: product 
        $insert1 = mysqli_query($conn, "INSERT INTO `product` (product_name, product_price, product_material, product_color, product_size, product_desc) VALUES ('$product_name', '$product_price', '$product_material', '$product_color', '$product_size', '$product_desc')");

        // Insert image into table: image
        $insert2 = mysqli_query($conn, "INSERT INTO `images` (product_id, image) VALUES ((SELECT product_id FROM product WHERE product_name = '$product_name'), '$file')");

        // Move uploaded file to folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }
        else{
            $msg = "Failed to upload image";
        }


        header("Location:index.php");
    }
?>