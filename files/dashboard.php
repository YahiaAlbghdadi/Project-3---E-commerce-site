<?php
    require_once "../actions/connection.php";
    require_once "../actions/userSearch.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <?php require_once "../compos/adminNavbar.php" ?>
    <div class="container text-center">
        <h1 class="">logged In Users:</h1>
        <table class="usersTable text-center">
            <tr class="p-3 usersTableHeader">
                <th class="p-2">Last Name</th>
                <th class="p-2">Email Address</th>
                <th class="p-2">Tel. Number</th>
                <th class="p-2">Manage</th>
            </tr>
            <tr class="doubleFace">
                <td class="p-2">Snow</td>
                <td class="p-2">aasdfffffffffffdg@gmail.com</td>
                <td class="p-2">209349687</td>
                <td class="p-2 " ><a class="userDetailsHref" href='userDetails.php?id=<?=$row["id"]?>'>Show Details</a></td>
                
            </tr>
            <tr class="doubleFace">
                <td class="p-2">Snow</td>
                <td class="p-2">aasdfffffffffffdg@gmail.com</td>
                <td class="p-2">209349687</td>
                <td class="p-2" ><a href='userDetails.php?id=<?=$row["id"]?>'>Show Details</a></td>
            </tr>
            <tr class="doubleFace">
                <td class="p-2">Snow</td>
                <td class="p-2">aasdfffffffffffdg@gmail.com</td>
                <td class="p-2">209349687</td>
                <td class="p-2" ><a href='userDetails.php?id=<?=$row["id"]?>'>Show Details</a></td>

            </tr>
            
    </table>
    </div>
</body>
</html>