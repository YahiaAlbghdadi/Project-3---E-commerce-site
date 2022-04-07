<?php
      require_once "../actions/connection.php";
      
      

if($_GET['id']) {

      $id = $_GET['id'];
      $sql = "SELECT * FROM products WHERE id = {$id}" ;
      $result = mysqli_query($conn, $sql);
      $fetchedResult = mysqli_fetch_assoc($result);
      if (mysqli_num_rows($result) == 1) {
            $name = $fetchedResult['name'];
            $brand= $fetchedResult['brand'];
            $price= $fetchedResult['price'];
            $image = $fetchedResult['image'];
      } }
      
      
      ?>
      
      <!DOCTYPE html>
      <html lang="en" >
      <head>
      <meta charset="UTF-8">
      <meta name="viewport"   content="width=device-width, initial-scale=1.0">
      <title>Delete Product</title>
      
      <?php require_once '../compos/bootstrap.php' ?>
      <?php require_once "../compos/adminNavbar.php"?>
      <style><?php include "../styles/product.css"; ?></style>
      </head>
      <body>
      <div  class="<?= $class; ?>" role="alert" >
            <p><?= ($message) ?? ''; ?></p>           
      </div>
      <div class="abovtit">
            <h1>Do you really want to delete this Product?</h1 > <hr>
            
     </div>
     
      
      <fieldset class="container w-75 center pdelete">
      
            <img class= 'img-thumbnail w-25 center productImage '  src='../images/<?= $fetchedResult["image"] ?>' alt="<?= $name."". $brand ?>">
            <div class="pdlt">
                  <div class="abovtitdlt">
                        <h1>Delete request</h1>  
                  </div>
                  <h5>You have selected the data below: </h5>
            
                  <table  class="table w-25 mt-3">
                        <tr>
                              <td>Name: <?="$name "?><?= $brand?></td>
                              
                        </tr>
                  </table>  
                        <div class="formdel">
                              <!-- <h3 class="mb-4" >Do you really want to delete this User?</h3 > -->
                        <form action="../actions/aProductDelete.php"  method="post">
                              <input type="hidden" name ="id" value= "<?= $id ?>" />
                              <input type= "hidden" name= "image" value= "<?= $image ?>" />
                              <button class="button2"  type="submit"> Yes, delete this Product! </button  >
                              <a  href="landingPage.php" ><button  class="button3"  type= "button">No, go back!</button></a>
                        </form > 
                  </div>
            </div>
            
      </fieldset>  
      
      
            
      
      </body>
      </html >