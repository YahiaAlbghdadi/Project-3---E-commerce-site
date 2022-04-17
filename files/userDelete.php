<?php
    
  require_once "../actions/connection.php";
  require_once "../compos/adminNavbar.php";
    
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
    $fetchedResult = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
       $email = $fetchedResult['email'];
       $firstName= $fetchedResult['firstName'];
       $lastName= $fetchedResult['lastName'];
       $image = $fetchedResult['image'];
 } }
 
 
 ?>
 
 <!DOCTYPE html>
 <html lang="en" >
 <head>
    <meta charset="UTF-8">
     <meta name="viewport"   content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
     <?php require_once '../compos/boot.php' ?>
 </head>
 <body>
 <div  class="<?= $class; ?>" role="alert" >
        <p><?= ($message) ?? ''; ?></p>           
 </div>
 <fieldset>
 <legend class='h2 mb-3' >Delete request <img class= 'img-thumbnail rounded-circle'  src='../images/<?= $fetchedResult["image"] ?>' alt="<?= $firstName."". $lastName ?>"></legend >
 <h5>You have selected the data below: </h5>
 <table  class="table w-75 mt-3">
 <tr>
            <td>Name: <?="$lastName "?></td>
            <td>email: <?= $email?></td>
            <td>Location: <?= $location?></td>
 
 </tr>
 </table>
 
 <h3 class="mb-4" >Do you really want to delete this User?</h3 >
 <form action="../actions/aDelete.php"  method="post">
   <input type="hidden" name ="id" value= "<?= $id ?>" />
   <input type= "hidden" name= "image" value= "<?= $image ?>" />
   <button class="btn btn-danger"  type="submit"> Yes, delete this User! </button  >
   <a  href="dashboard.php" ><button  class="btn btn-warning"  type= "button">No, go back!</button></a>
 </form >
 </fieldset>
 </body>
 </html >