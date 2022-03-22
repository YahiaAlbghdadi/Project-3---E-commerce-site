<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// if (!isset($_SESSION['adm' ]) && !isset($_SESSION['user'])) {
//     header("Location: login.php" );
//      exit;
//  }
//  if ( isset($_SESSION["user"])) {
//     header("Location: landingPage.php");
//     exit;
//  }
 
    require_once "connection.php";
    require_once "userFileUpload.php";



    if($_POST){
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];        
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $password=hash("sha256",$pass);        
        $imageArray = userFileUpload($_FILES["image"]);
        $image = $imageArray->fileName;
        $telefonNumber = $_POST["telefonNumber"];
        $street = $_POST["street"];
        $houseNumber = $_POST["houseNumber"];
        $city = $_POST["city"];
        $stiege = $_POST["stiege"];
        $plz = $_POST["plz"];
        
        $uploadError  = "";
        $sql = "INSERT INTO addresses (city, street, plz, stiege, houseNumber) VALUES ('$city','$street','$plz','$stiege','$houseNumber')";
        $result1= $conn->query($sql);

        $sql2 = "INSERT INTO users (firstName, lastName, email, password, image, telefonNumber,fkAddress) VALUES ('$firstName','$lastName','$email','$password','$image','$telefonNumber', LAST_INSERT_ID())";
        $result2= $conn->query($sql2);
        
        if($result1 && $result2){
            $class = "success";
            $message = "The entry below was successfully created <br>
                 <table class='table w-50'><tr>
                 <td> $firstName $lastName </td>
                 <td> $email </td>
                 </tr></table><hr>";
            $uploadError = ($imageArray->error != 0)? $imageArray->ErrorMessage :'';
        } else {
            $class = "danger";
            $message = "Error while creating record. Try again: <br>" . $conn->error;
            $uploadError = ($imageArray->error !=0)? $imageArray->ErrorMessage :'';
        }

     } else {
        header("location: ../files/error.php");

     }

    
?>


<!DOCTYPE html>
<html lang= "en">
   <head>
       <meta  charset="UTF-8">
       <title>New User</title>
       <?php require_once '../compos/bootstrap.php' ?>
   </head>
   <body>
       <div  class="container">
           <div class="mt-3 mb-3" >
               <h1>Create request response</h1>
           </div>
            <div class="alert alert-<?=$class;?>" role="alert">
               <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../files/dashboard.php'><button class="btn btn-primary"  type='button'>Dashboard</button ></a>
           </div >
       </div>
   </body>
</html>

