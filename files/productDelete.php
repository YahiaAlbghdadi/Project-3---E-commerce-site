<?php
      require_once "../actions/connection.php";

      if(session_Id() == '') {
        session_start();
    }
    if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
        header("location: login.php");
    }
    if(isset($_SESSON['user'])){
        header("locaton: landingPage.php");
    }

      
if($_GET['productId']) {
      $productId = $_GET['productId'];
      $sql = "SELECT * FROM products WHERE productId = {$productId}" ;
      $result = mysqli_query($conn, $sql);
      $data = mysqli_fetch_assoc($result);
      if (mysqli_num_rows($result) == 1) {
            $name = $data['name'];
            $brand= $data['brand'];
            $price= $data['price'];
            $qtty= $data['qtty'];
            $productImage = $data['productImage'];
      }  else {
       header("location: error.php");
   }
   $conn->close();
} else {
   header( "location: error.php");
}  
      


      ?>
​
<!DOCTYPE html>
<html lang="en">
​
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete a Product</title>
​    <?php require_once "../compos/adminNavbar.php" ?>
    <!-- Style Start  -->
    <style>
    <?php include '../styles/productCrud.css'?>

    </style>
    <!-- End  Start  -->
​
    <!--Start  Bootstrap -->
    <?php require_once '../compos/bootstrap.php' ?>
    <!--End  Bootstrap -->
​
​
</head>
​
<body id="del">
​
    <div class="container">
        <div class="text-del">
            <h1> Do you really want to delete this <span class="text-danger fw-bold"><?php echo $name?></span> .</h1>
        </div>
​
        <div class='h2 text-center fw-bold m-3 p-3'>Delete request !<img class='d-flex w-40 center rounded-circle '
                src='../images/<?= $data["productImage"] ?>' alt="<?= $name."". $brand ?>"></div>
        <fieldset class="container w-50 center fd">
​
            <div>
                <h5 class="fw-bold">You have selected the data below: </h5>
​
                <table class="table w-75 mt-3">
                    <tr>
​
                        <td>The Name: <?=$name ?> </td>
                    </tr>
​
                    <tr>
                        <td>The Brand: <?= $brand?></td>
                    </tr>
​
                    <tr>
                        <td>price : <?= $price?></td>
                    </tr>
                    <tr>
                        <td>The Quantity : <?= $qtty?></td>
                    </tr>
​
​
                </table>
                <div class="formdel">
                    <form action="../actions/aProductDelete.php" method="post">
                        <input type="hidden" name="productId" value="<?= $productId ?>" />
                        <input type="hidden" name="image" value="<?= $image ?>" />
​
                </div>
            </div>
            <button class="btn btn-danger py-4" type="submit"> Yes ! delete this Product!
            </button>
            <a href="products.php" class="btn btn-info" type="button">No ! go back!</a>
            </form>
        </fieldset>
    </div>
</body>
​
​
</html>