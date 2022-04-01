<?php
      require_once "../actions/connection.php";
    //   require_once "../compos/userNavbar.php";

     
      require_once "../actions/productSearch.php";
      require_once "../compos/userNavbar.php";
      require_once "../compos/bootstrap.php";


    //   if (session_status() == PHP_SESSION_NONE) {
    //     session_start();
    // }
    
    // $database = new Database;
    // $conn = $database->conn;

    // $rows = $database->read("products");

    //  if(!isset($_SESSION)) 
    //   { 
    //       session_start(); 
    //   } 
    //  if( !isset($_SESSION['admin']) && !isset($_SESSION['user' ]) ) {
    //         header("Location:login.php");
    //         exit;
    //        } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../styles/style.css"> -->
    <!-- <?php require_once "../compos/bootstrap.php" ?> -->
    <style><?php include "../styles/landingPage.css"; ?></style>
    <title>Document</title>
</head>
<body>
    


    <div class="parent row p-5 mb-2" id="userSearchBar">
        <?=$products?>
    </div>

<script>
function loadDoc() {
let xhttp = new XMLHttpRequest();
xhttp.onload = function() {
    if (this.status == 200 ) {
    document.getElementById("userSearchBar").innerHTML =this.responseText;

    }
};
var products =document.getElementById("products").value;
xhttp.open("GET", '../actions/productSearch.php?products='+products , true); //(method, URL, async)
xhttp.send();
}

loadDoc();

document.getElementById("products").addEventListener("keyup",loadDoc);
</script> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 
<!-- <script src="https://cdn.jsdelivr.net/npm/tsparticles@1.28.0/dist/tsparticles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@webcomponents/webcomponentsjs@2.5.0/custom-elements-es5-adapter.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@webcomponents/webcomponentsjs@2.5.0/webcomponents-loader.js"></script>
<script type="module" src="https://cdn.jsdelivr.net/npm/web-particles@1.1.0/dist/web-particles.min.js"></script> -->
</body>
</body>
