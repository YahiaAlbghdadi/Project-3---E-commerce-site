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
<form method='post' action=''>
<input type='hidden' name='id' value="<?php echo $product["id"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onChange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?>
value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?>
value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?>
value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?>
value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?>
value="5">5</option>
</select>
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




    <!-- <div class="container">
        <div class="ordersParent ">
            <div class="sectionTop p-3  ">
                <h1>Your Orders</h1>
                <div class="cartPrice row offset-11 ">price</div>
                <hr>
            </div>
            <div class="sectionMiddle p-3 row">
                <img src="https://m.media-amazon.com/images/I/71birmzmmTL._AC_AA180_.jpg" alt="" class="col-lg-2 col-md-4 col-5">
                <div class="col-6">
                    <p>2 x Swirl H 41 MP Plus AirSpace Vacuum Cleaner Bags to Fit Fürstaubbeutel Microfleece</p>
                    <p>In stock</p>
                    <select placeholder="Qtty">
                        <option value="actual value 1">Qtty: 1</option>
                        <option value="actual value 2">Qtty: 2</option>
                        <option value="actual value 3">Qtty: 3</option>
                        <option value="actual value 3">Qtty: 4</option>
                        <option value="actual value 3">Qtty: 5</option>
                        <option value="actual value 3">Qtty: 6</option>
                        <option value="actual value 3">Qtty: 7</option>
                        <option value="actual value 3">Qtty: 8</option>
                        <option value="actual value 3">Qtty: 9</option>
                    </select>
                    
                </div>
                <div class="col-2">

                </div>
            </div>
            <div class="sectionBottom">
            <p class="offset-11 ">price</p>

            </div>
        </div>
    </div> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->

</body>
</html>