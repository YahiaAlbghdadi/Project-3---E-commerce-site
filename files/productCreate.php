<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

?>



<!DOCTYPE html>
<html lang="en" >
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content ="width=device-width, initial-scale=1.0">     
       <?php require_once '../compos/bootstrap.php'?>
       <?php require_once "../compos/adminNavbar.php"?>
       <style><?php include "../styles/product.css"; ?></style>
       <title>Create Product</title>
      
   </head>
   <body>
       <div class="abovtit">
           <h1>Mobile Stor</h1>
       </div>
        
       <fieldset>
           <legend class='h2'> Add new Product</legend>
           <form action="../actions/aProductCreate.php"  method= "post" enctype= "multipart/form-data">
               <table  class='table'>
                   <tr>
                       <th>Name</th>
                        <td><input  class ='form-control' type="text"  name="name"  placeholder ="Mobile Name" /></td>
                   </tr>

                   <tr>
                       <th>Brand</th>
                        <td><input  class ='form-control' type="text"  name="brand"  placeholder ="Enter Mobile brand" /></td>
                   </tr>

                   <tr>
                       <th>Price</th>
                        <td><input  class ='form-control' type="text"  name="price"  placeholder ="Enter Mobile price" /></td>
                   </tr>

                   <tr>
                       <th>Deleivery Date</th>
                        <td><input  class ='form-control' type="text"  name="deliveryDate"  placeholder ="Deleivery Date" /></td>
                   </tr>

                   <tr>
                       <th>Quantity</th>
                        <td><input  class ='form-control' type="text"  name="qtty"  placeholder ="Enter Quantity" /></td>
                   </tr>

                   <tr>
                       <th>Image</th >
                       <td><input class= 'form-control' type="file"  name="image" /></td>
                   </tr>

                  
                   <tr>
                       <td>
                           <button class ='button1' type= "submit">Insert</button>
                       </td>

                       <td>
                           <a href="landingPage.php" ><button class= 'button3' type= "button">Home</button></a>
                       <td>
                   </tr>
               </table>
           </form>
       </fieldset>
   </body>
</html>


