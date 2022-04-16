<?php

require_once "../actions/connection.php";

// if(session_id() == '') {
//     session_start();
// }

// if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
//     header("location: login.php");
// }
// if(isset($_SESSION['user'])){
//     header("location: login.php");
// }



$sql = "SELECT * FROM orders INNER JOIN products on orders.fkProduct = products.id INNER JOIN users on orders.fkUser = users.id ";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$print = "";

foreach($rows as $row){
    $print .= "";
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Queue</title>
    <?php  require_once "../compos/bootstrap.php"?>
    <link rel="stylesheet" href="../styles/style.css">

</head>
<body>
    <?php  require_once "../compos/adminNavbar.php"?>
    <div class="container ">
        <h1 class="ordersH1 ">
            Orders queue
        </h1>
        <div class="row ordersCardParent justify-content-center">
        <div class="ordersCard col col-lg-3 col-md-4 col-sm 6 col-12 ">
            <p>Product Name: product Name</p> 
            <button class="sendButton" type="submit">Send Product</button>
        </div>
        <div class="ordersCard col col-lg-3 col-md-4 col-sm 6 col-12 ">
            <p>Product Name: product Name</p> 
            <button class="sendButton" type="submit">Send Product</button>
        </div>
        <div class="ordersCard col col-lg-3 col-md-4 col-sm 6 col-12 ">
            <p>Product Name: product Name</p> 
            <button class="sendButton" type="submit">Send Product</button>
        </div>
        <div class="ordersCard col col-lg-3 col-md-4 col-sm 6 col-12 ">
            <p>Product Name: product Name</p> 
            <button class="sendButton" type="submit">Send Product</button>
        </div>
        <div class="ordersCard col col-lg-3 col-md-4 col-sm 6 col-12 ">
            <p>Product Name: product Name</p> 
            <button class="sendButton" type="submit">Send Product</button>
        </div>
        <div class="ordersCard col col-lg-3 col-md-4 col-sm 6 col-12 ">
            <p>Product Name: product Name</p> 
            <button class="sendButton" type="submit">Send Product</button>
        </div>
        </div>

    </div>
</body>
</html>