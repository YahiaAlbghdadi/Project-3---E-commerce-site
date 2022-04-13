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



$ordersSql = "SELECT * FROM orders";
$ordersResult = $conn->query($ordersSql);
$rows = $ordersResult->fetch_all(MYSQLI_ASSOC);
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
    <div class="container">
        <h1 class="ordersH1">
            Orders queue
        </h1>
        <form action="reviews.php" method="post">
            <input type="hidden" name="user" value="<?=$userId?>">
            <div class="">orders Details</div>
            <button type="submit"></button>
        </form>
        
    </div>
</body>
</html>