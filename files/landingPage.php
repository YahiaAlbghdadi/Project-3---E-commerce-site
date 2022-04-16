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
if(empty($_SESSION["shopping_cart"])) {
    
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $addedIds = array();
    foreach($_SESSION["shopping_cart"] as $key => $value){
        array_push($addedIds, $value["id"]);
    }
    
    if(in_array($id,$addedIds)) {
        echo '<script>';
        echo 'Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Product is already added to your cart!",
            showConfirmButton: false,
            timer: 1500
        })';
        echo '</script>';
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
$_SESSION['shopping_cart'] == $_SESSION['shopping_cart'];
mysqli_close($conn)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <?php require_once "../compos/bootstrap.php" ?>
    <?php require_once "../compos/userNavbar.php" ?>
    <link rel="stylesheet" href="../styles/landingpage.css">
    <title>Home Page</title>

</head>


<body>




    <div class='parent row p-5 mb-2  ' id="foundProduct">
        <?=$products?>
    </div>
    
<script>
function loadDoc() {
let xhttp = new XMLHttpRequest();
xhttp.onload = function() {
    if (this.status == 200 ) {
    document.getElementById("foundProduct").innerHTML =this.responseText;

    }
};
var products =document.getElementById("products").value;
xhttp.open("GET", '../actions/productSearch.php?products='+products , true); //(method, URL, async)
xhttp.send();
}

loadDoc();

document.getElementById("products").addEventListener("keyup",loadDoc);
  
</script> 
<?php require_once "../compos/footer.php" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
