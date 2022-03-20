<?php
    require_once "connection.php";

    if(!$_GET){
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $trips = "";
        foreach( $rows as $row){
            $upperLocation = strtoupper($row['location']);
            $upperName = strtoupper($row['locationName']);
            $trips .= "<div class='main col-lg-4 col-md-6 col-sm-12'>
            <a href='details.php?id={$row['id']}'><img src='../images/{$row['image']}' class='image m-3' alt=''></a>
            <h6 class='location'>
                {$upperLocation}
            </h6>
            <h4 class='title'>
                {$upperName}
            </h4>
            <hr class='horz'>
            <p class='description'>
                {$row['description']}
            </p>
        </div>";
      }
        
      }else{
            $trip =  $_GET["trip"];
            $sql = "SELECT * from trip WHERE location LIKE '$trip%'";
            $result = $conn->query($sql);
            if($result->num_rows == 0){
                echo "No Results";
            }else {
                $rows = $result->fetch_all(MYSQLI_ASSOC);
      
            foreach($rows as $row){
              $upperLocation = strtoupper($row['location']);
               echo "
                  <div class='main col-lg-4 col-md-6 col-sm-12'>
                      <a href='details.php?id={$row['id']}'><img src='../images/{$row['image']}' class='image m-3' alt=''></a>
                      <h6 class='location'>
                          {$upperLocation}
                      </h6>
                      <h4 class='title'>
                          {$row['locationName']}
                      </h4>
                      <hr class='horz'>
                      <p class='description'>
                          {$row['description']}
                      </p>
                  </div>
                ";
            }
          }}
      
?>

