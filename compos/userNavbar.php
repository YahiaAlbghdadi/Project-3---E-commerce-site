<!-- <?php

 $destination="login.php";
 if(!isset($_SESSION)) 
        { 
           
            session_start(); 
            $id=$_SESSION['user'];
        } 
        if (isset($_SESSION['user'])) {
          
           $destination="userUpdate.php?id={$id}"; 

        }    

?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Mobile User Navbar</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- font awesome cdn link  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../styles/userNavbar.css">

</head>

<body>

    <!-- nav section starts  -->
    <header>
        <nav>
            <div class="navbar">
                <i class='bx bx-menu'></i>
                <div class="navlogo">
                    <img src="../images/navbarlogo.png" style="max-width:90px" alt="">
                    <!-- <div class="logo"><a href="#">  My Mobile</a></div> -->
                </div>
                <div class="nav-links">
                    <div class="sidebar-logo">
                        <!-- <span class="logo-name">My Mobile</span> -->
                        <i class='bx bx-x'></i>
                    </div>
                    <ul class="links">
                        <li><a href="/files/landingPage.php">HOME</a></li>
                        <li><a href="/files/aboutUs.php">ABOUT US</a></li>
                        <li><a href="contactUs.php">CONTACT US</a></li>
                        
                        <li>
                            <a href="#">SORTING</a>
                            <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
                            <ul class="htmlCss-sub-menu sub-menu">
                                <li><a href="/files/landingPage.php">All Products</a></li>
                                <li><a href="/files/sort1.php">Samsung</a></li>
                                <li><a href="/files/sort2.php">I Phone</a></li>
                                <li><a href="/files/sort3.php">Xiaumi</a></li>
                            </ul>
                        </li>
                        <li><a href="../files/dashboard.php">Dashboard</a></li>
                        </ul>
                </div>

                <div class="linksaid">
                    <div class="search-box">
                        <i class='bx bx-search'></i>
                        <div class="input-box" id="productSearch">
                            <input id="products" type="text" placeholder="Search...">
                        </div>
                    </div>
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="/files/cart.php" class="fas fa-shopping-cart"></a>
                        <a href="<?=$destination?>" class="fas fa-user"></a>
                    </div>
                </div>

            </div>
        </nav>

    </header>
        
    <!-- nav section ends -->

    <script>
        // search-box open close js code
let navbar = document.querySelector(".navbar");
let searchBox = document.querySelector(".search-box .bx-search");
searchBox.addEventListener("click", () => {
    navbar.classList.toggle("showInput");
    if (navbar.classList.contains("showInput")) {
        searchBox.classList.replace("bx-search", "bx-x");
    } else {
        searchBox.classList.replace("bx-x", "bx-search");
    }
});

// sidebar open close 
let navLinks = document.querySelector(".nav-links");
let menuOpenBtn = document.querySelector(".navbar .bx-menu");
let menuCloseBtn = document.querySelector(".nav-links .bx-x");
menuOpenBtn.onclick = function() {
    navLinks.style.left = "0";
}
menuCloseBtn.onclick = function() {
    navLinks.style.left = "-100%";
}

// sidebar submenu open close 
let htmlcssArrow = document.querySelector(".htmlcss-arrow");
htmlcssArrow.onclick = function() {
    navLinks.classList.toggle("show1");
}


    </script>

</body>

</html>