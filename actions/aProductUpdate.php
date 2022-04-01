<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'connection.php';
require_once 'productFileUpload.php';
// if (!isset($_SESSION['adm' ]) && !isset($_SESSION['user']) && !isset($_SESSION['superAdm'])) {
//     header("Location: login.php" );
//      exit;
//  }
//  if ( isset($_SESSION["user"])) {
//     header("Location: home.php");
//     exit;
//  }
  

$class = 'd-none';
if (isset($_POST["submit" ])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $deliveryDate = $_POST['deliveryDate'];
    $qtty = $_POST['qtty'];
    $imageArray = productFileUpload($_FILES['image']);
    $image = $imageArray->fileName;
    $uploadError = '';    

   if ($imageArray->error == 0) {      
       ($_POST["image"] == "product.png") ?: unlink("../images/$_POST[image]");
       $sql = "UPDATE products SET name = '$name', brand = '$brand',price = '$price', deliveryDate = '$deliveryDate', qtty = '$qtty',  image = '$image' WHERE products.id = {$id}";
   } else {
       $sql = "UPDATE products SET name ='$name', brand = '$brand',price = '$price', deliveryDate = '$deliveryDate', qtty = '$qtty'  WHERE products.id = {$id}";
   }
    if ($conn->query($sql)) {    
       $class = "alert alert-success";
       $message = "The record was successfully updated";
       $uploadError = ($imageArray->error != 0) ? $imageArray->ErrorMessage : '';
       header("refresh:3;url=../files/landingPage.php");
   } else {
       $class = "alert alert-danger";
       $message = "Error while updating record : <br>" . $conn->error;
       $uploadError = ($imageArray->error != 0) ? $imageArray->ErrorMessage : '';
   }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "../styles/product.css"; ?></style>
    <?php require_once '../compos/bootstrap.php'?>
    <title>aProductUpdate</title>
    
</head>
<body>
    <div class ="container">
    <div class="<?=$class; ?>"  role="alert">
        <p><?=($message) ?? ''; ?></p>
            <p><?=($uploadError) ?? ''; ?></p>       
        </div>
    </div>

</body>
</html>