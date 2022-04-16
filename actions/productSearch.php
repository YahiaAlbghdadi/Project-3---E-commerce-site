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
      <input type='hidden' name='id' id='productId' value='{$row['id']}' />      
      <div class='product-grid'>
          <div class='product-image'>
              <a href='#' class='image'>
                  <img class='pic-1' src='../images/{$row['image']}' class='card-img-top' alt='...' height='350'>
              </a>
              <ul class='product-links'>
                <li><button id='cartButton' type='submit'><i class='fa fa-shopping-bag cartButton'></i> Add to cart</button></li>
                <li><button><a href='../files/productDetails.php?id={$row['id']}'><i class='fa fa-search'></i></a> Quick View </button></li>
                
              </ul>
          </div>
      </div>
      <div class='card-body'>
          <h4 class='card-title'>{$row['name']}  {$row['brand']}</h4>
          <p class='card-text'>Price: {$row['price']} €</p>
         
           
      </div>
  </div>
  ";
  } 
}else{
    $products =  $_GET["products"];
    $sql = "SELECT * From products WHERE name LIKE '$products%'";
    $result = $conn->query($sql);
    if($result->num_rows == 0){
        echo" <div class= 'nores'>
        No Results
        </div> ";
    }else {
        $rows = $result->fetch_all(MYSQLI_ASSOC);

    foreach($rows as $row){
      echo "<div class='card' style='width: 20rem;'>
      <form  method='POST'  >
      <input type='hidden' id='productId' name='id' value='{$row['id']}' />      
      <div class='product-grid'>
          <div class='product-image'>
              <a href='#' class='image'>
                  <img class='pic-1' src='../images/{$row['image']}' class='card-img-top' alt='...' height='350'>
              </a>
              <ul class='product-links'>
                <li><button id='cartButton' type='submit'><i class='fa fa-shopping-bag cartButton'></i> Add to cart</button></li>
                <li><button><a href='../files/productDetails.php?id={$row['id']}'><i class='fa fa-search'></i></a> Quick View </button></li>
                
              </ul>
          </div>
      </div>
      <div class='card-body'>
          <h4 class='card-title'>{$row['name']}  {$row['brand']}</h4>
          <p class='card-text'>Price: {$row['price']} €</p>
          
        </form>
      </div>
  </div>";

  }
  }
}
