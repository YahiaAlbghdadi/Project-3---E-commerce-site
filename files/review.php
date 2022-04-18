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

    $orderNumber = "";
    if($_GET){
        $orderNumber = $_GET['orderId'];
        $SelectSql="SELECT * from orders inner join products on orders.fkProduct = products.productId WHERE orderId = '$orderNumber'";
        $result = $conn->query($SelectSql);
        $row = $result->fetch_assoc();
        $rated = $row['rated'];
        if($rated == "yes"){
          header("location:ordersHistory.php");
        }
        $productName = $row['name'];
        $brand = $row['brand'];
        $image = $row['productImage'];
        
    }
    if($_POST){
        $message = $_POST['message'];
        
        $reviewDate = date('Y-m-d');
        $costumerRate = $_POST['rate'];
        $insertSql = "INSERT INTO reviews(message, reviewDate, rate, fkOrder) VALUES ('$message','$reviewDate','$costumerRate','$orderNumber')";
        if($conn->query($insertSql)){
          $updateSql = "UPDATE orders SET rated='yes' WHERE orderId = '$orderNumber'";
          if($conn->query($updateSql)){
            echo "<div class='alert alert-success' role='alert'>
            <p>Your Rate was successfully sent</p>
             <a href='../files/landingPage.php'>Back to Home Page</a>
            </div >";exit;;
          }
        }
    }

mysqli_close($conn);
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
    <img class="reviewsImg" src="../images/<?=$image?>" alt="">
  <div class="pinfo">Product Info</div>
  

<div class="form-group">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa-solid fa-mobile"></i></span>
    <input name="productName"  value="<?=$productName?>" type="text" class="form-control " placeholder="Product Name">
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
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
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