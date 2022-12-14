<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style-add.css">
    <title>Edit Product</title>
</head>

<body>
    <?php
        include_once("connect.php");
        $product_id = $_GET['product_id'];
        
        $arr_product = mysqli_query($conn, "SELECT product.*, image FROM product
                                            JOIN images ON product.product_id = images.product_id
                                            WHERE product.product_id='$product_id'
                                            ");

        while ($product_data = mysqli_fetch_array($arr_product)) {
            $product_name = $product_data['product_name'];
            $product_price = $product_data['product_price'];
            $product_material = $product_data['product_material'];
            $product_color = $product_data['product_color'];
            $product_size = $product_data['product_size'];
            $product_desc = $product_data['product_desc'];
            $img = $product_data['image'];
        }
    ?>
    <div class="content">
        <div class="title">
            <h1>Edit Product</h1>
            <div class="line"></div>
        </div> <br>

        <form method="POST" action="./edit.php?product_id=<?php echo $product_id;?>" enctype="multipart/form-data">
            <table>
                <tr><td><label for="name">Product Name</label></td></tr>
                <tr><td><input type="text" name="product_name" id="name" value="<?php echo $product_name?>"></td></tr>
                <tr><td><label for="price">Product Price</label></td></tr>
                <tr><td><input type="text" name="product_price" placeholder="Rp. xxx.xxx.xxx" id="price" value="<?php echo $product_price?>"></td></tr>
                <tr><td><label for="material">Product Material</label></td></tr>
                <tr><td><input type="text" name="product_material" id="material" value="<?php echo $product_material?>"></td></tr>
                <tr><td><label for="color">Product Color</label></td></tr>
                <tr><td><input type="text" name="product_color" id="color" value="<?php echo $product_color?>"></td></tr>
                <tr><td><label for="size">Product Size</label></td></tr>
                <tr><td><input type="text" name="product_size" id="size" value="<?php echo $product_size?>"></td></tr>
                <tr><td><label for="desc">Product Description</label></td></tr>
                <tr><td><input type="text" name="product_desc" id="desc" value="<?php echo $product_desc?>"></td></tr>
                <tr><td><label for="img">Image of the Product</label></td></tr>
                <tr><td><input type="file" name="image" id="img" accept="image/*"/> <span><?php echo $img?></span></td></tr>
                <tr><td><button type="submit" name="upload" class="btn-submit">Done</button></td></tr>
            </table>
        </form>
    </div>
</body>
</html>

<?php
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
        $folder = "./image/".$file;
        $oldfile = $_FILES["image"]["$img"];

        // Update table: product 
        $update1 = mysqli_query($conn, "UPDATE product SET product_name = '$product_name', product_price = '$product_price', product_material = '$product_material', product_color = '$product_color', product_size = '$product_size', product_desc = '$product_desc' WHERE product_id = '$product_id';");

        // Move uploaded file to folder: image
        if ($file!="")  {
            $update2 = mysqli_query($conn, "UPDATE images SET image = '$file' WHERE product_id = '$product_id';");
            move_uploaded_file($tempname, $folder);
            $msg = "Image updated successfully";
        }
        else {
            $file = $oldfile;
        }

        header("Location:prod.php?product_id=$product_id");
    }
?>