<?php session_start(); ?>
<?php 

include_once('../includes/functions.php');
include_once('../includes/session.php');
include_once('../includes/cnnectdb.php');
login_check();
?>



<!DOCTYPE html>

<html >
<head>
    <meta charset="utf-8" />
    <title>Manage Content</title>
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
           .head{
            padding: 20px;
         }
   .body_mc{
    background: linear-gradient(to left, #fc5c7d, #000c40);
   }
       .text{
           color: white;
       }
       .card1{
        text-align: center;background: rgba(255, 255, 255, 0.00); box-shadow:0 5px 15px rgba(0,0,0,.25);
       }
       
    </style>
</head>

<body class ="body_mc">
    <nav class="navbar navbar-expand-lg navbar-dark  alkoo">
        <div class="container-fluid">
            <a class="navbar-brand" href="manage_content.php"> CODE 4 KURD </a>
            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" > 
                            CREATE
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">JAVA</a></li>
                          <li><a class="dropdown-item" href="#">C++</a></li>
                          <li><a class="dropdown-item" href="#">PYTHON</a></li>
                          </ul>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" > 
                            EDIT
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">JAVA</a></li>
                          <li><a class="dropdown-item" href="#">C++</a></li>
                          <li><a class="dropdown-item" href="#">PYTHON</a></li>
                          </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"  aria-expanded="false">
                         DELETE
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">JAVA</a></li>
                          <li><a class="dropdown-item" href="#">C++</a></li>
                          <li><a class="dropdown-item" href="#">PYTHON</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"  aria-expanded="false">
                         SECURITY
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">JAVA</a></li>
                          <li><a class="dropdown-item" href="#">C++</a></li>
                          <li><a class="dropdown-item" href="#">PYTHON</a></li>
                        </ul>
                      </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"> About</a>
                    </li>
                </ul>
             <a href="logout.php" class="btn btn-primary btn-rounded"  style="margin-left: 800px;">  LogOut <i class="fas fa-sign-out-alt" aria-hidden="true" ></i>  </a>
               
            </div>
        </div>
    </nav>
  <header class="head">
    <div class="container">
        <div class="row">
            <div class="col-lg-4  col-sm-12 mt-1">
                
                <br>
                <h3 style="color: white;"> Welcom <?php echo htmlentities($_SESSION['admin_username']); ?> <br>in Control panel!   </h3> 
            </div>
            <div class="col-lg-4 col-sm-12 mt-1">
              <br>
                <h1 style="color: white;text-align: center;">Admin Area</h1>
                
                <h2 style="color: white;text-align: center;">  Manage Content  </h2>
            
        </div>
            <div class="col-lg-4 col-sm-12 mt-1">
                <img src="static/img/logoforkurd.png" height="150" width="250" style="float:right;" />
                
                
        </div>
    </div>
</div>
</div>

  </header>


  <div class="container mt-5">
    <div class="row" style="text-align: center;">
        <div class="col-lg-3  col-sm-12 mt-1">
            
        </div>
        <!------------------------------------------------------------->
        <div class="col-lg-2  col-sm-12 mt-1">
             <a href="create_menu.php">
            <div class="card card1">
        
                <div class="card-body " >
                     
                    
   <i class="fa fa-plus-square" aria-hidden="true" style="font-size: 80px;color: white;"></i>
                    
                    <hr style="color: white;" />
                    <h6 style="color: white;">  CREATE NEW MENU</h6>
                    </div>
            </div>  
        </a>
</div>
 <!------------------------------------------------------------->
<div class="col-lg-2  col-sm-12 mt-1">
<a href="edit_menu.php">
    <div class="card card1">
        
        <div class="card-body " >
   <i class="fas fa-edit" aria-hidden="true" style="font-size: 80px;color: white;"></i>

 <hr style="color: white;" />
    <h8 style="color: white;">  EDIT MENU & PAGE</h8>
       </div>
    </div>   
    </a>
</div>
 <!------------------------------------------------------------->
<div class="col-lg-2  col-sm-12 mt-1">
             
    <div class="card card1">
    <a href="delete_menu.php">
        <div class="card-body " >
             
            
            <i class="fas fa-trash" aria-hidden="true" style="font-size: 80px;color: white;"></i>

            <hr style="color: white;" />
            <h6 style="color: white;">  DELETE MENU & PAGE</h6>
            </div>
    </div>  
    </a>
</div>
 <!------------------------------------------------------------->

</div>
</div>
<div class="container mt-5">
    <div class="row" style="text-align: center;">
        <div class="col-lg-3  col-sm-12 mt-1">
             
        </div>
        <!------------------------------------------------------------->
        <div class="col-lg-2  col-sm-12 mt-1">
        <a href="create_page.php">
            <div class="card card1">
        
                <div class="card-body " >
                     
                    
                    <i class="far fa-plus-square" aria-hidden="true" style="font-size: 80px;color: white;"></i>

                    <hr style="color: white;" />
                    <h6 style="color: white;">  CREATE NEW PAGE</h6>
                    </div>
            </div>    
            </a>
</div>
 <!------------------------------------------------------------->
<div class="col-lg-2  col-sm-12 mt-1">
<a href="admins_manage.php"> 
    <div class="card card1">
        
        <div class="card-body " >
             
            
            
            <i class="fa fa-users" aria-hidden="true" style="font-size: 80px;color: white;"></i>
            <hr style="color: white;" />
            <h6 style="color: white;"> ADMINS</h6>
            </div>
    </div>   
</a>
</div>
 <!------------------------------------------------------------->
<div class="col-lg-2 col-sm-12 mt-1">
<a href="users_manage.php">     
    <div class="card card1">
        
        <div class="card-body " >
             
            
           
            <i class="fa fa-id-card" aria-hidden="true" style="font-size: 80px;color: white;"></i>
            <hr style="color: white;" />
            <h6 style="color: white;">  USERS </h6>
            </div>
    </div>  
</a>
</div>
 <!------------------------------------------------------------->

</div>
</div>

<!-- alkoo -->

<div class="container mt-5">
    <div class="row" style="text-align: center;">
        <div class="col-lg-3  col-sm-12 mt-1">
             
        </div>
        <!------------------------------------------------------------->
        <div class="col-lg-2  col-sm-12 mt-1">
        <a href="create_tutorials.php">
            <div class="card card1">
        
                <div class="card-body " >
                     
                    
                    <i class="far fa-plus-square" aria-hidden="true" style="font-size: 80px;color: white;"></i>

                    <hr style="color: white;" />
                    <h6 style="color: white;">  CREATE TUTORIALS</h6>
                    </div>
            </div>    
            </a>
</div>
 <!------------------------------------------------------------->
<div class="col-lg-2  col-sm-12 mt-1">
<a href="edit_tutorials.php"> 
    <div class="card card1">
        
        <div class="card-body " >
             
            
            
        <i class="fas fa-edit" aria-hidden="true" style="font-size: 80px;color: white;"></i>
            <hr style="color: white;" />
            <h6 style="color: white;"> EDIT TUTORIALS</h6>
            </div>
    </div>   
</a>
</div>
 <!------------------------------------------------------------->
<div class="col-lg-2 col-sm-12 mt-1">
<a href="delete_tutorials.php"> 
    <div class="card card1">
        
        <div class="card-body " >
             
            
           
        <i class="fas fa-trash" aria-hidden="true" style="font-size: 80px;color: white;"></i>
            <hr style="color: white;" />
            <h6 style="color: white;">  DELETE TUTORIALS</h6>
            </div>
    </div>  
</a>
</div>
 <!------------------------------------------------------------->

</div>
</div>


<br>

<!-- alkoo ->

<?php 


include_once('../includes/layout/footer.php');
?>

</body>
</html>
