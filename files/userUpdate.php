<?php

require_once "../actions/connection.php";
require_once "../actions/userFileUpload.php";

if(session_id() == '') {
    session_start();
}
// if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
//     header("location: login.php");
// }
// if(isset($_SESSON['user'])){
//     header("locaton: landingPage.php");
//   }
// if(!isset($_GET)){
//   header("location: error.php");
// }

if ($_GET) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users left join addresses on users.fkAddress = addresses.id WHERE users.id = {$id}";
    $result = $conn->query($sql);
    $rows = $result->fetch_assoc();
    $firstName = $rows['firstName'];
    $lastName = $rows['lastName'];
    $email = $rows['email'];
    $image = $rows['image'];
    $telefonNumber = $rows['telefonNumber'];
    $city = $rows['city'];
    $street = $rows['street'];
    $plz = $rows['plz'];
    $stiege = $rows['stiege'];  
    $houseNumber = $rows['houseNumber'];
    $image = $rows['image'];
    $rank = $rows['rank'];

     
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
<?php require_once "../compos/adminNavbar.php";?>

    <div class="container ">
        <div class="w-75 center">
            <h2>Update <?= $lastName ?></h2>       
            <img class='img-thumbnail userImage rounded-circle'  src='../images/<?= $image ?>' alt="">
            <form action="../actions/aUserUpdate.php" method="post" enctype="multipart/form-data">
        </div>
       <table  class="table center w-75">
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
                    <td><input  class= "form-control"  type ="file" name = "image" value="<?=$image?>" /></td>
                </tr>
                <tr>
                       <th>rank</th>
                        <td><select class="form-control" name="rank" id="">
                            <option value="<?=$rank?>"><?=$rank?></option>
                            <option value="admin">admin</option>
                        </select></td>
                </tr>
                <tr class="d-none">
                    <input type="hidden" name="id" value="<?=$id?>"/>
                    <input type="hidden" name="image" value="<?=$image?>"/>
                </tr>
                <tr>
                    <td>
                        <button   name = "submit"   class = "btn btn-success" type = "submit"> Save Changes </button>
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