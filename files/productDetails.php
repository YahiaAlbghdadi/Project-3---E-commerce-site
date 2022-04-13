<?php
   
    

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require_once "../actions/connection.php";
    

    if($_GET){
        $Id = $_GET['id'];
        $sql = "SELECT * FROM products where id = {$Id}";
        $result = $conn->query($sql);
        $rows = $result->fetch_assoc();

        $name = $rows["name"];
        $brand = $rows["brand"];        
        $price = $rows["price"];
        $image = $rows["image"];
        $deliveryDate = $rows["deliveryDate"];
        $qtty = $rows["qtty"];
    }
    
?>

<!DOCTYPE html>
<html lang="en" >
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content ="width=device-width, initial-scale=1.0">
        <title>Product Detail</title>
        <?php require_once '../compos/bootstrap.php'?>
        <?php require_once "../compos/adminNavbar.php";?>
        <style><?php include "../styles/product.css" ?></style>
       
   </head>
   <body>
   <div class="abovtit">
      <h1>Detail <?= $name ?> <?= $brand ?></h1> 
     </div>
   <div class="container">
        
        <img class='w-25  img-thumbnail productImage '   src='../images/<?= $rows['image'] ?>' alt="">
        

        <table class="center w-50" >

            <tr>
                <th>Name</th>
                <td><input readonly  class="form-control"  type="text"  name ="name" placeholder = "<?=$name?>" /></td>
            </tr>
            <tr>
                <th>Brand</th>
                <td><input readonly class="form-control"  type="text"  name ="brand" placeholder = "<?=$brand?>" /></td>
            </tr>

            <tr>
            <tr>
                <th>Price</th>
                <td><input readonly class= "form-control " type ="text"  name="price"  placeholder= "<?=$price?>" /></td>
            </tr>
            <tr>
                <th>Delivery Date</th>
                <td><input readonly class= "form-control" type ="text"  name="deliveryDate"  placeholder= "<?=$deliveryDate?>"  /></td>
            </tr>

        
            <tr>
                <td>
                    <a   href="productUpdate.php?id=<?=$Id?>"   class = "button1"   type = "button"> Edit Product </a>
                </td>
                <td>
                    <a href="landingPage.php"><button class = "button3" type = "button"> Back </button></a>
                </td>
            </tr>
        </table>
    </div>
   </body>
</html>