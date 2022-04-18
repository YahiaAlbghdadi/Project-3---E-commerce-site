<?php
      
   
   
      
      require_once "../compos/userNavbar.php";
      require_once "../actions/connection.php";
      require_once "../actions/productSerchIphone.php";

      //$sql="select * from products where name ='Samsung' ";

      if(!isset($_SESSION)) 
      { 
          session_start(); 
      } 
      if( !isset($_SESSION['admin']) && !isset($_SESSION['user' ]) ) {
            header("Location:login.php");
            exit;
           }




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../styles/landingpage.css">
</head>
<body>
<div class ="container">
<h1 class="text-center ">Samsung</h1>


<div class='  row  p-3 m-4'  id="foundProduct">
     <?= $products?>
    </div>

<script>
function loadDoc() {
let xhttp = new XMLHttpRequest();
xhttp.onload = function() {
if (this.status == 200 ) {
 document.getElementById("foundProduct").innerHTML =this.responseText;

}
};
var name=document.getElementById("search").value;
xhttp.open("GET", '../actions/productSerchSamsung.php?products='+products , true); //(method, URL, async)
xhttp.send();
}

loadDoc();

document.getElementById("products").addEventListener("keyup",loadDoc);
</script> 
</div>    
</body>
</html>

</body>
</html>
