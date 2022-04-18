<?php
    require_once "connection.php";
    // if(session_id() == '') {
    //     session_start();
    // }

    // if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
    //     header("location: login.php");
    // }
    // if(isset($_SESSION['user'])){
    //     header("location: login.php");
    // }

    $users = "";
    $searchedUser= "";

    if(!$_GET){
        $sql = "SELECT * FROM users where rank = 'user'";
        $result = $conn->query($sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        foreach( $rows as $row){
            $users .= "<tr class='tableTrColoring'>
            <td class='p-2'>{$row['lastName']}</td>
            <td class='p-2'>{$row['email']}</td>
            <td class='p-2'>{$row['telefonNumber']}</td>
            <td class='p-2' ><a href='userDetails.php?id={$row['id']}'>Show Details</a>  <a class='deleteLink' href='userDelete.php?id={$row['id']}&addressId={$row['fkAddress']}'>Delete User</a></td>

        </tr>";
      }
      
        
      }else{
            $user =  $_GET["user"];
            $sql = "SELECT * from users WHERE lastName LIKE '$user%'";
            $result = $conn->query($sql);
            if($result->num_rows == 0){
                echo "No Results";
            }else {
                $rows = $result->fetch_all(MYSQLI_ASSOC);
      
            foreach($rows as $row){

               echo "<tr class='tableTrColoring'>
               <td class='p-2'>{$row['lastName']}</td>
               <td class='p-2'>{$row['email']}</td>
               <td class='p-2'>{$row['telefonNumber']}</td>
               <td class='p-2' ><a href='userDetails.php?id={$row['id']}'>Show Details</a></td>
   
           </tr>";
            }
          }}
      
?>

