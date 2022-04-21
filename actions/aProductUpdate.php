<?php
require_once 'connection.php';
 require_once 'productFileUpload.php';

 if ($_POST) {
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $deliveryDate = $_POST['deliveryDate'];
    $qtty = $_POST['qtty'];  
    $id = $_POST['id']; 
    $uploadError = '';    
    $image = productFileUpload($_FILES['productImage']);
   if($image->error == 0) {      
       ($_POST["productImage"] == "product.png")?: unlink('../images/$_POST[productImage]');
       $sql = "UPDATE products SET name = '$name', brand = '$brand',
       price = '$price', deliveryDate = '$deliveryDate', qtty = '$qtty',  
       productImage='$image->fileName' WHERE productId = {$id}";
   } else {
       $sql = "UPDATE products SET name ='$name', brand = '$brand',
       price = '$price', deliveryDate = '$deliveryDate', 
       qtty = '$qtty'  WHERE productId = {$id}";
   }
    if($conn->query($sql)===true) {    
       $class = 'alert alert-success';
       $message = 'The record was successfully updated
       <th>Model :$name</th><br>
       <th>Quantity :$qtty</th><br>
       <th>Delivery Date: $deliveryDate</th><br>
       <th>Price : $price €</th><br>';
       $uploadError = ($image->error != 0) ? $image->ErrorMessage : '';
    header('refresh:3;url=../files/products.php');
   }else {
       $class = 'alert alert-danger';
       $message = 'Error while updating record : <br>' . $conn->error;
       $uploadError = ($image->error != 0) ? $image->ErrorMessage : '';
   }}

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <!-- Style Start -->
    <link rel="stylesheet" href="../styles/product_style/product.css">
    <!-- Style End -->

    <!-- Bootstrap Start -->
    <?php require_once '../compos/bootstrap.php'?>
    <!-- Bootstrap End  -->
    <title> Update Product </title>

</head>
​
<body id='update'>
    <div class='container'>
        <div class='<?=$class; ?>' role='alert'>
            <p><?=($message) ?? ''; ?></p>
            <p><?=($uploadError) ?? ''; ?></p>
        </div>
        <a class="btn btn-info" href="../files/products.php">Back To Home</a>
    </div>
​
</body>
​
</html>