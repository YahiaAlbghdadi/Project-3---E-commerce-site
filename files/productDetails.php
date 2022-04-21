<?php
 if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require_once "../actions/connection.php";
    require_once "../compos/adminNavbar.php";

    if($_GET){
        $id = $_GET['id'];
        $sql = "SELECT * FROM products where productId = {$id}";
        $result = $conn->query($sql);
        $rows = $result->fetch_assoc();

        $name = $rows["name"];
        $brand = $rows["brand"];        
        $price = $rows["price"];
        $image = $rows["productImage"];
        $deliveryDate = $rows["deliveryDate"];
        $qtty = $rows["qtty"];
    }
?>

<!DOCTYPE html>
<html lang="en">
​
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- start Bootstrap  -->
    <?php require_once '../compos/bootstrap.php'?>
    <!-- Start Style  -->
    <link rel="stylesheet" href="../styles/product.css">
    <title>Product Detail</title>
</head>
​
<body class="bg-info">
    <div>
        <h1 class="text-center">The Description for <?= $name ?></h1>
    </div>
    <div id="con" class="container p-5 mt-5">
        <div class="center w-80">
            <img class='img-card d-block max-w-80  rounded-circle mb-5' src='../images/<?= $rows['productImage'] ?>'
                height='380' alt="">
            <form action="../actions/aProductUpdate.php" method="post" enctype="multipart/form-data">
        </div>
​
        <table class="center w-75">
​
            <tr>
                <th>The Model </th>
                <td><input readonly class="form-control" type="text" name="name" placeholder="<?=$name?>" /></td>
            </tr>
            <tr>
                <th> The Brand</th>
                <td><input readonly class="form-control" type="text" name="brand" placeholder="<?=$brand?>" />
                </td>
            </tr>
​
            <tr>
            <tr>
                <th>Price</th>
                <td><input readonly class="form-control " type="text" name="price" placeholder="<?=$price?>" /></td>
            </tr>
            <tr>
                <th>Delivery Date</th>
                <td><input readonly class="form-control" type="text" name="deliveryDate"
                        placeholder="<?=$deliveryDate?>" /></td>
            </tr>
​
        </table>
    </div>
    <div class="btnSub">
        <a href="productUpdate.php?id=<?=$id?>" class="btn btn-warning" type="button"> Edit</a>
​
        <a class="btn " type="button" href="products.php">Back </a>
    </div>
</body>
​
</html>