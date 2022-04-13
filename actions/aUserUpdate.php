<?php
    require_once 'connection.php';
    require_once 'userFileUpload.php';
    // if(session_id() == '') {
    //     session_start();
    // }

    // if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
    //     header("location: login.php");
    // }
  
    if(!isset($_POST)){
        header("location: error.php");
      }
      
$class = 'd-none';
if (isset($_POST["submit" ])) {
    $id = $_POST['id'];
    if(isset($_SESSION['user'])){
        if($id != $_SESSION['user']){
          header("location: error.php");
        }
      }
  
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $imageArray = userFileUpload($_FILES['image']);
    $telefonNumber = $_POST['telefonNumber'];
    $rank = $_POST['rank'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $plz = $_POST['plz'];
    $stiege = $_POST['stiege'];  
    $houseNumber = $_POST['houseNumber'];
    $image = $imageArray->fileName;
    $uploadError = '';    

   if ($imageArray->error == 0) {      
       ($_POST["image"] == "avatar.png") ?: unlink("../images/$_POST[image]");
       $sql = "UPDATE users INNER JOIN addresses on (users.fkAddress = addresses.id) SET firstName = '$firstName', lastName = '$lastName',email = '$email', telefonNumber = '$telefonNumber', rank = '$rank', image = '$image', city = '$city', street = '$street', plz = '$plz', stiege = '$stiege', houseNumber = '$houseNumber' WHERE users.id = {$id} and users.fkAddress = addresses.id";
   } else {
       $sql = "UPDATE users INNER JOIN addresses on (users.fkAddress = addresses.id) SET firstName = '$firstName', lastName = '$lastName',email = '$email', telefonNumber = '$telefonNumber', rank = '$rank', city = '$city', street = '$street', plz = '$plz', stiege = '$stiege', houseNumber = '$houseNumber' WHERE users.id = {$id} and users.fkAddress = addresses.id";
   }
    if ($conn->query($sql)) {    
       $class = "alert alert-success";
       $message = "The record was successfully updated";
       $uploadError = ($imageArray->error != 0) ? $imageArray->ErrorMessage : '';
       header("refresh:3;url=../files/dashboard.php");
   } else {
       $class = "alert alert-danger";
       $message = "Error while updating record : <br>" . $conn->error;
       $uploadError = ($imageArray->error != 0) ? $imageArray->ErrorMessage : '';
   }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aUserUpdate</title>
    <?php require_once '../compos/bootstrap.php'?>
</head>
<body>
<div class ="container">
   <div class="<?=$class; ?>"  role="alert">
       <p><?=($message) ?? ''; ?></p>
        <p><?=($uploadError) ?? ''; ?></p>       
    </div>
</div>

</body>
</html>