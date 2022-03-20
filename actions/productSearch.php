<?php

/* session_start();
require_once "db_connect.php";

$red="red_Adm";

  if(isset($_SESSION["user"])){
  $red= "red_User";
} 
$search=$_GET["search"];
 */

$sql="SELECT * from products WHERE name LIKE '$search%'";


$result= mysqli_query($connect,$sql);

if(mysqli_num_rows($result)> 0){
while($row=mysqli_fetch_assoc($result)){

    echo "<div 
    ///////////////
  </div>";

}
}else{
    echo "you dont have any thing...!";
}
?> 