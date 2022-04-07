<?php
require_once "connection.php";


// $database = new Database;
// $conn = $database->conn;

$sql = "SELECT * From products";

if(!$_GET){
    
    // $searchedpage= "";
   
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $products = "";
    foreach( $rows as $row){
      $products .= "<div class='card' style='width: 20rem;'>
      <form method='post' action=''>
      <input type='hidden' name='id' value='{$row['id']}' />      
      <div class='product-grid'>
          <div class='product-image'>
              <a href='#' class='image'>
                  <img class='pic-1' src='../images/{$row['image']}' class='card-img-top' alt='...' height='350'>
              </a>
              <ul class='product-links'>
                <li><button id='cartButton' type='submit'><i class='fa fa-shopping-bag'></i> Add to cart</button></li>
                <li><button><a href='#'><i class='fa fa-search'></i></a> Quick View </button></li>
                
              </ul>
          </div>
      </div>
      <div class='card-body'>
          <h4 class='card-title'>{$row['name']}  {$row['brand']}</h4>
          <p class='card-text'>Price: {$row['price']} €</p>
          <div class='multi-button'>
              <button><a class='updt' href='../files/productUpdate.php?id={$row['id']}'>EDITE</a></button>
              <button><a class='del' href='../files/productDelete.php?id={$row['id']}'>DELETE</a></button>
              <button><a class='tail' href='../files/productDetails.php?id={$row['id']}'>DETAILS</a></button>
          </div>
            </form>
      </div>
  </div>";
  } 
}else{
    $products =  $_GET["products"];
    $sql = "SELECT * From products WHERE name LIKE '$products%'";
    $result = $conn->query($sql);
    if($result->num_rows == 0){
        echo "No Results";
    }else {
        $rows = $result->fetch_all(MYSQLI_ASSOC);

    foreach($rows as $row){
      echo "<div class='card' style='width: 20rem;'>
      <form method='post' action=''>
      <input type='hidden' name='id' value='{$row['id']}' />      
      <div class='product-grid'>
          <div class='product-image'>
              <a href='#' class='image'>
                  <img class='pic-1' src='../images/{$row['image']}' class='card-img-top' alt='...' height='350'>
              </a>
              <ul class='product-links'>
                <li><button id='cartButton' type='submit'><i class='fa fa-shopping-bag'></i> Add to cart</button></li>
                <li><button><a href='#'><i class='fa fa-search'></i></a> Quick View </button></li>
                
              </ul>
          </div>
      </div>
      <div class='card-body'>
          <h4 class='card-title'>{$row['name']}  {$row['brand']}</h4>
          <p class='card-text'>Price: {$row['price']} €</p>
          <div class='multi-button'>
              <button class='updt'><a href='../files/productUpdate.php?id={$row['id']}'>EDITE</a></button>
              <button class='del'><a href='../files/productDelete.php?id={$row['id']}'>DELETE</a></button>
              <button class='tail'><a href='../files/productDetails.php?id={$row['id']}'>DETAILS</a></button>
          </div>
            </form>
      </div>
  </div>";

  }
  }
}
