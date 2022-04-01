<?php
      require_once "../actions/connection.php";
      require_once "../compos/adminNavbar.php";
      

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
      <style><?php include "../styles/product.css"; ?></style>
      </head>
      <body>
      <div  class="<?= $class; ?>" role="alert" >
            <p><?= ($message) ?? ''; ?></p>           
      </div>
      <div class="abovtit">
            <h1>Do you really want to delete this User?</h1 >
     </div>
      
      <fieldset class="container w-50 center dlt">
      
            <legend class='h2 mb-3' >Delete request <img class= 'img-thumbnail w-75 center productImage '  src='../images/<?= $fetchedResult["image"] ?>' alt="<?= $name."". $brand ?>"></legend >
            <div>
               <h5>You have selected the data below: </h5>
            
                  <table  class="table w-75 mt-3">
                        <tr>
                              <td>Name: <?="$name "?><?= $brand?></td>
                              
                        </tr>
                  </table>  
                   <div class="formdel">
                              <!-- <h3 class="mb-4" >Do you really want to delete this User?</h3 > -->
                        <form action="../actions/aProductDelete.php"  method="post">
                              <input type="hidden" name ="id" value= "<?= $id ?>" />
                              <input type= "hidden" name= "image" value= "<?= $image ?>" />
                              <button class="butten2"  type="submit"> Yes, delete this Product! </button  >
                              <a  href="landingPage.php" ><button  class="butten3"  type= "button">No, go back!</button></a>
                        </form > 
                  </div>
            </div>
            
      </fieldset>  
      
      
            
      
      </body>
      </html >