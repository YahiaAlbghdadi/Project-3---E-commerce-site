<?php
    require_once "../actions/connection.php";
       
    require_once "../actions/userFileUpload.php";
       

         if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        if (isset($_SESSION['user'])) {
           header("Location:landingPage.php");
          
        }    
         if (isset($_SESSION['admin'])) {
           header("Location:dashboard.php"); 
        }  
       
      
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
              $emailError ="please enter your email";
          }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
              $error=true;
              $emailError =" your email not corect";

          }

          if(empty($pass)){
            $error=true;
            $passError ="please enter your pass";
          }elseif(strlen($pass)<5){
            $error=true;
            $passError =" your pass not corect!";
          }
          if(!$error){
                $password=hash("sha256",$pass);
                $sql ="SELECT * FROM users WHERE email='$email'";
                $result= $conn->query($sql);
                $row=mysqli_fetch_assoc($result);
                $count=mysqli_num_rows($result);
              if($count==1 &&$row["password"]==$password){
                if($row["rank"]=="admin"){
                  $_SESSION["admin"]=$row["id"];
                  header("Location: dashboard.php");
                }
                else{
                  $_SESSION["user"]=$row["id"];
                  header("Location:landingPage.php");
                }
              }else{
                $errMSG="wrong in your acaunt, try agen..";
              }

         }

         $conn->close();
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

    <body class="img js-fullheight" style="background-image: url(../LoginForm/images/phon.jpg);">
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
                            <form  class="signin-form" method="POST"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off"  >
                           
                            <?php
                if (isset($errMSG)) {
                    echo $errMSG;
                }
                ?>

                                <div class="form-group">
                                    <input type="email" class="form-control" autocomplete="off" placeholder="your-email@gmail.com"
                                    name="email" value="<?php echo $email; ?>">
                                     <span class="text-danger" > <?php echo $emailError; ?> </span>
                                </div>
                                <div class="form-group">
                                    <input  type="password" class="form-control" name="pass"  placeholder="Password" >
                                    <span class="text-danger"> <?php echo $passError; ?> </span>
                                </div>
                                <div class="form-group">
                                   <button type="submit"  name="btn-login" value="Sign In" class="form-control btn btn-primary submit px-3">Sign In</button> 
                                    <!-- <button type="submit" name="btn-login" class="form-control btn btn-primary submit px-3 "  ><a class=" btn btn-primary submit px-3 "  > log In</a></button> -->
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