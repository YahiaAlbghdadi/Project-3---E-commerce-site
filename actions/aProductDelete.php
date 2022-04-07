<?php 

require_once "../actions/connection.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// if (!isset($_SESSION['adm' ]) && !isset($_SESSION['user'])) {
//     header("Location: login.php" );
//      exit;
//  }
//  if ( isset($_SESSION["user"])) {
//     header("Location: landingPage.php");
//     exit;
//  }
 

$class = 'd-none';

if ($_POST) {
   $id = $_POST['id'];
   $image = $_POST['image'];
   ($image =="product.png")?: unlink("../images/$image");

  $sql = "DELETE FROM products WHERE id = {$id}";
  if ($conn->query($sql)) {
   $class = "alert alert-success" ;
   $message = "Successfully Deleted!";
   header("refresh:3;url=../files/landingPage.php");
} else {
   $class = "alert alert-danger";
   $message = "The entry was not deleted due to: <br>" . $conn->error;
}
}


?>


<!DOCTYPE html>
<html lang= "en">
   <head>
       <meta  charset="UTF-8">
       <title>aDeleteProduct</title>
       <?php require_once '../compos/bootstrap.php' ?> 
       <style><?php include "../styles/product.css"; ?></style>
   </head>
   <body>
       <div  class="container1">
           <div class="mt-3 mb-3" >
               <h1>Delete request response</h1>
           </div>
            <div class="alert alert-<?=$class;?>" role="alert">
               <p><?=$message;?></p >
               <a href ='../files/landingPage.php'><button class= "btn btn-success" type='button'>Home</button></a>
            </div>
       </div >
   </body>
</html>