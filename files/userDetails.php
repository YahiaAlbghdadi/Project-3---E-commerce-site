<?php
    
    require_once "../actions/connection.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    

    if($_GET){
        $userId = $_GET['id'];
        $sql = "SELECT * FROM users LEFT JOIN addresses on users.fkAddress = addresses.id where users.id = {$userId}";
        $result = $conn->query($sql);
        $rows = $result->fetch_assoc();

        $firstName = $rows["firstName"];
        $lastName = $rows["lastName"];        
        $email = $rows["email"];
        $image = $rows["image"];
        $telefonNumber = $rows["telefonNumber"];
        $street = $rows["street"];
        $houseNumber = $rows["houseNumber"];
        $city = $rows["city"];
        $stiege = $rows["stiege"];
        $plz = $rows["plz"];
        $_SESSION["previousStiege"] = $stiege;
    }
    
?>

<!DOCTYPE html>
<html lang="en" >
   <head>
       <meta charset="UTF-8">
        <meta name="viewport" content ="width=device-width, initial-scale=1.0">
       <?php require_once '../compos/bootstrap.php'?>
       <title>User Detail</title>
   </head>
   <body>
   <?php require_once "../compos/adminNavbar.php";?>

   <div class="container  p-5">
   <div class="w-75 center">
            <h2>Update <?= $lastName ?></h2>       
            <img class='img-thumbnail userImage rounded-circle'  src='../images/<?= $rows['image'] ?>' alt="">
            <form action="../actions/aUserUpdate.php" method="post" enctype="multipart/form-data">
        </div>

           <table class="center w-75" >

               <tr>
                   <th>First Name</th>
                   <td><input readonly  class="form-control"  type="text"  name ="firstName" placeholder = "<?=$firstName?>" /></td>
               </tr>
               <tr>
                   <th>Last Name</th>
                   <td><input readonly class="form-control"  type="text"  name ="lastName" placeholder = "<?=$lastName?>" /></td>
               </tr>

               <tr>
               <tr>
                   <th>Email</th>
                    <td><input readonly class= "form-control " type ="text"  name="email"  placeholder= "<?=$email?>" /></td>
               </tr>
               <tr>
                   <th>Telefon Number</th>
                    <td><input readonly class= "form-control" type ="text"  name="telefonNumber"  placeholder= "<?=$telefonNumber?>"  /></td>
               </tr>
               <tr>
                   <th>Address</th>
                    <td class="">
                        <div class="d-flex">
                            <input readonly class= "form-control  street " type ="text"  name="plz"  placeholder= "<?=$plz?>"  />
                            
                            <input readonly class= "form-control plz  " type ="text"  name="houseNumber"  placeholder= "<?=$houseNumber?>"  />
                            <input readonly class= "form-control stiege  " type ="text"  name="stiege"  placeholder= "<?=$stiege?>"  />
                        </div>
                        <div class="d-flex ">
                            <input readonly class= "form-control w-50  " type ="text"  name="city"  placeholder= "<?=$city?>"  />
                            <input readonly class= "form-control stiege  " type ="text"  name="street"  placeholder= "<?=$street?>"  />
                        </div>
                    </td>
                    
               </tr>

               <tr>
                   <th>Image</th>
                    <td><input readonly  class= "form-control"  type ="file" placeholder="<?=$image?>"  name = "image"  /></td>
                </tr>
                <tr>
                    <td>
                        <a   href="userUpdate.php?id=<?=$userId?>"   class = "btn btn-success"   type = "button"> Edit User </a>
                    </td>
                    <td>
                        <a href="dashboard.php"><button class = "btn btn-warning" type = "button"> Back </button></a>
                    </td>
                </tr>
            </table>
    </div>
   </body>
</html>