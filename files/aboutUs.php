<?php
      
      require_once "../compos/userNavbar.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about us</title>

    <!-- font awesome cdn link  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <!-- cusom css file link  -->
    <link rel="stylesheet" href="../styles/aboutus.css">
    

</head>

<body>
    <div class="titl"><p>ABOUT US </p> </div>

    <section class="about">

        <div class="image">
            <img src="../images/about-img.png" alt="">
        </div>

        <div class="content">
            <h3>our story</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam modi ea fuga quibusdam fugiat porro doloremque, quas dignissimos culpa unde. Recusandae maxime aliquam beatae reiciendis, facilis voluptatum eligendi nesciunt ipsa?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, distinctio et? Odio voluptatum eius reprehenderit saepe quisquam excepturi molestiae architecto.</p>
            <a href="#" class="btn2">read more</a>
        </div>

    </section>

    <!-- about section ends -->

    <!-- faq section starts  -->

    <section class="faq">

        <div class="header1"><p> questions & <span>answers</span></p> </div>

        <div class="accordion-container">

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>What we sell?</h3>
                    <i class="fas fa-angle-down"></i>
                </div>
                <p class="accordioin-content">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus, laboriosam non eligendi reiciendis quis laborum exercitationem voluptatibus autem harum nihil nisi sed mollitia, quam blanditiis architecto cumque? Sit, voluptate maiores.
                </p>
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>how to place order online?</h3>
                    <i class="fas fa-angle-down"></i>
                </div>
                <p class="accordioin-content">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus, laboriosam non eligendi reiciendis quis laborum exercitationem voluptatibus autem harum nihil nisi sed mollitia, quam blanditiis architecto cumque? Sit, voluptate maiores.
                </p>
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>how to pay online?</h3>
                    <i class="fas fa-angle-down"></i>
                </div>
                <p class="accordioin-content">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus, laboriosam non eligendi reiciendis quis laborum exercitationem voluptatibus autem harum nihil nisi sed mollitia, quam blanditiis architecto cumque? Sit, voluptate maiores.
                </p>
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>is online payment safe?</h3>
                    <i class="fas fa-angle-down"></i>
                </div>
                <p class="accordioin-content">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus, laboriosam non eligendi reiciendis quis laborum exercitationem voluptatibus autem harum nihil nisi sed mollitia, quam blanditiis architecto cumque? Sit, voluptate maiores.
                </p>
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>how to find your orders?</h3>
                    <i class="fas fa-angle-down"></i>
                </div>
                <p class="accordioin-content">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus, laboriosam non eligendi reiciendis quis laborum exercitationem voluptatibus autem harum nihil nisi sed mollitia, quam blanditiis architecto cumque? Sit, voluptate maiores.
                </p>
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>how to contact service center?</h3>
                    <i class="fas fa-angle-down"></i>
                </div>
                <p class="accordioin-content">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus, laboriosam non eligendi reiciendis quis laborum exercitationem voluptatibus autem harum nihil nisi sed mollitia, quam blanditiis architecto cumque? Sit, voluptate maiores.
                </p>
            </div>

            <div class="accordion">
                <div class="accordion-heading">
                    <h3>Datenschuzterklärung</h3>
                    <i class="fas fa-angle-down"></i>
                </div>
                <p class="accordioin-content">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus, laboriosam non eligendi reiciendis quis.<br>
                    laborum exercitationem voluptatibus autem harum nihil nisi sed mollitia, quam blanditiis architecto cumque? Sit, voluptate maiores.
                </p>
            </div>

        </div>

 
    </section>

      <?php
      
            require_once "../compos/footer.php";

      ?>

    <!-- faq section ends -->
    <script>
        document.querySelectorAll('.accordion-container .accordion').forEach(accordion => {
            accordion.onclick = () => {
                accordion.classList.toggle('active');
            }
        });
    </script>


</body>

</html>