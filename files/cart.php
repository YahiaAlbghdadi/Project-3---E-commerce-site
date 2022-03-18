<?php
    require_once "../actions/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once "../compos/bootstrap.php" ?>

    <link rel="stylesheet" href="../styles/style.css">
    

</head>
<body>
    <?php require_once "../compos/userNavbar.php" ?>
    <div class="container">
        <div class="ordersParent ">
            <div class="sectionTop p-3  ">
                <h1>Your Orders</h1>
                <div class="cartPrice row offset-11 ">price</div>
                <hr>
            </div>
            <div class="sectionMiddle p-3 row">
                <img src="https://m.media-amazon.com/images/I/71birmzmmTL._AC_AA180_.jpg" alt="" class="col-4 cartItemImg">
                <div class="col-6">
                    <p>2 x Swirl H 41 MP Plus AirSpace Vacuum Cleaner Bags to Fit Fürstaubbeutel Microfleece</p>
                    <p>In stock</p>
                    <select placeholder="Qtty">
                        <option value="actual value 1">Qtty: 1</option>
                        <option value="actual value 2">Qtty: 2</option>
                        <option value="actual value 3">Qtty: 3</option>
                        <option value="actual value 3">Qtty: 4</option>
                        <option value="actual value 3">Qtty: 5</option>
                        <option value="actual value 3">Qtty: 6</option>
                        <option value="actual value 3">Qtty: 7</option>
                        <option value="actual value 3">Qtty: 8</option>
                        <option value="actual value 3">Qtty: 9</option>
                    </select>
                    
                </div>
                <div class="col-2">

                </div>
            </div>
            <div class="sectionBottom">
            <p class="offset-11 ">price</p>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>