<?php
    require_once "../actions/connection.php";
    require_once "../actions/userSearch.php";

    if(session_id() == '') {
        session_start();
    }

    if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
        header("location:login.php");
    }
    if(isset($_SESSION['user'])){
        header("location:landingPage.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <?php require_once "../compos/bootstrap.php" ?>


</head>
<body>
    <?php require_once "../compos/adminNavbar.php" ?>
    <div class="userSearchDiv">
    </div>
    <div class="container text-center">
        <h1 class="">logged In Users:</h1>
        <table id="" class="usersTable text-center ">
        <tr class="p-3 usersTableHeader ">
            
                <th class="p-2">Last Name</th>
                <th class="p-2">Email Address</th>
                <th class="p-2">Tel. Number</th>
                <th class="p-2">Manage</th>

        </tr>
        <?=$users?>

       

        </table>
        <div class="foundUser">
        

        </div>
    </div>
    <script>
        function loadDoc() {
        let xhttp = new XMLHttpRequest(); 
        xhttp.onload = function() {
            if (this.status == 200 ) {
                document.getElementById("foundUser").innerHTML = this.responseText;
            }
        };

        var user = document.getElementById("userSearchBar").value;
        xhttp.open("GET", '../actions/userSearch.php?user='+user , true); 
        xhttp.send();
        }
        document.getElementById("userSearchBar").addEventListener("keyup", loadDoc);
    </script>
        <?php require_once "../compos/bootJs.php" ?>

</body>
</html>