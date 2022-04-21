<?php 
  require_once "connection.php";
  require_once "productFileUpload.php";

  if($_POST){
  $name = $_POST["name"];
  $brand = $_POST["brand"];
  $price = $_POST["price"];
  $qtty = $_POST["qtty"];
  $deliveryDate	 = $_POST["deliveryDate"];
  $image =productFileUpload($_FILES["productImage"]);
  $uploadError = '';
   $ErrorMsg = '';

$sql = "INSERT INTO products (name, brand, price, deliveryDate , qtty, productImage) VALUES ('$name', '$brand', '$price',
  '$deliveryDate', '$qtty', '$image->fileName')";

if($conn->query($sql) === true ){
  $class ="success";
  $message = "<h5 class='text-center m-4 text-dark fw-bold '>The entry below was successfully created</h5> <br>
      <div class='container'>
          <h6 class='card-title'>Model :$name</h6>
          <h6 class='card-title'>Quantity :$qtty</h6>
          <h6 class='card-title'>Delivery Date: $deliveryDate</h6>
          <p class='card-text'>Price : $price €</p>
          <hr>
  </div>";
  $uploadError = ($image->error !=0)? $image->ErrorMessage : '';
  // header("refresh:3;url=../files/products.php");
  }else{
  $class = "danger";
  $message = "error while creating record. Try again: <br>" . $conn->error;
  $uploadError = ($image->error !=0)? $image->ErrorMessage :'';
  }
  $conn->close();
  }else{
  header("location: ../error.php");
  }
  ?>

<!DOCTYPE html>
  <html lang="en">
​
  <head>
      <meta charset="UTF-8">
      <title>create</title>
      <!-- Bootstrap -->
      <?php require_once '../compos/bootstrap.php' ?>
      <!-- style Start -->
      <link rel="stylesheet" href="../styles/product_style/product.css">
​
      <!-- Style End  -->
  </head>
​
  <body id="a-create">
      <div class="container">
          <div class="mt-3 mb-3">
              <h1>Created Request Response</h1>
          </div>
​
          <div class="alert alert-<?=$class;?>" role="alert">
              <p><?php echo ($message) ?? ''; ?></p>
              <p><?php echo ($uploadError) ?? ''; ?></p>
              <a href='../files/products.php' class="abtn btn-primary" type='button'>Home</a>
​
          </div>
      </div>
  </body>
​
  </html>