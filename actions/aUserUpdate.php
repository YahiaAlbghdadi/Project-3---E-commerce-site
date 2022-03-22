<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'connection.php';
require_once 'userFileUpload.php';
// if (!isset($_SESSION['adm' ]) && !isset($_SESSION['user']) && !isset($_SESSION['superAdm'])) {
//     header("Location: login.php" );
//      exit;
//  }
//  if ( isset($_SESSION["user"])) {
//     header("Location: home.php");
//     exit;
//  }
  

$class = 'd-none';
if (isset($_POST["submit" ])) {
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $imageArray = userFileUpload($_FILES['image']);
    $telefonNumber = $_POST['telefonNumber'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $plz = $_POST['plz'];
    $stiege = $_POST['stiege'];  
    $houseNumber = $_POST['houseNumber'];
    $image = $imageArray->fileName;
    $uploadError = '';    

   if ($imageArray->error == 0) {      
       ($_POST["image"] == "animal.png") ?: unlink("../images/$_POST[image]");
       $sql = "UPDATE animals SET name = '$name', location = '$location',stage = '$stage', hobbies = '$hobbies', description = '$description', age = '$age', image = '$image' WHERE id = {$id}";
   } else {
       $sql = "UPDATE animals SET name = '$name', location = '$location',stage = '$stage', hobbies = '$hobbies', description = '$description', age = '$age' WHERE id = {$id}";
   }
    if ($connection->query($sql)) {    
       $class = "alert alert-success";
       $message = "The record was successfully updated";
       $uploadError = ($imageArray->error != 0) ? $imageArray->ErrorMessage : '';
       header("refresh:3;url=../files/dashboard.php");
   } else {
       $class = "alert alert-danger";
       $message = "Error while updating record : <br>" . $connection->error;
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
    <title>aUpdate</title>
    <?php require_once '../compos/boot.php'?>
</head>
<body>
<div class ="container">
   <div class="<?php echo $class; ?>"  role="alert">
       <p><?php echo ($message) ?? ''; ?></p>
        <p><?php echo ($uploadError) ?? ''; ?></p>       
    </div>
</div>

</body>
</html>