<?php 
require_once "connection.php";
// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }
// if (!isset($_SESSION['adm' ]) && !isset($_SESSION['user'])) {
//     header("Location: login.php" );
//      exit;
//  }
//  if ( isset($_SESSION["user"])) {
//     header("Location: landingPage.php");
//     exit;
//  }

if ($_POST) {
   $id = $_POST['id'];
   $image = $_POST['image'];
   ($image =="product.png")?: unlink("../images/$image");

   $sql = "DELETE FROM products WHERE productId = {$id}";
  if ($conn->query($sql)===true) {
   $class = "alert alert-success" ;
   $message = "Successfully Deleted!";
//    header("refresh:3;url=../files/products.php");
} else {
   $class = "alert alert-danger";
   $message = "The entry was not deleted due to: <br>" . $conn->error;
}
}

?>
​
​
<!DOCTYPE html>
<html lang="en">
​
<head>
    <meta charset="UTF-8">
    <title>Delete Product</title>
    <!-- Style CSS  -->
    <link rel="stylesheet" href="../styles/product_style/product.css">
    <!-- bootstrap -->
    <?php require_once '../compos/bootstrap.php'; ?>
</head>
​
<body>
    <div class="container  p-5 mt-4">
        <div class="mt-3 mb-3">
            <h1 class="fw-bold taext-center text-danger ">Delete request response</h1>
        </div>
        <div class="<?=$class; ?>" role="alert">
            <p><?=($message) ?? ''; ?></p>
            <p><?=($uploadError) ?? ''; ?></p>
        </div>
    </div>
    <a href='../files/products.php'><button class="btn btn-success d-flex mt-5" type='button'> Home</button></a>
​
</body>
​
</html>