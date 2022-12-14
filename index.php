<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style-index.css">
    <title>Tugas Web Catalog Sederhana (Tugas Besar)</title>
</head>

<body>
    <?php
    include_once("connect.php");
    $arr_product = mysqli_query($conn, "SELECT product.*, images.* FROM product
                                            JOIN images ON product.product_id = images.product_id");
    ?>
    <div class="sidebar">
        <div class="sidebar-title">
            <h1>Product Catalogue</h1>
        </div>
        <div class="line"></div>
        <br><br><br>
        <div class="content">
            <p>PRODUCT</p>
            <p>LIST</p> <br>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, qui dolorum sequi architecto a sapiente quaerat eveniet? Sapiente, adipisci. Deserunt neque
                facere dolorum eos obcaecati, maiores aliquid ut quas labore inventore, distinctio necessitatibus perspiciatis dignissimos totam? Ullam, quibusdam itaque?</p>
        </div> <br><br>
        <a href="./add.php"><button class="btn-add">Add Product</button></a>
    </div>
    <div class="cont-product">
    <?php
        while ($product = mysqli_fetch_array($arr_product)) {
            echo "
                <a href='./prod.php?product_id=".$product['product_id']."'>
                    <div class='product'>
                        <div class='product-img'>
                            <img src='./image/" . $product['image'] . "' alt=''>
                        </div>
                        <div class='cont-desc'>
                            <div class='prod-name'>
                                " . $product['product_name'] . "
                            </div>
                            <div class='desc'>
                                " . $product['product_desc'] . "
                            </div>
                        </div>
                    </div>
                </a>
            ";
        }
    ?>
    </div>
</body>

</html>