<?php

    require_once "../actions/connection.php";
    if(session_id() == '') {
        session_start();
    }
    if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
        header("location: login.php");
    }
    if(isset($_SESSION['admin'])){
        header("location: dashboard.php");
    }
    $user = $_SESSION['user'];
    $sql="SELECT * from orders inner join products on orders.fkProduct = products.productId LEFT JOIN reviews on orders.orderId = reviews.fkOrder WHERE sent = 'yes' and fkUser = '$user'";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $print = "";
    foreach($rows as $row){
        $reviewCheckButton = "<a class='ordersHistoryLink ' href='review.php?orderId={$row['orderId']} '>Leave a review</a>";
        $rated = $row['rated'];
        if($rated == 'yes'){
            $reviewCheckButton = "You rated this Product as a {$row['rate']} stars Experience";
        }
        $print .="<div class='card' style='width: 17.85rem;'>
        <input type='hidden' name='id' id='productId' value='{$row['productId']}' />      
        <div class='product-grid'>
            <div class='product-image'>
                <a href='#' class='image'>
                    <img class='pic-1' src='../images/{$row['productImage']}' class='card-img-top' alt='...' height='350'>
                </a>
                
            </div>
        </div>
        <div class='card-body'>
            <h4 class='card-title'>{$row['name']}  {$row['brand']}</h4>
            <p class='card-text'>Ordered At: {$row['orderPlaceDate']} </p>
        </div>
        {$reviewCheckButton}
    </div>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reviews</title>    
    <?php require_once "../compos/bootstrap.php" ?>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/landingpage.css">

</head>
<body>
<?php  require_once "../compos/userNavbar.php"?>
    <div class="container text-white">
        <h1 class="ordersH1">
            Your Orders History
        </h1>
        <form  class="container parent row p-5 mb-2 row justify-content-center" id="foundProduct">
            <?=$print?>
        </form>
        <a href='review.php?productId= '></a>
        <a href=""></a>

    </div>
    
</body>
</html>
