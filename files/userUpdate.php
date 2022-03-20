<?php

require_once "../actions/connection.php";

if (isset($_GET[ 'id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = {$id}";
    $result = $connection->query($sql);
    if ($result->num_rows == 1) {
        $fetchedResult = $result->fetch_assoc();
        $firstName = $fetchedResult['firstName'];
        $lastName = $fetchedResult['lastName'];
        $email = $fetchedResult['email'];
        $telefonNumber = $fetchedResult['telefonNumber'];
        $city = $fetchedResult['city'];
        $street = $fetchedResult['street'];
        $plz = $fetchedResult['plz'];
        $stiege = $fetchedResult['stiege'];        $houseNumber = $fetchedResult['houseNumber'];
        $image = $fetchedResult['image'];

    }  
 }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta name="viewport"   content="width=device-width, initial-scale=1.0">
  <title>Update User</title>
  <?php require_once '../compos/bootstrap.php'?>
</head>
<body>
    <div class="container ">
       <h2>Update</h2>       
       <img class='img-thumbnail rounded-circle'  src='../images/<?= $fetchedResult['image'] ?>' alt="<?= $name ?>">
       <form action="../actions/aUpdate.php" method="post" enctype="multipart/form-data">
       <table  class="table">
               <tr>
                   <th>First Name</th>
                   <td><input class="form-control"  type="text"  name ="firstName" placeholder = "First Name"value="<?=$firstName?>" /></td>
               </tr>
               <tr>
                   <th>Last Name</th>
                   <td><input class="form-control"  type="text"  name ="lastName" placeholder = "Last Name"value="<?=$lastName?>" /></td>
               </tr>

               <tr>
               <tr>
                   <th>Email</th>
                    <td><input class= "form-control " type ="text"  name="email"  placeholder= "Email"value="<?=$email?>" /></td>
               </tr>
               <tr>
                   <th>Telefon Number</th>
                    <td><input class= "form-control" type ="text"  name="telefonNumber"  placeholder= "Telefon Number" value="<?=$telefonNumber?>" /></td>
               </tr>
               <tr>
                   <th>Address</th>
                    <td class="">
                        <div class="d-flex">
                            <input class= "form-control  street" type ="text"  name="street"  placeholder= "street" value="<?=$street?>" />
                            <input class= "form-control plz ms-4 " type ="text"  name="houseNumber"  placeholder= "HausNr" value="<?=$houseNumber?>" />
                            <input class= "form-control stiege ms-4 " type ="text"  name="stiege"  placeholder= "Stiege" value="<?=$stiege?>" />
                        </div>
                        <div class="d-flex mt-2">
                            <input class= "form-control w-50  " type ="text"  name="city"  placeholder= "Stadt" value="<?=$city?>" />
                            <input class= "form-control stiege ms-4 " type ="text"  name="plz"  placeholder= "plz" value="<?=$plz?>" />
                        </div>
                    </td>
                    
               </tr>

               <tr>
                   <th>Image</th>
                    <td><input  class= "form-control"  type ="file"   name = "image" value="<?=$image?>" /></td>
                </tr>
                <tr>
                    <td>
                        <button   name = "submit"   class = "btn btn-success"   type = "submit"> Save Changes </button>
                    </td>
                    <td>
                        <a href = "dashboard.php"><button class = "btn btn-warning" type = "button"> Back </button></a>
                    </td>
                </tr>
            </table>
        </form>    
</div>
</body>
</html>