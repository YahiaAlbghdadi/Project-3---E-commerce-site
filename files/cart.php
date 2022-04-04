<?php
    require_once "../actions/connection.php"; 
    
    if(session_id() == '') {
        session_start();
    }
    $cart = $_SESSION["shopping_cart"];
    if($_POST){
        $currentArray = $cart[array_search($_POST["id"],$cart)];
        $qtty = $currentArray['quantity'];
    }
    $status="";
    if (isset($_POST['action']) && $_POST['action']=="remove"){
        unset($cart[array_search($_POST["id"],$cart)]);
        $status = "<div class='box' style='color:red;'>
        Product is removed from your cart!</div>";    		
}


    if (isset($_POST['action']) && $_POST['action']=="change"){
        if($currentArray['id'] == $_POST["id"]){
            $qtty = $_POST["quantity"];
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
    <?php require_once "../compos/bootstrap.php" ?>

    <link rel="stylesheet" href="../styles/style.css">
    

</head>
<body>
    <?php require_once "../compos/userNavbar.php" ?>


    <div class="cart container">
<?php
if(isset($cart)){
    $total_price = 0;
?>	
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($cart as $product){
?>
<tr>
<td>
<img src='../images/<?=$product["image"]; ?>' width="50" height="40" />
</td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='id' value="<?php echo $product["id"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action='' >
<input type='hidden' name='id' value="<?php echo $product["id"]; ?>" />
<input type='hidden' name='action' value="change" />
<!-- Change the `data-field` of buttons and `name` of input field's for multiple plus minus buttons-->
<div class="input-group plus-minus-input">
  <div class="input-group-button">
    <button type="button" class="button hollow circle" data-quantity="minus" data-field="<?= $product['id']?>">
      <i type="submit" class="fa fa-minus" aria-hidden="true"></i>
    </button>
  </div>
  <input class="input-group-field" type="number" name="<?= $product['id']?>" value="<?= $product['quantity']?>">
  <div class="input-group-button">
    <button type="button" class="button hollow circle" data-quantity="plus" data-field="<?= $product['id']?>">
      <i class="fa fa-plus" aria-hidden="true"></i>
    </button>
  </div>
</div>
</form>
</td>
<td><?php echo "$".$product["price"]; ?></td>
<td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>

</div>