<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carousel</title>

    <!-- owl carousel css file cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">




</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap');
        .btncar {
            height: 3rem;
            width: 9rem;
            background: rgb(27, 130, 185);
            color: #fff;
            font-size: 1.3rem;
            font-family: 'Open Sans', sans-serif;
            cursor: pointer;
            border: none;
            outline: none;
            border-radius: 5px;
            margin-left: 40px;
        }
        
        .btncar:hover {
            letter-spacing: .08rem;
            opacity: .8;
            background: rgba(27, 130, 185, 0.823);
        }
        
        .home .home-slider .item {
            position: relative;
            display: flex;
            justify-content: center;
        }
        
        .home .home-slider .item img {
            object-fit: cover;
            width: 100%;
            height: 600px;
        }
        
        .home .home-slider .item .content {
            position: absolute;
            top: 50%;
            left: 5%;
            transform: translateY(-50%);
        }

        .home .owl-carousel .owl-prev,
        .home .owl-carousel .owl-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            outline: none;
        }
        
        .home .owl-carousel .owl-prev {
            left: 1.3rem;
            ;
        }
        
        .home .owl-carousel .owl-next {
            right: 1.3rem;
            ;
        }
        
        .home .owl-carousel .owl-prev span,
        .home .owl-carousel .owl-next span {
            color: #2881b867;
            font-size: 7rem;
        }
        /* media queries  */
        
        @media (max-width:768px) {
            .btncar {
                height: 2.5rem;
                width: 7rem;
                font-size: 1rem;
            }
        }
        
        @media (max-width:600px) {
            .btncar {
                height: 2rem;
                width: 6rem;
                font-size: .9rem;
            }
        }
        
        @media (max-width:375spx) {
            .btncar {
                height: 2rem;
                width: 5rem;
                font-size: .8rem;
            }
            .item img {
                width: 100%;
                height: 200;
                object-fit: cover;
            }
        }
    </style>

    <!-- carousel section starts  -->

    <section class="home" id="home">

        <div class="home-slider owl-carousel">

            <div class="item">
                <img src="../images/caro1.jpg" alt="">
                <div class="content">
                    <a href="#"><button class="btncar">SAMSUNG</button></a>
                </div>
            </div>

            <div class="item">
                <img src="../images/caro2.jpg" alt="">
                <div class="content">
                    <a href="#"><button class="btncar">I PHONE</button></a>
                </div>
            </div>

            <div class="item">
                <img src="../images/caro3.jpg" alt="">
                <div class="content">
                    <a href="#"><button class="btncar">XIAUME   </button></a>
                </div>
            </div>

            <div class="item">
                <img src="../images/caro4.jpg" alt="">
                <div class="content">
                    <a href="#"><button class="btncar"> HUAWIE</button></a>
                </div>
            </div>

            <div class="item">
                <img src="../images/caro5.jpg" alt="">
                <div class="content">
                    <a href="#"><button class="btncar">COLLECTION</button></a>
                </div>
            </div>
        </div>

    </section>

    <!-- carousel section ends -->



    <!-- jquery cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- owl carousel js file cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

   
    <script>
        $(document).ready(function() {

            $('.home-slider').owlCarousel({
                items: 1,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 5000,
                loop: true
            });
        });
    </script>
</body>

</html>