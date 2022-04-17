<?php
      
      if(session_id() == '') {
        session_start();
    }
    if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
        header("location: login.php");
    }
    if(isset($_SESSON['user'])){
        header("locaton: landingPage.php");
    }
    require_once "../compos/adminNavbar.php";

?>
<!DOCTYPE html>
<html lang="en">
​
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Start  -->
    <?php include '../compos/bootstrap.php'?>
    <!-- Bootstrap End -->
    <!-- Style Page Start  -->
    <style>
    <?php include '../styles/productCrud.css'?>
    </style>
    <!-- Style Page End   -->
    <title> Add a new Product</title>
​
</head>
​
<body id="create">
    <fieldset>
        <legend> Add new Product</legend>
        <form action="../actions/aProductCreate.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>The Model </th>
                    <td><input class='form-control' type="text" name="name" placeholder="The Model" /></td>
​
                <tr>
                    <th>Phone Brand </th>
                    <td><input class='form-control' type="text" name="brand" placeholder="The Brand" /></td>
                </tr>
                <tr>
                    <th>Delivery Date </th>
                    <td><input class='form-control' type="Date" name="deliveryDate" placeholder="Delivery Date" /></td>
                </tr>
                <tr>
                    <th>The Price</th>
                    <td><input class='form-control' type="number" name="price" placeholder="Price" /></td>
                </tr>
                <tr>
                    <th> The Quantity </th>
                    <td><input class='form-control' type="number" name="qtty" placeholder="quantity " /></td>
                </tr>
                <tr>
                    <th>Upload Image</th>
                    <td><input class='form-control' type="file" name="productImage" /></td>
                </tr>
                <tr>
                    <td><button class='btn btn-success' type="submit">Insert Product</button></td>
                    <td><a class='btn btn-warning' href="products.php">Home</a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
​
</html>