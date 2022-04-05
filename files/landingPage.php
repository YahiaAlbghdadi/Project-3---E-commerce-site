<?php
      require_once "../actions/connection.php";
      require_once "../actions/productSearch.php";
      if(session_id() == '') {
        session_start();
    }
    // $_SESSION["shopping_cart"]
    //  if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
    //         header("Location:login.php");
    //         exit;
    //        } 
    
    // session_unset();

$status="";
if (isset($_POST['id']) && $_POST['id']!=""){
$id = $_POST['id'];
$cartResult = mysqli_query($conn,"SELECT * FROM products WHERE id='$id'");
$cartRow = mysqli_fetch_assoc($cartResult);
$name = $cartRow['name'];
$price = $cartRow['price'];
$image = $cartRow['image'];
$brand = $cartRow['brand'];
$deliveryDate = $cartRow['deliveryDate'];


$cartArray = array(
	array(
    'id'=>$id,
	'name'=>$name,
	'price'=>$price,
    'image'=>$image,
    'brand'=>$brand,
    'deliveryDate'=>$deliveryDate,
	'quantity'=>1

));
// array_push(array("id"=>));
if(empty($_SESSION["shopping_cart"])) {
    
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $addedIds = array();
    foreach($_SESSION["shopping_cart"] as $key => $value){
        array_push($addedIds, $value["id"]);
    }
    
    // var_dump($addedIds);
    // exit;
    if(in_array($id,$addedIds)) {
        echo "TEST";
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
mysqli_close($conn)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    
    <?php require_once "../compos/bootstrap.php" ?>
    <link rel="stylesheet" href="../styles/landingpage.css">
    <?php require_once "../compos/userNavbar.php";?>
    <title>Home Page</title>
</head>
<body>




    <div  class="parent row p-5 mb-2  " id="foundUser">
        <?=$products?>
    </div>

<script>
function loadDoc() {
let xhttp = new XMLHttpRequest();
xhttp.onload = function() {
    if (this.status == 200 ) {
    document.getElementById("foundUser").innerHTML =this.responseText;

    }
};
var products =document.getElementById("products").value;
xhttp.open("GET", '../actions/productSearch.php?products='+products , true); //(method, URL, async)
xhttp.send();
}

loadDoc();

document.getElementById("products").addEventListener("keyup",loadDoc);
</script> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 
<!-- <script src="https://cdn.jsdelivr.net/npm/tsparticles@1.28.0/dist/tsparticles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@webcomponents/webcomponentsjs@2.5.0/custom-elements-es5-adapter.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@webcomponents/webcomponentsjs@2.5.0/webcomponents-loader.js"></script>
<script type="module" src="https://cdn.jsdelivr.net/npm/web-particles@1.1.0/dist/web-particles.min.js"></script> -->
</body>
</html>
