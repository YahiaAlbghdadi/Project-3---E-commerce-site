<?php
    require_once "../actions/connection.php"; 
    
    if(session_id() == '') {
        session_start();
    }
    // var_dump($_SESSION["shopping_cart"][0]["quantity"]);
    // exit;
    // if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
    //     header("location: login.php");
    // }
    
    $status="";
    $class = "";
    if($_SESSION['shopping_cart']!=""){
        $cart = $_SESSION["shopping_cart"];
        $_SESSION['addedIds'] = array();
        foreach($_SESSION["shopping_cart"] as $key => $value){
            array_push($_SESSION['addedIds'], $value["id"]);
        }
    }   
    
    $currentArray = "";
    // if($_POST){
     
    // //   var_dump($_SESSION["shopping_cart"]);
    // //   exit;
    // }
   
    if (isset($_POST['action']) && $_POST['action']=="remove"){
        // var_dump($_POST["action"]);
        // exit;
        $id = $_POST['id'];
        $currentArray = $cart[array_search("$id", array_column($cart, 'id'))];
        $index = $_POST["index"];
        array_splice($_SESSION["shopping_cart"],$index );
        header("Location: cart.php");
        // unset($currentArray);
        	
    }


    if (isset($_POST['action']) && $_POST['action']=="change"){
        // if($_SESSION["shopping_cart"]) == $_POST["index"]){
            $index = $_POST["index"];
            $qtty = $_POST["quantity"];
           $_SESSION["shopping_cart"][$index]["quantity"] = $qtty;
           
        // }
  	
}
if(isset($_POST['action']) && $_POST['action']=="checkout"){
        // $userId = $_SESSION['user'];
        $productsIds = $_SESSION['addedIds'];
        $currentDate = date('Y-m-d');
        
        // $sql = "INSERT INTO orders( orderPlaceDate, fkUser, fkProduct) VALUES ('$currentDate','$userId','$productsIds')";
        if($result = $conn->query($sql)){
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
    $total_price = 0;
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
$i = 0;	
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td>
<img src='../images/<?=$product["image"]; ?>' width="50" height="40" />
</td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='id' value="<?= $product["id"]; ?>" />
<input type='hidden' name='index' value="<?= $i; ?>" />

<input type='hidden' name='action' value="remove" />
<button type='submit' onclick="myAlert()" class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='id' value="<?= $product["id"]; ?>" />
<input type='hidden' name='index' value="<?= $i; ?>" />

<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onChange="this.form.submit()">
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
</select>
</form>
</td>
<td><?php echo "$".$product["price"]; ?></td>
<td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
$i++;
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
<tr>
    <td colspan="5" align="right">    
        <form method="post" action="" class="">
            <input type="hidden" name="action" value="checkout">
            <button id="checkoutBtn">checkout</button>
        </form>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="script.js"></script>
</body>
</html>