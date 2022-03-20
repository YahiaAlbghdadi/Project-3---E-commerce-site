

<?php
      /*   require_once "../components/db_connect.php";
        require_once "../components/boot.php";
        require_once "../components/file_upload.php";
 */
/////////////////////

    /*    session_start(); 
        if ( isset($_SESSION['user'])) {
        header("Location:login.php" ); 
        }   
        if (isset($_SESSION[ 'adm' ])) {
        header("Location: dashboard.php"); 
        } 
 */

    $error=false;
    $f_name=$l_name=$email=$telefonNumber=$picture=$pass=$Address="";
    $f_nameError=$l_nameError=$emailError=$dateError=$passError=$passError= $pictureError=$telefonNumberError=$AddressError="";
if(isset($_POST["btn-signup"])){
            $f_name=trim($_POST["f_name"]);
            $f_name=strip_tags($f_name);
            $f_name=htmlspecialchars($f_name);

            $l_name=trim($_POST["l_name"]);
            $l_name=strip_tags($l_name);
            $l_name=htmlspecialchars($l_name);
            
            $email=trim($_POST["email"]);
            $email=strip_tags($email);
            $email=htmlspecialchars($email);

            $pass=trim($_POST["pass"]);
            $pass=strip_tags($pass);
            $pass=htmlspecialchars($pass);

            $date=trim($_POST["telefonNumber"]);
            $date=strip_tags($telefonNumber);
            $date=htmlspecialchars($telefonNumber);

            $date=trim($_POST["Address"]);
            $date=strip_tags($Address);
            $date=htmlspecialchars($Address);


            $uploadError="";
            $picture = file_upload($_FILES['picture']);

            ///firstName
            if(empty($f_name)){
                $error=true;
                $f_nameError ="please enter your first name";
            }elseif(strlen($f_name)<3){
                $error=true;
                $f_nameError =" your first name is short";
            }elseif(!preg_match("/^[a-zA-Z]+$/", $f_name)){
                $error=true;
                $f_nameError =" your first name not corect";
            }

            ///LASTNAME
            if(empty($l_name)){
                $error=true;
                $l_nameError ="please enter your last name";
            }elseif(strlen($l_name)<3){
                $error=true;
                $f_nameError =" your last name is short";
            }elseif(!preg_match("/^[a-zA-Z]+$/", $l_name)){
                $error=true;
                $l_nameError =" your lasst name not corect";
            }

            ///email
            if(empty($email)){
                $error=true;
                $l_nameError ="please enter your email";
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error=true;
                $emailError =" your email not corect";
            }else{
                $sql="SELECT email FROM users WHERE email='$email'";
                $result=mysqli_query($connect,$sql);
                if(mysqli_num_rows($result)>0){
                    $error=true;
                    $emailError="your mail already used!";
                }
            }
        

////telefonNumber
            if(empty($telefonNumber)){
                $error=true;
                $telefonNumberError ="please enter your PhoneNumber";
            }elseif(strlen($telefonNumber)<10){
                $error=true;
                $telefonNumberError =" your PhoneNumber not corect ";
            }elseif(!preg_match("/^[a-zA-Z]+$/", $telefonNumber)){
                $error=true;
                $telefonNumberError =" your PhoneNumber  not corect";
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
               $query= "INSERT INTO `users`(firstName,lastName, email, image, password,telefonNumber,fkAddress) VALUES 
               ('$f_name', '$l_name', '$email','$picture->fileName', '$password','$telefonNumber','$Address')";


               $result=mysqli_query($connect,$query);

               if($result){
                   $errTyp="success";
                   $errMSG="welcome!!";
                   $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
                    $f_name="";
                    $l_name="";
                    $email="";
                    $pass="";
                    $telefonNumber="";
                    $Address="";
               }else{
                $errTyp="danger";
                $errMSG="you have some thing wrong.";
                $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
               }
               $connect->close();
            }

  }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

<link rel="stylesheet" href="../LoginForm/fonts/icomoon/style.css">

<link rel="stylesheet" href="../LoginForm/css/owl.carousel.min.css">

<!-- Bootstrap CSS -->
 <link rel="stylesheet" href="../LoginForm/css/bootstrap.min.css"> 

<!-- Style -->
<link rel="stylesheet" href="../LoginForm/css/style.css">
    <title>Document</title>
</head>
<body>
    


 <div class="d-ld-flex half"> 
 <body class="img js-fullheight" style="background-image: url(../LoginForm/images/bg.jpg);">
    <div class="contents"> 

              <?php
           if (isset($errMSG)) {
           ?>
           <div class="alert alert-<?php echo $errTyp ?>"  >
                        <p><?php echo $errMSG; ?></p>
                        <p><?php echo $uploadError; ?></ p>
           </div>

           <?php
           }
           ?>

<section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                    <h3 class="heading-section">Register<strong> Phone shop</strong></h3>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-6">
                       
                            <h3 class="mb-4 text-center"></h3>
                            <form class="w-100  " method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off"  enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="FirstName" required  name="f_name" value="<?php echo $f_name?>">
                                    <span class="text-danger" > <?php echo $f_nameError; ?> </span>
                                </div>

                            
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="LastName" required  name="l_name" value="<?php echo $l_name?>">
                                    <span  class="text-danger"  > <?php echo $l_nameError; ?> </span>
                                </div>

                                <div class="form-group">
                                    <input  type="Email" class="form-control" required  placeholder="your-email@gmail.com" 
                                     name="email" value="<?php echo $email?>">
                                     <span class="text-danger" > <?php echo $emailError; ?> </span>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" class="form-control" placeholder="Password" required  name="pass" value="<?php echo $pass?>">
                                    <span class="text-danger"  ><?php echo $passError; ?> </span>
                                </div>
                         
                                <div class="form-group d-flex">
                                    <input  type="text" class="form-control" placeholder="Straße" required name="Address"">
                                    <span  class="text-danger"> <?php echo $AddressError; ?></span>
                                    <input  type="number" class="form-control" placeholder="HausNr" required name="Address"">
                                    <span  class="text-danger"> <?php echo $AddressError; ?></span>
                                </div>

                                <div class="form-group d-flex">
                                    <input  type="text" class="form-control" placeholder="Stadt" required name="Address"">
                                    <span  class="text-danger"> <?php echo $AddressError; ?></span>
                                    <input  type="number" class="form-control" placeholder="plz" required name="Address"">
                                    <span  class="text-danger"> <?php echo $AddressError; ?></span>
                                </div>

                                <div class="form-group ">
                                    <input  type="number" class="form-control" placeholder="telefonNumber" required name="telefonNumber" value="<?php echo $telefonNumber?>">
                                    <span  class="text-danger"> <?php echo $telefonNumberError; ?></span>
                                </div>

                                <div class="form-group">
                                    <input id="password-field" type="file" class="form-control" placeholder="no foto" required  name= "picture" >
                                    <span class="text-danger" > <?php echo $pictureError; ?> </span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3 "  ><a class=" btn btn-primary submit px-3 "  href="login.php"> log In</a></button>
                                    <!-- <span class="ml-auto"><a  href="login.php" style="color: #fff" class="forgot-pass">login</a></span>  -->
                                    
                                </div>
                               
                            </form>
                          
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