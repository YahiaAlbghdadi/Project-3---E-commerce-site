







<?php
      require_once "../actions/connection.php";
      require_once "../compos/userNavbar.php";

     if(!isset($_SESSION)) 
      { 
          session_start(); 
      } 
     /*  if( !isset($_SESSION['adm']) && !isset($_SESSION['user' ]) ) {
            header("Location: ../login/login.php");
            exit;
           } */
?>

<div class ="container">
<h1 class="text-center">our product</h1>
<div class="row" id="content"></div>











<script>
function loadDoc() {
let xhttp = new XMLHttpRequest();
xhttp.onload = function() {
if (this.status == 200 ) {
 document.getElementById("content").innerHTML =this.responseText;

}
};
var name=document.getElementById("search").value;
xhttp.open("GET", '../actions/productSearch.php?search='+name , true); //(method, URL, async)
xhttp.send();
}

loadDoc();

document.getElementById("search").addEventListener("keyup",loadDoc);
</script> 