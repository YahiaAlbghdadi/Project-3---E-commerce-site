<?php
    require_once "../actions/connection.php";

    $order = "";
    if($_GET){
        $order = $_GET['orderId'];
        $SelectSql="SELECT * from orders inner join products on orders.fkProduct = products.productId WHERE orderId = '$order'";
        $result = $conn->query($SelectSql);
        $row = $result->fetch_assoc();
        $productName = $row['name'];
        $brand = $row['brand'];
    }
    if($_POST){
        $message = $_POST['message'];
        $reviewDate = date('Y-m-d');
        $rate = $_POST['rate'];
        
        $insertSql = "INSERT INTO reviews(message, reviewDate, rate, fkOrder) VALUES ('$message','$reviewDate',$rate,$order)";
        
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>

<h2 id="fh2">WE APPRECIATE YOUR REVIEW!</h2>
<h6 id="fh6">Your review will help us to improve our web hosting quality products, and customer services.</h6>


<form id="feedback" method="POST">
  <div class="pinfo">Product Info</div>
  

<div class="form-group">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-solid fa-mobile"></i></span>
    <input name="productName" value="<?=$productName?>" type="text" class="form-control" placeholder="Product Name">
     </div>
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-solid fa-building"></i></span>
  <input  name="brand" value="<?=$brand?>" placeholder="brand" class="form-control"  type="text">
    </div>
  </div>
</div>

 <div class="pinfo">Rate our overall services.</div>
  

<div class="form-group">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-heart"></i></span>
   <select name="rate" class="form-control" id="rate">
      <option value="1star">1</option>
      <option value="2stars">2</option>
      <option value="3stars">3</option>
      <option value="4stars">4</option>
      <option value="5stars">5</option>
    </select>
    </div>
  </div>
</div>

 <div class="pinfo">Write your feedback.</div>
  

<div class="form-group">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-solid fa-pen"></i></span>
  <textarea class="form-control" name="message" id="review" rows="3"></textarea>
 
    </div>
  </div>
</div>

 <button type="submit" class="btn btn-primary">Submit</button>


</form>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />



</body>
</html>