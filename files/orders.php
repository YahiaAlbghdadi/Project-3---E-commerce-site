<?php

require_once "../actions/connection.php";

if(session_id() == '') {
    session_start();
}

if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
    header("location: login.php");
}
if(isset($_SESSION['user'])){
    header("location: landingPage.php");
}

if($_POST){
    $id = $_POST['orderId'];
    $sentSql = "UPDATE orders SET sent = 'yes' WHERE orderId = '{$id}'";
    if($conn->query($sentSql)){
        echo "success";
    }else{
        echo "error";
    }
}


$sql = "SELECT * FROM orders INNER JOIN products on orders.fkProduct = products.productId INNER JOIN users on orders.fkUser = users.id WHERE sent = 'no'";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$print = "";

foreach($rows as $row){
    $addressSql = "SELECT * FROM addresses WHERE addressId = {$row['fkAddress']}";
    $result = $conn->query($addressSql);
    $addressRow = $result->fetch_assoc();
    $stiege = "";
    if($addressRow != ""){
        $stiege = $addressRow['stiege'] . "/";
    };
    $print .= "<div class='ordersCard text-center col col-lg-3 col-md-4 col-sm 6 col-12 '>
    <input type='hidden' name='orderId' value='{$row['orderId']}'>
    <p class='ordersDate justify-content-end'>ordered at: {$row['orderPlaceDate']}</p>
    <hr class='ordersHr'> 
    <img class='ordersImg' src='../images/{$row['productImage']}' alt=''>
    <p class='ordersHeadings'>Product Name</p>
    <p>{$row['name']}</p>
    <p class='ordersHeadings'>Delivery Quantity </p>
    <p>{$row['orderedQtty']}</p>
    <p class='ordersHeadings'>Product Price</p>
    <p>{$row['orderPrice']}</p>

    <hr class='ordersHr'>
    <p class='ordersHeadings'>Costumer Name</p>
    <p>{$row['firstName']} {$row['lastName']}</p>
    <p class='ordersHeadings'>Costumer Address</p>
    <p>{$addressRow['street']}/$stiege{$addressRow['houseNumber']}, {$addressRow['plz']} {$addressRow['city']}</p>
    <hr class='ordersHr'> 
    <button class='sendButton justify-content-start' type='submit'>Send Product</button>
</div>";
    
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
    <div class="container text-white">
        <h1 class="ordersH1 ">
            Orders queue
        </h1>
        <form method="POST" class="row ordersCardParent justify-content-center">
            <?=$print?>
        </form>

    </div>
</body>
</html>