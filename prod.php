<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style-prod.css">
    <title></title>
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
            $image = $product_data['image'];
        }
    ?>
    <div class="cont-head">
        <div class="head-title">
            <a href="./index.php">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg>
                </div>
            </a>
            <div class="title">
                <h1>Product Catalogue</h1>
            </div>
        </div>
        <div class="head-line"></div>
    </div>
    <div class="cont-content">
        <div class="c-leftside">
            <div class="img">
                <img src='./image/<?php echo $image;?>' alt="">
            </div>
            <div class="edit-delete">
                <a href="./edit.php?product_id=<?php echo $product_id;?>"><div class="edit">
                    EDIT PRODUCT
                </div></a>
                <a href="./delete.php?product_id=<?php echo $product_id;?>"><div class="delete">
                    DELETE PRODUCT
                </div></a>
            </div>
        </div>

        <div class="c-rightside">
            <div class="rightside-title">
                <p>PRODUCT</p>
                <p>DESCRIPTION</p>
            </div>
            <div class="desc">
                <?php
                    echo $product_desc;
                ?>
            </div>
            <table class="about">
                <tr>
                    <td>Product Name</td>
                    <td>:</td>
                    <td><?php echo $product_name;?></td>
                </tr>
                <tr>
                    <td>Product Price</td>
                    <td>:</td>
                    <td><?php echo $product_price;?></td>
                </tr>
                <tr>
                    <td>Product Material</td>
                    <td>:</td>
                    <td><?php echo $product_material;?></td>
                </tr>
                <tr>
                    <td>Product Color</td>
                    <td>:</td>
                    <td><?php echo $product_color;?></td>
                </tr>
                <tr>
                    <td>Product Size</td>
                    <td>:</td>
                    <td><?php echo $product_size;?></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>