<?php session_start(); ?>
<?php
include_once('../includes/functions.php');
include_once('../includes/session.php');
include_once('../includes/cnnectdb.php');

if (isset($_GET["admin"])){
$admin_id_selected=urlencode($_GET["admin"]);
}else{
$admin_id_selected=null;
}
    ?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Sing In</title>
 <!-- Font Awesome -->
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="static/css/mdb.min.css" />
       <!-- Custom styles -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!--<script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script> -->

    

   
    <style>
       
   .body{
    background: linear-gradient(to left, #fc5c7d, #000c40);
   }
       .text{
           color: white;
       }
       
    </style>
</head>
<body class ="body">
  

  <div class="container">
    <div class="row">
        <div class="col-lg-2  col-sm-12 mt-1">
        </div>
<div class="col-lg-4  col-sm-12 mt-1">
<?php  echo msg();?>  
<?php  $errors=err(); ?>
<?php  error_function($errors); ?>
<div style="margin-top: 170px;">
   <form style="background-color: white;padding: 20px; 
    box-shadow: -2px -2px  3px white,2px 2px  3px white;
     border-radius: 2%;" method="post" action="login_submit.php">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">User Name :</label>
      <input type="text" class="form-control"  name="username">
      
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password :</label>
      <input type="password" class="form-control"  name="password">
    </div>
    
    <button  name="submit" class="btn btn-primary" style="width: 375px;margin-top: 10px;">SING IN</button>
    
   
  </form>
</div>
    </div>
    <div class="col-lg-5  col-sm-12 mt-1">
        <img src="static/img/logoforkurd.png" height="300" width="400"style="float:right; margin-top: 170px; "  />
      
    </div>
</div>
</div>
<br>
<br>
  
 <?php
if(isset($conn)){
mysqli_close($conn);
}
?>

</body>
</html>
