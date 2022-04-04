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
      $products .= "<div class='card center' style='width: 20rem;'>
      <form method='post' >
      <input type='hidden' name='id' value='{$row['id']}'/>      
      <img src='../images/{$row['image']}' class='card-img-top' alt='...' height='350'>
      <div class='card-body'>
        <h4 class='card-title'>{$row['name']}{$row['brand']}</h4>
        
        <p class='card-text'>Price: {$row['price']} €</p>
        <div class='multi-button'>
          <button><a href='../files/productUpdate.php?id={$row['id']}'>Update</a></button>
          <button id='del'><a href='../files/productDelete.php?id={$row['id']}' >Delete</a></button>
          <button><a href='details.php?id={$row['id']}' >Details</a></button>
          <button type='submit' >Buy Now</button>
          </form>

        </div>
        
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
        echo "<div class='card center' style='width: 20rem;'>
        <form method='post' >

        <input type='hidden' name='id' value='{$row['id']}'/>      
        <img src='../images/{$row['image']}' class='card-img-top' alt='...' height='350'>
        <div class='card-body'>
          <h4 class='card-title'>{$row['name']}{$row['brand']}</h4>
          
          <p class='card-text'>Price: {$row['price']} €</p>
          <div class='multi-button'>
            <button><a href='../files/productUpdate.php?id={$row['id']}'>Update</a></button>
            <button id='del'><a href='../files/productDelete.php?id={$row['id']}' >Delete</a></button>
            <button><a href='details.php?id={$row['id']}' >Details</a></button>
            <button type='submit' >Buy Now</button>
            </form>

          </div>
          
        </div>

        </div>";
    }
  }
  }

  // <p class='card-text'>brand: {$row['brand']}</p>