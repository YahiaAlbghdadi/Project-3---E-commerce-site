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
    require_once "fileUpload.php";



    if($_POST){
        $name = $_POST["name"];
        $location = $_POST["location"];
        $hobbies = $_POST["hobbies"];
        $age = $_POST["age"];
        $stage = $_POST["stage"];
        $imageA = fileUpload($_FILES["image"]);
        $image = $imageA->fileName;
        $description = $_POST["description"];

        $uploadError = "";

        $sql = "INSERT INTO users(name, location, hobbies, age, stage, image, description) VALUES ('$name','$location','$hobbies','$age','$stage','$image','$description')";
        
        if($conn->query($sql)){
            $class = "success";
            $message = "The entry below was successfully created <br>
                 <table class='table w-50'><tr>
                 <td> $name </td>
                 <td> $stage </td>
                 </tr></table><hr>";
            $uploadError = ($imageA->error != 0)? $imageA->ErrorMessage :'';
        } else {
            $class = "danger";
            $message = "Error while creating record. Try again: <br>" . $conn->error;
            $uploadError = ($imageA->error !=0)? $imageA->ErrorMessage :'';
        }

     } else {
        header("location: ../files/error.php");

     }

    
?>


<!DOCTYPE html>
<html lang= "en">
   <head>
       <meta  charset="UTF-8">
       <title>aCreate</title>
       <?php require_once '../compos/boot.php' ?>
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

