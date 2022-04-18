<?php
require_once "connection.php";


$sql = "SELECT * From products Where name ='Iphone'";

if(!$_GET){
    
    // $searchedpage= "";
   
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $products = "";
    foreach( $rows as $row){
      $products .= "<div class='m-5  card' style='width: 17.85rem;'>
      <input type='hidden' name='productId' id='productId' value='{$row['productId']}' />      
      <div class='product-grid'>
          <div class='product-image'>
              <a href='#' class='image'>
                  <img class='pic-1' src='../images/{$row['productImage']}' class='card-img-top' alt='...' height='350'>
              </a>
              <ul class='product-links'>
                <li><button id='cartButton' type='submit'><i class='fa fa-shopping-bag cartButton'></i> Add to cart</button></li>
                <li><button><a href='../files/productDetails.php?productId={$row['productId']}'><i class='fa fa-search'></i></a> Quick View </button></li>
                
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
}

