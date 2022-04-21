<?php
      
require_once "../actions/connection.php";
require_once "../actions/productFileUpload.php";

if (isset($_GET['id']) ) {
      $id = $_GET['id'];
      $sql = "SELECT * FROM products WHERE productId = {$id}";
      $result = $conn->query($sql);
      if ($result->num_rows == 1) {
       $data = $result->fetch_assoc();
       $name = $data["name"];
      $brand = $data["brand"];
      $price = $data["price"];
      $deliveryDate = $data["deliveryDate"];
      $qtty = $data["qtty"];
      $image =$data["productImage"];
}
}

?>

<!DOCTYPE html>
<html lang="en">
​
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Navbar  -->
    <?php require_once '../compos/adminNavbar.php'?>
    <!-- bootstrap  -->
    <?php require_once '../compos/bootstrap.php';  ?>
    <!-- Style start   -->
    <link rel="stylesheet" href="../styles/product.css">
​
    <title> Edit The Product</title>
</head>
​
<body id="update">
    <div class="container">
        <h1>I want Update : <?= $name ?></h1>
        <img class='img-up d-block w-75  rounded-circle ' src='../images/<?php echo $data["productImage"] ?>'
            alt="<?php echo $data["name"] ?>">
        <div>
            <form action="../actions/aProductUpdate.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <table class="table center ">
                        <tr>
                            <th>The Model </th>
                            <td><input class='form-control' type="text" value="<?php echo $name ?>"
                                    value="<?php echo $name ?>" name="name" placeholder="The Model" /></td>
                        </tr>
                        <tr>
                            <th>The Brand </th>
                            <td><input class='form-control' type="text" value="<?php echo $brand ?>" name="brand"
                                    placeholder="The Brand" /></td>
                        </tr>
                        <tr>
                            <th>Delivery Date </th>
                            <td><input class='form-control' type="text" value="<?php echo $deliveryDate ?>"
                                    name="deliveryDate" placeholder="Delivery Date" />
                            </td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td><input class='form-control' type="number" value="<?php echo $price ?>" name="price"
                                    placeholder="Price" /></td>
                        </tr>
                        <tr>
                            <th> The Quantity </th>
                            <td><input class='form-control' type="number" value="<?php echo $qtty ?>" name="qtty"
                                    placeholder="quantity " /></td>
                        </tr>
                        <tr>
                            <th>image</th>
                            <td><input class="form-control" type="file" name="productImage" /></td>
                        </tr>
                        <tr>
                            <input type="hidden" name="id" value="<?php echo $id ?>" />
                            <input type="hidden" name="productImage" value="<?php echo $data['productImage'] ?>" />
                    </table>
                </fieldset>
                <div class="btnSub m-1">
                    <button class="btn btn-success">Save</button>
                    <a href="products.php" type="button"> Go To Products</a>
                    <a href="landingPage.php"> Back To Home</a>
                </div>
            </form>
        </div>
    </div>
​
</body>
​
</html>