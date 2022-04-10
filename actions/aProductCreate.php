<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    } 

    //    session_start();
    
    //    if(isset($_SESSION["user"])){
    //         header("Location: ../files/landingPage.php");
    //     }

    //     if(!isset($_SESSION["admin"]) && !isset($_SESSION["user"])){
    //         header("Location: ../files/login.php");
    //     } 
    require_once "connection.php";
    require_once "productFileUpload.php";

    if($_POST){
        $name = $_POST["name"];
        $brand = $_POST["brand"];
        $price = $_POST["price"];
        $qtty = $_POST["qtty"];
        $deliveryDate = $_POST["deliveryDate"];
        $image =productFileUpload($_FILES["image"]);
        $uploadError = "";
        

        // $ErrorMsg = "";

        $sql = "INSERT INTO products (name,  brand, price, deliveryDate, qtty, image) VALUES ('$name', '$brand', '$price', '$deliveryDate', '$qtty', '$image->fileName')";
        $result= $conn->query($sql);

        if($result){
            $class ="success";
            $message = "The entry below was successfully created <br>
                <p> $name <br> $brand <br>$price <br> <hr> $deliveryDate <br> <hr> $qtty </p> ";
            $uploadError = ($image->error !=0)? $image->ErrorMessage : '';
        }else{
            $class = "danger";
            $message = "error while creating record. Try again: <br>" . $conn->error;
            $uploadError = ($image->error !=0)? $image->ErrorMessage :'';
        } 
        $conn->close();
    }else{
        header("location: ../error.php");
    }
    ?>



<!DOCTYPE html>
<html lang= "en">
<head>
    <meta  charset="UTF-8">
    <title>create</title>
    <?php require_once '../compos/bootstrap.php' ?>
    <style><?php include "../styles/product.css"; ?></style>
</head>
<body>
    <div  class="container1">
        <div class="mt-3 mb-3 text-center">
            <h1>Create request response</h1>
        </div>
        <div class="alert alert-<?=$class;?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../files/landingPage.php'><button class="btn btn-primary"  type='button'>Home</button ></a>
        </div >
    </div>
</body>
</html>