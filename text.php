<?php

$status="";
if (isset($_POST['id']) && $_POST['id']!=""){
$id = $_POST['id'];
$CartResult = mysqli_query($con,"SELECT * FROM `products` WHERE `id`='$id'");
$CartRow = mysqli_fetch_assoc($CartResult);
$id = $CartRow['id'];
$name = $CartRow['name'];
$price = $CartRow['price'];
$image = $CartRow['image'];
$brand = $CartRow['brand'];
$deliveryDate = $CartRow['deliveryDate'];


$cartArray = array(
	$id=>array(
    'id'=>$id,
	'name'=>$name,
	'price'=>$price,
    'image'=>$image,
    'brand'=>$brand,
    'deliveryDate'=>$deliveryDate,
	'quantity'=>1
	)
);

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($id,$array_keys)) {
	$status = "<div class='box' style='color:red;'>
	Product is already added to your cart!</div>";	
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylie.css">
</head>
<body>
<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php"><img src="cart-icon.png" /> Cart<span>
<?php echo $cart_count; ?></span></a>
</div>
<?php
}
?></body>
</html>