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

    $status="";
    $class = "";
    $queryStatus = "";
    if($_SESSION['shopping_cart']!=""){
        $_SESSION['addedIds'] = array();
        foreach($_SESSION["shopping_cart"] as $key => $value){
            array_push($_SESSION['addedIds'], $value["id"]);
        }
        
    }   
    
   
    if (isset($_POST['action']) && $_POST['action']=="remove"){
        $index = $_POST["index"];
        unset($_SESSION["shopping_cart"][$index]);
        	
    }


    if (isset($_POST['action']) && $_POST['action']=="change"){
        $index = $_POST["index"];
        $qtty = $_POST["quantity"];
        $_SESSION["shopping_cart"][$index]["quantity"] = $qtty;  	
    }
    if(isset($_POST['action']) && $_POST['action']=="checkout"){
        $userId =  $_SESSION['user'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $currentDate = date('Y-m-d');
        
        foreach($_SESSION['addedIds'] as $productsIds){
            $sql = "INSERT INTO orders(orderPlaceDate, fkUser, fkProduct, orderPrice, orderedQtty) VALUES ('$currentDate',$userId,'$productsIds','$price','$quantity')";
            if($conn->query($sql)){
                $queryStatus = true;
            }
            ;
        } 
        if($queryStatus){
            unset($_SESSION['shopping_cart']);
            $status = "
            Your Order has been added to the orders Queue!
          ";
          $class = "success";
        }else{
            $status = "there is an Error in your SQL statement";
            $class = "danger";
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
    if(isset($_SESSION["shopping_cart"]) && count($_SESSION["shopping_cart"]) > 0){
        $totalPrice = 0;
        ;
?>	
<table class="table">
<tbody>
<div class="alert alert-<?=$class;?>" role="alert">
               <p><?php echo ($status) ?? ''; ?></p>
                
           </div >
           <tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php	
foreach ($_SESSION["shopping_cart"] as $key=>$product){
?>
<tr>
<td>
<img src='../images/<?=$product["productImage"]; ?>' width="50" height="40" />
</td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='id' value="<?= $product["id"]; ?>" />
<input type='hidden' name='index' value="<?= $key; ?>" />

<input type='hidden' name='action' value="remove" />
<button type='submit' onclick="myAlert()" class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='id' value="<?= $product["id"]; ?>" />
<input type='hidden' name='index' value="<?= $key; ?>" />

<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity text-center' onChange="this.form.submit()">
<option  
value="1" <?php if($product["quantity"]==1) echo "selected";?>>1</option>
<option 
value="2" <?php if($product["quantity"]==2) echo "selected";?>>2</option>
<option 
value="3" <?php if($product["quantity"]==3) echo "selected";?>>3</option>
<option 
 value="4" <?php if($product["quantity"]==4) echo "selected ";?>>4</option>
<option 
value="5" <?php if($product["quantity"]==5) echo "selected";?>>5</option>
<option 
value="6" <?php if($product["quantity"]==6) echo "selected";?>>6</option>
<option 
value="7" <?php if($product["quantity"]==7) echo "selected";?>>7</option>
<option 
value="8" <?php if($product["quantity"]==8) echo "selected";?>>8</option>
<option 
value="9" <?php if($product["quantity"]==9) echo "selected";?>>9</option>
<option 
value="10" <?php if($product["quantity"]==10) echo "selected";?>>10</option>
</select>
</form>

</td>
<td><?php echo "$".$product["price"]; ?></td>
<td><?php echo "$".intval($product["price"])*intval($product["quantity"]); ?></td>
</tr>
<?php
$totalPrice += intval($product["price"])*intval($product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$totalPrice; ?></strong>
</td>
</tr>
<tr>
    <td colspan="5" align="right">    
        <form method="post" action="" class="">
            <input type="hidden" name="action" value="checkout">
            <input type="hidden" name="quantity" value="<?=$product["quantity"]?>">
            <input type="hidden" name="price" value="<?=$product["price"]?>">
            <button id="checkoutBtn">checkout</button>
        </form>
    </td>
</tr>
</tbody>
</table>		
  <?php
}else{
	echo "<h3>Your cart is empty!</h3><br><h2>Show  <a href='ordersHistory.php'>your orders History</a></h2>";
	}

?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="script.js"></script>
</body>
</html>