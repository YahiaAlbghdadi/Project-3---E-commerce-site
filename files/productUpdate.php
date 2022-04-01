<?php
      

require_once "../actions/connection.php";
require_once "../actions/productFileUpload.php";


if ($_GET) {
      $id = $_GET['id'];
      $sql = "SELECT * FROM products WHERE id = {$id}";
      $result = $conn->query($sql);
      $rows = $result->fetch_assoc();

      $name = $rows["name"];
      $brand = $rows["brand"];
      $price = $rows["price"];
      $deliveryDate = $rows["deliveryDate"];
      $qtty = $rows["qtty"];
      $image =$rows["image"];
         
}
?>


<!DOCTYPE html>
<html lang="en" >
   <head>
       <meta charset="UTF-8">
       
       <meta name="viewport" content ="width=device-width, initial-scale=1.0">
       <?php require_once '../compos/bootstrap.php'?>
       <?php require_once '../compos/adminNavbar.php'?>
       <style><?php include "../styles/product.css"; ?></style>
       <title> Product Update</title>
    
   </head>
   <body> 
        <div class="abovtit">
            <h1>Update <?= $name ?></h1>
        </div>
   
        <div class="container ">
            <img class='w-25 center img-thumbnail productImage'  src='../images/<?= $image ?>' alt="">
            <div >
                <!-- <h2>Update <?= $name ?></h2>        -->
                
                <form action="../actions/aProductUpdate.php" method="post" enctype="multipart/form-data">
                    
                    <table  class="table center w-100">
                        <tr>
                            <th> Name</th>
                            <td><input class="form-control"  type="text"  name ="name" placeholder = "name" value="<?=$name?>" /></td>
                        </tr>
                        <tr>
                            <th>brand</th>
                            <td><input class="form-control"  type="text"  name ="brand" placeholder = "Brand" value="<?=$brand?>" /></td>
                        </tr>

                        <tr>
                        <tr>
                            <th>Price</th>
                                <td><input class= "form-control " type ="text"  name="price"  placeholder= "price" value="<?=$price?>" /></td>
                        </tr>
                        <tr>
                            <th>Delivery Date </th>
                                <td><input class= "form-control" type ="text"  name="deliveryDate"  placeholder= "Delivery Date" value="<?=$deliveryDate?>" /></td>
                        </tr>

                        <tr>
                            <th>Quantity </th>
                                <td><input class= "form-control" type ="text"  name="qtty"  placeholder= "Quantity" value="<?=$qtty?>" /></td>
                        </tr>

                        <tr>
                        <th>Image</th>
                            <td><input  class= "form-control"  type ="file" name = "image" value="<?=$image?>" /></td>
                        </tr>
                    
                        <tr class="d-none">
                            <input type="hidden" name="id" value="<?=$id?>"/>
                            <input type="hidden" name="image" value="<?=$image?>"/>
                        </tr>
                        <tr>
                            <td>
                                <button   name = "submit"   class = "butten1" type = "submit"> Save Changes </button>
                            </td>
                            <td>
                                <a href = "landingPage.php"><button class = "butten3" type = "button"> Back </button></a>
                            </td>
                        </tr>
                    </table>
                    
                </form> 
            </div>   
        </div>

   </body>
</html>