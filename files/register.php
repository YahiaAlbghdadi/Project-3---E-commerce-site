

<?php
        require_once "../actions/connection.php";
       
        require_once "../actions/userFileUpload.php";
 
/////////////////////

            
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            } 
        if ( isset($_SESSION['user'])) {
        header("Location:login.php" ); 
        }   
        if (isset($_SESSION[ 'admin' ])) {
        header("Location: dashboard.php"); 
        } 


    $error=false;
    $firstName=$lastName=$email=$telefonNumber=$picture=$pass=$stadt=$stiege=$straße=$hausNr=$plz="";
    $firstNameError=$lastNameError=$emailError=$passError= $pictureError=$telefonNumberError=$stadtError=$stiegeError=$straßeError=$hausNrError=$plzError="";
if(isset($_POST["btn-signup"])){
            $firstName=trim($_POST["firstName"]);
            $firstName=strip_tags($firstName);
            $firstName=htmlspecialchars($firstName);

            $lastName=trim($_POST["lastName"]);
            $lastName=strip_tags($lastName);
            $lastName=htmlspecialchars($lastName);
            
            $email=trim($_POST["email"]);
            $email=strip_tags($email);
            $email=htmlspecialchars($email);

            $pass=trim($_POST["pass"]);
            $pass=strip_tags($pass);
            $pass=htmlspecialchars($pass);

            $telefonNumber=trim($_POST["telefonNumber"]);
            $telefonNumber=strip_tags($telefonNumber);
            $telefonNumber=htmlspecialchars($telefonNumber);

           
            $stiege=trim($_POST["stiege"]);
            $stiege=strip_tags($stiege);
            $stiege=htmlspecialchars($stiege);

            $straße=trim($_POST["straße"]);
            $straße=strip_tags($straße);
            $straße=htmlspecialchars($straße);

            $plz=trim($_POST["plz"]);
            $plz=strip_tags($plz);
            $plz=htmlspecialchars($plz);

            $hausNr=trim($_POST["hausNr"]);
            $hausNr=strip_tags($hausNr);
            $hausNr=htmlspecialchars($hausNr);

            $stadt=trim($_POST["stadt"]);
            $stadt=strip_tags($stadt);
            $stadt=htmlspecialchars($stadt);

            $uploadError="";
            $picture = userFileUpload($_FILES['picture']);

            ///firstName
            if(empty($firstName)){
                $error=true;
                $firstNameError ="please enter your first name";
            }elseif(strlen($firstName)<3){
                $error=true;
                $firstNameError =" your first name is short";
            }elseif(!preg_match("/^[a-zA-Z]+$/", $firstName)){
                $error=true;
                $firstNameError =" your first name not corect";
            }

            ///LASTNAME
            if(empty($lastName)){
                $error=true;
                $lastNameError ="please enter your last name";
            }elseif(strlen($lastName)<3){
                $error=true;
                $firstNameError =" your last name is short";
            }elseif(!preg_match("/^[a-zA-Z]+$/", $lastName)){
                $error=true;
                $lastNameError =" your lasst name not corect";
            }

            ///email
            if(empty($email)){
                $error=true;
                $lastNameError ="please enter your email";
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error=true;
                $emailError =" your email not corect";
            }else{
                $sql="SELECT email FROM users WHERE email='$email'";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    $error=true;
                    $emailError="your mail already used!";
                }
            }

             ///stadt
            if(empty($stadt)){
                        $error=true;
                        $stadtError ="please enter your stadt";
                    }




                /////stiege
                if(empty($stiege)){
                    $error=true;
                    $stiegeError ="please enter your stiege";
                }
        

                /////hausNr
                if(empty($hausNr)){
                    $error=true;
                    $hausNrError ="please enter your hausNr";
                }


                 /////plz
                 if(empty($plz)){
                    $error=true;
                    $plzError ="please enter your plz";
                }
 
            ///telefonNumber
            if(empty($telefonNumber)){
                $error=true;
                $telefonNumberError ="please enter your PhoneNumber";
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
                $uploadError  = "";
                $sql = "INSERT INTO addresses (city, street, plz, stiege, houseNumber) VALUES ('$stadt','$straße','$plz','$stiege','$hausNr')";
                $result1= $conn->query($sql);
        
                $sql2 = "INSERT INTO users (firstName, lastName, email, password, image, telefonNumber,fkAddress) VALUES ('$firstName','$lastName','$email','$password','$picture->fileName','$telefonNumber', LAST_INSERT_ID())";
                $result2= $conn->query($sql2);
                
                if($result1 && $result2){
                   $errTyp="success";
                   $errMSG="register successfuly!";
                   $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
                    $firstName= $lastName=$email= $pass=$telefonNumber=$straße=$plz=$hausNr= $stadt=$stiege="";
                 header("Location:login.php" ); 
                   
               }else{
                $errTyp="danger";
                $errMSG="something went wrong.";
                $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
               }
               $conn->close();
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
                    <h2 class="heading-section">Register<strong> Phone shop</strong></h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-6">
                       
                            <h3 class="mb-4 text-center"></h3>
                            <form class="w-100  " method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off"  enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="FirstName"   name="firstName" value="<?php echo $firstName?>">
                                    <span class="text-danger" > <?php echo $firstNameError; ?> </span>
                                </div>

                            
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="LastName"   name="lastName" value="<?php echo $lastName?>">
                                    <span  class="text-danger"  > <?php echo $lastNameError; ?> </span>
                                </div>

                                <div class="form-group">
                                    <input  type="Email" class="form-control"   placeholder="your-email@gmail.com" 
                                     name="email" value="<?php echo $email?>">
                                     <span class="text-danger" > <?php echo $emailError; ?> </span>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" class="form-control" placeholder="Password"   name="pass" value="<?php echo $pass?>">
                                    <span class="text-danger"  ><?php echo $passError; ?> </span>
                                </div>
                         
                                <div class="form-group d-flex">
                                    <input  type="text" class="form-control" placeholder="Straße"  name="straße">
                                    <span  class="text-danger"> <?php echo $straßeError; ?></span>
                                    <input  type="number" class="form-control" placeholder="HausNr"  name="hausNr">
                                    <span  class="text-danger"> <?php echo $hausNrError; ?></span>
                                </div>

                                <div class="form-group d-flex  ">
                                    <input  type="text" class="form-control" placeholder="Stadt"  name="stadt">
                                    <span  class="text-danger"> <?php echo $stadtError; ?></span>
                                    <input  type="number" class="form-control" placeholder="plz"  name="plz">
                                    <span  class="text-danger"> <?php echo $plzError; ?></span>
                                    <input  type="text" class="form-control" placeholder="Stiege"  name="stiege">
                                    <span  class="text-danger"> <?php echo $stiegeError; ?></span>
                                </div>

                                <div class="form-group ">
                                    <input  type="number" class="form-control" placeholder="+43 telefonNumber"  name="telefonNumber" value="<?php echo $telefonNumber?>">
                                    <span  class="text-danger"> <?php echo $telefonNumberError; ?></span>
                                </div>

                                <div class="form-group">
                                    <input id="password-field" type="file" class="form-control" placeholder="no foto"  name= "picture" >
                                    <span class="text-danger" > <?php echo $pictureError; ?> </span>
                                </div>
                                <div class="form-group">
                                    <button type="submit"  name = "btn-signup" class="form-control btn btn-primary submit px-3">Sign In</button>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3 "  ><a class=" btn btn-primary submit px-3 "href="login.php"> log In</a></button>
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