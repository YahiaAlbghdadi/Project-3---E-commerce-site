<?php

require_once "../actions/connection.php";
// if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
//     header("location: login.php");
// }
    $user = 3;
    $sql="SELECT * from orders inner join products on orders.fkProduct = products.productId WHERE sent = 'yes' and fkUser = '$user'";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    $print = "";
    foreach($rows as $row){
        $print .="<div class='card' style='width: 17.85rem;'>
        <input type='hidden' name='id' id='productId' value='{$row['id']}' />      
        <div class='product-grid'>
            <div class='product-image'>
                <a href='#' class='image'>
                    <img class='pic-1' src='../images/{$row['productImage']}' class='card-img-top' alt='...' height='350'>
                </a>
            </div>
        </div>
        <div class='card-body'>
            <h4 class='card-title'>{$row['name']}  {$row['brand']}</h4>
            <p class='card-text'>Price: {$row['price']} €</p>
           
             
        </div>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <?php require_once "../compos/bootstrap.php" ?>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<?php  require_once "../compos/adminNavbar.php"?>
    <div class="container text-white">
        <h1 class="ordersH1">
            Your Orders History
        </h1>
        <form method="POST" class="row ordersCardParent justify-content-center">
            <?=$print?>
        </form>

    </div>
    
</body>
</html>
