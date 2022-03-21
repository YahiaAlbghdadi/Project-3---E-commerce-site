







<?php
      require_once "../actions/connection.php";
      require_once "../compos/userNavbar.php";

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
    <link rel="stylesheet" href="../styles/style.css">
    <title>Document</title>
</head>
<body>
<web-particles id="tsparticles" options='{"fps_limit":60,"interactivity":{"detectsOn":"canvas","events":{"onClick":{"enable":true,"mode":"push"},"onHover":{"enable":true,"mode":"repulse"},"resize":true},"modes":{"push":{"particles_nb":4},"repulse":{"distance":200,"duration":0.4}}},"particles":{"color":{"value":"#f3f3"},"links":{"color":"#f3f3","distance":150,"enable":true,"opacity":0.4,"width":1},"move":{"bounce":false,"direction":"none","enable":true,"outMode":"out","random":false,"speed":2,"straight":false},"number":{"density":{"enable":true,"area":800},"value":80},"opacity":{"value":0.5},"shape":{"type":"circle"},"size":{"random":true,"value":5}},"detectRetina":true}'></web-particles>

<div class ="container">
<h1 class="text-center">our product</h1>
<div class="row" id="content"></div>
<a  class="btn-danger" href="logout.php?logout">Sign Out </a><br>


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
</body>
</html>













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
<script src="https://cdn.jsdelivr.net/npm/tsparticles@1.28.0/dist/tsparticles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@webcomponents/webcomponentsjs@2.5.0/custom-elements-es5-adapter.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@webcomponents/webcomponentsjs@2.5.0/webcomponents-loader.js"></script>
<script type="module" src="https://cdn.jsdelivr.net/npm/web-particles@1.1.0/dist/web-particles.min.js"></script>