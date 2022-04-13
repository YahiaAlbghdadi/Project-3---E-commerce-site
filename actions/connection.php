<?php
    
        // if(session_id() == '') {
    //     session_start();
    // }

    // if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
    //     header("location: login.php");
    // }
    // if(isset($_SESSION['user'])){
    //     header("location: login.php");
    // }


    $hostIP = "173.212.235.205";
    $userName = "yahia_projectE-commerce";
    $pw = "CodeFactory2022#";
    $dbName = "yahia_fullstackProject";

    $conn = new mysqli($hostIP,$userName,$pw,$dbName)
?>

   