<?php
      require_once "../actions/connection.php";

      //        if(!isset($_SESSION)) 
//         { 
//             session_start(); 
        
//        if( !isset($_SESSION['admin']) ) {

    //               header("Location:products.php ");
              
//              } elseif($_SESSION['user' ]){
//                  header('location : loadingPage.php');
//              }else{
//                  header('location :login.php');
//              }
// } 

$sql='SELECT * FROM products';
    $result=mysqli_query($conn,$sql);
    $layout ="";

    if(mysqli_num_rows($result) > 0){
    while($row= mysqli_fetch_assoc($result)){
      $layout .="<div class='con' style='width: 18rem;' >
     <img  src='../images/{$row["productImage"]}' class='card-img-top' height='300' >
      <div class='card-body'>
    <h4 class='card-title'>Model:{$row["name"]}</h4>
    <h4 class='card-title'>Brand:{$row["brand"]}</h4>
    <h4 class='card-title '>Quantity:<b class='text-primary'>{$row["qtty"]}</b> Pieces </h4>
    <h4 class='card-title'>Delivery:{$row["deliveryDate"]}</h4>
    <p class='card-text text-danger'>Price: {$row["price"]}€</p>
    <hr>
    <div class='mul-btn'>
        <button class='update'><a href='../files/productUpdate.php?id={$row["productId"]}'>Update</a></button>
        <button class='delete'><a href='../files/productDelete.php?id={$row["productId"]}'>Delete</a></button>
        <button class='deta'><a href='../files/productDetails.php?id={$row["productId"]}'>Details</a></button>
    </div>
</div>
</div>

";
}

}else{
$layout ="<h1 class='text-center fw-bold p-5'> No Results</h1>";
}

?>
​
​
​
​
<!DOCTYPE html>
<html lang="en">
​
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
​
    <!-- Start Style CSS  -->
​
    <link rel="stylesheet" href="../styles/product.css">
    <!-- End Style CSS  -->
​
    <!-- Start Bootstrap  -->
    <?php require_once '../compos/bootstrap.php';  ?>
    <!-- Start Bootstrap  -->
    <!-- Navbar Admin -->
    <?php require_once "../compos/adminNavbar.php"; ?>
    <title>My Products </title>
</head>
​
​
​
<body id="productsPage">
    <h1 class="ProTitle text-center mt-5 mb-3 container">
        Our Products</h1>
    <div class="row" id="bg">
        <?php echo $layout ?>
    </div>
​
    </script>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@1.28.0/dist/tsparticles.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@webcomponents/webcomponentsjs@2.5.0/custom-elements-es5-adapter.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@webcomponents/webcomponentsjs@2.5.0/webcomponents-loader.js">
    </script>
    <script type="module" src="https://cdn.jsdelivr.net/npm/web-particles@1.1.0/dist/web-particles.min.js">
    </script>
​
</body>
​
</html>