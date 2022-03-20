<?php
   /*   require_once "../components/db_connect.php";
     
        require_once "../components/file_upload.php"; 
    */
    
       /*  if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        if (isset($_SESSION['user'])) {
           header("Location:landingPage.php"); 
        }    
         if (isset($_SESSION[ 'adm' ])) {
           header("Location:dashboard.php"); 
        }  */
      
        $error=false;
        $email=$pass="";
        $emailError=$passError="";

      if(isset($_POST["btn-login"])){
                $email=trim($_POST["email"]);
                $email=strip_tags($email);
                $email=htmlspecialchars($email);

                $pass=trim($_POST["pass"]);
                $pass=strip_tags($pass);
                $pass=htmlspecialchars($pass);

            if(empty($email)){
              $error=true;
              $l_nameError ="please enter your email";
          }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
              $error=true;
              $emailError =" your email not corect";

          }

          if(empty($pass)){
            $error=true;
            $l_nameError ="please enter your pass";
          }elseif(strlen($pass)<5){
            $error=true;
            $passError =" your pass not corect!";
          }
          if(!$error){
                $password=hash("sha256",$pass);
                $sql ="SELECT * FROM user WHERE eimail='$email'";
                $result= mysqli_query($connect,$sql);
                $row=mysqli_fetch_assoc($result);
                $count=mysqli_num_rows($result);

              if($count==1 &&$row["password"]==$password){
                if($row["status"]=="adm"){
                  $_SESSION["adm"]=$row["id"];
                  header("Location: dashboard.php");
                }
               elseif($row["status"]=="superAdm"){
                  $_SESSION["superAdm"]=$row["id"];
                  header("Location: dashboard.php");
                }
                
                else{
                  $_SESSION["user"]=$row["id"];
                  header("Location:../cradZoo/u_login.php");
                }
              }else{
                $errMSG="wrong in your acaunt, try agen..";
              }

         }

         $connect->close();
        }
        
         
?>

    <!doctype html>
    <html lang="en">

    <head>
        <title>Login 10</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="../LoginForm/css/style.css">

    </head>

    <body class="img js-fullheight" style="background-image: url(../LoginForm/images/bg.jpg);">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h2 class="heading-section">Login <strong> Phone shop</strong></h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                            <h3 class="mb-4 text-center">Have an account?</h3>
                            <form action="#" class="signin-form">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" class="form-control" placeholder="Password" required>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50">
                                        <label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="register.php" style="color: #fff">Register</a>
                                    </div>
                                </div>
                            </form>
                            <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
                            <div class="social d-flex text-center">
                                <a href="https://Facebook.com" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
                                <a href="https://google.com" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-google mr-2"></span> google</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="../LoginForm/js/jquery.min.js"></script>
        <script src="../LoginForm/js/popper.js"></script>
        <script src="../LoginForm/js/bootstrap.min.js"></script>
        <script src="../LoginForm/js/main.js"></script>

    </body>

    </html>