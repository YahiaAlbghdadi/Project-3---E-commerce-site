<?php
    
  require_once "../actions/connection.php";
    
  if(session_id() == '') {
    session_start();
  }
  if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
      header("location: login.php");
  }
  if(isset($_SESSON['user'])){
      header("locaton: landingPage.php");
    }
  if(!isset($_GET)){
    header("location: error.php");
  }
  
if($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = {$id}" ;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
       $email = $row['email'];
       $firstName= $row['firstName'];
       $lastName= $row['lastName'];
       $image = $row['image'];
       $addressId = $row['fkAddress'];
 } }
 
 require_once "../compos/adminNavbar.php";

 ?>
 
 <!DOCTYPE html>
 <html lang="en" >
 <head>
    <meta charset="UTF-8">
     <meta name="viewport"   content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
     <?php require_once '../compos/bootstrap.php' ?>
 </head>
 <body>
 <div class="container ">
 <div  class="<?= $class; ?>" role="alert" >
        <p><?= ($message) ?? ''; ?></p>           
 </div>
 <fieldset>
 <legend class='h2 mb-3' >Delete request <img class= 'img-thumbnail rounded-circle userImage'  src='../images/<?=$image?>' alt="<?= $firstName."". $lastName ?>"></legend >
 <h5>You have selected the data below: </h5>
 <table  class="table w-75 mt-3">
 <tr>
            <td>Name: <?="$firstName $lastName "?></td>
            <td>email: <?= $email?></td>
 
 </tr>
 </table>
 
 <h3 class="mb-4" >Do you really want to delete this User?</h3 >
 <form action="../actions/aUserDelete.php"  method="post">
   <input type="hidden" name ="id" value= "<?= $id ?>" />
   <input type="hidden" name ="addressId" value= "<?= $addressId ?>" />

   <input type= "hidden" name= "image" value= "<?= $image ?>" />
   <button class="btn btn-danger"  type="submit">Delete User! </button  >
   <a  href="dashboard.php" ><button  class="btn btn-warning"  type= "button">No, go back!</button></a>
 </form >
 </fieldset>
 </div>
 </body>
 </html >