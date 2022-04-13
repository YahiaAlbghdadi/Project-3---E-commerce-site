<?php

require_once "../actions/connection.php";
// if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
//     header("location: login.php");
// }
if($_post){
    $user = $_POST['user'];
    $sql="SELECT * FROM products JOIN orders on orders.id = products.id where fkUser = '$user'";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    $print = "";
    foreach($rows as $row){
        $print .="";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reviews</title>
</head>
<body>

    
</body>
</html>
