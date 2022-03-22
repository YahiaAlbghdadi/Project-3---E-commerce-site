<?php
 session_start();
if (!isset($_SESSION['admin' ]) && !isset($_SESSION['user'])) {
   header("Location: login.php" );
    exit;
} 
else if(isset ($_SESSION['user'])!="") {
header("Location:login.php");
}
else if(isset($_SESSION[ 'admin'])!= "") {
   header("Location: dashboard.php");
}

if( isset($_GET['logout'])) {
unset($_SESSION['user'  ]);
unset($_SESSION['admin' ]);
session_unset();
session_destroy();
header("Location:login.php");
exit;
}