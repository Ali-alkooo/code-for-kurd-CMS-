<?php
    define("HOSTNAME","localhost");
    define("HOSTUSER","alkoo");
    define("HOST_PASS","alkoo");
    define("DB_NAME","website");
    $conn=mysqli_connect(HOSTNAME,HOSTUSER,HOST_PASS,DB_NAME);
    if($conn){
    // echo"Connected";
      echo"<br>";  }else {
      die("Error : ".mysqli_connect_errno()); }
?>

