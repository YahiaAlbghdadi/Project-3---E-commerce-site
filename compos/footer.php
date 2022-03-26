<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "bootstrap.php" ?>
    <style><?php include "../styles/footer.css"; ?></style>

    <!-- font awesome cdn link  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous"> -->

    <title>footer</title>
</head>
<body>
        <section class="deal" id="deal">
            <div class="icons-container">
                <div class="icons">
                    <i class="fas fa-shipping-fast"></i>
                    <h3>fast delivery</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, molestiae?</p>
                </div>

                <div class="icons">
                    <i class="fas fa-user-clock"></i>
                    <h3>24 x 7 support</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, molestiae?</p>
                </div>

                <div class="icons">
                    <i class="fas fa-money-check-alt"></i>
                    <h3>easy payments</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, molestiae?</p>
                </div>

                <div class="icons">
                    <i class="fas fa-box"></i>
                    <h3>10 days replacements</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, molestiae?</p>
                </div>

            </div>

        </section>
        <!-- deal section ends -->

        <!-- newsletter section starts  -->

        <section class="newsletter">
            <h1>newsletter</h1>
            <p>get in touch for latest discounts and updates</p>
            <form action="">
                <input type="email" placeholder="enter your email">
                <input type="submit" class="btn1">
            </form>
        </section>

        <!-- newsletter section ends -->
    
        <!-- footer section ends -->
    <footer class="footer">
        <div class="container bottom_border">
            <div class="row">
                <div class=" col-sm-4 col-md col-sm-4  col-12 col">
                    <h4 class="headin5_amrc col_white_amrc pt2">Find us</h4>                 
                    <p class="mb10">Lorem Ipsum is simply dummy text of the printing and</p>
                    <p><i class="fa fa-location-arrow"></i> maxstrasse,125, 1230 Wien  </p>
                    <p><i class="fa fa-phone"></i>  +43-08800088880  </p>
                    <p><i class="fa fa fa-envelope"></i> info@example.com  </p>
                </div>

                <div class=" col-sm-4 col-md  col-6 col">
                    <h4 class="headin5_amrc col_white_amrc pt2">Action</h4>                  
                    <ul class="footer_ul_amrc">
                        <li><a href="#">I Phone</a></li>
                        <li><a href="#">Samsung</a></li>
                        <li><a href="#">Xiaume</a></li>
                        <li><a href="#">Vivo</a></li>
                        <li><a href="#">Huawei</a></li>
                        <li><a href="#">5G version</a></li>
                    </ul>
                    
                </div>

                <div class=" col-sm-4 col-md  col-6 col">
                    <h4 class="headin5_amrc col_white_amrc pt2">Quick links</h4>  
                    <ul class="footer_ul_amrc">
                        <li><a href="#">Quarantee</a></li>
                        <li><a href="#">Service</a></li>
                        <li><a href="#">our 5G service</a></li>
                        <li><a href="#">Our Partner</a></li>
                        <li><a href="#">Die Lieferung</a></li>
                        <li><a href="#">Lorem Ipsum is simply</a></li>
                    </ul>     
                </div>

                <div class=" col-sm-4 col-md  col-12 col">

                    <img src="/images/footerlogo4.png" style="width: 250px;" alt="">
                    <!-- <h4 class="headin5_amrc col_white_amrc pt2">Follow us</h4>
                    <ul class="footer_ul2_amrc">
                        <li><a href="#"><i class="fab fa-youtube fleft padding-right"></i> </a><p>Lorem Ipsum is simply dummy text of the printing.<a href="#">https://www.lipsum.com/</a></p></li>
                        <li><a href="#"><i class="fab fa-facebook-f fleft padding-right"></i> </a><p>Lorem Ipsum is simply dummy text of the printing.<a href="#">https://www.lipsum.com/</a></p></li>
                        <li><a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a><p>Lorem Ipsum is simply dummy text of the printing.<a href="#">https://www.lipsum.com/</a></p></li>
                    </ul> -->
                </div>
            </div>
        </div>

        <div class="container">
            <ul class="foote_bottom_ul_amrc">
                <li><a href="#">HOME</a></li>
                <li><a href="#">ABOUT US</a></li>
                <li><a href="#">CONTACT US</a></li>
                <li><a href="#">ALL PRODUCTS</a></li>
                
            </ul>
        
            <p class="text-center">Copyright @2022 | Designed by Full-Stack Team - Code Factory, Wien Austria </p>

            <!-- <div class="footer-social-icons">
                <ul class="social-icons">
                    <li><a href="#" class="social-icon"> <i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="social-icon"> <i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="social-icon"> <i class="fa fa-rss"></i></a></li>
                    <li><a href="#" class="social-icon"> <i class="fa fa-youtube"></i></a></li>
                    <li><a href="#" class="social-icon"> <i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#" class="social-icon"> <i class="fa fa-github"></i></a></li>
                </ul>
            </div> -->
           
        </div>
    </footer>
</body>
</html>