<?php session_start(); ?>
<?php 

include_once('../includes/functions.php');
include_once('../includes/session.php');
include_once('../includes/cnnectdb.php');
login_check();
if (isset($_GET["menu"])){
$menu_id_selected=$_GET["menu"];
$page_id_selected=null;
}
elseif(isset($_GET["page"])){
    $page_id_selected=$_GET["page"];
    $menu_id_selected=null;
}
else {
    $menu_id_selected=null;
    $page_id_selected=null;
    }
?>



<!DOCTYPE html>

<html >
<head>
    <meta charset="utf-8" />
    <title>as</title>
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
          .psht{
              background-color:blue;
          }
   .body_mc{
    background: linear-gradient(to left, #fc5c7d, #000c40);
   }
     
       
    </style>
</head>

<body class ="body_mc">
    

<nav class="navbar navbar-expand-lg navbar-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="manage_content.php"> CODE 4 KURD </a>
            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"> </span>
            </button>
<?php $query="SELECT * FROM `website_bnavbar` WHERE `visible`=1"; 
$result =mysqli_query($conn, $query); 


if(mysqli_num_rows($result)>0) { 
?>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php 
                    while ($row =mysqli_fetch_assoc($result)) {                                 
                    $query1="SELECT * FROM `pages` WHERE `visible`=1 
                    AND `pages`.`item_name_id`=".mysqli_real_escape_string($conn,$row["id"]);
                    $result1=mysqli_query($conn,$query1);
                    if (mysqli_num_rows($result1)>0){
                        echo'
                        <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle"                          
                        data-bs-toggle="dropdown"
                         href=""> 
                        '.mysqli_real_escape_string($conn,$row["item_name"]).'
                      </a> ';                                           
                    }
                      else {
                        echo '<li class="nav-item  active">
                        <a class="nav-link " href="awal.php?menu='.mysqli_real_escape_string($conn,$row['id']).'" > '
                      .mysqli_real_escape_string($conn,$row["item_name"])
                      ."</a> "; 
                      }
                    echo"<div class='dropdown-menu' aria-labelledby='dropdown01'>";
                    while ($row1 =mysqli_fetch_assoc($result1)) {
                    echo  "<a class='dropdown-item' href=manage_content.php?page="
                    .mysqli_real_escape_string($conn,$row1["id"]).">".mysqli_real_escape_string($conn,$row1["page_name"])."</a>";                        
                    } 
                    echo"</li>";
                    }
                    }                    
                    mysqli_free_result($result);                    
                    ?>    
                                                      
                    </ul>
              
            </div>
        </div>
    </nav>




    <div class="container">
        <div class="row">
            <div class="col-lg-2  col-sm-12 mt-3">

  <div class="accordion" id="accordionExample">



<?php $query="SELECT * FROM `website_bnavbar` "; 
$result =mysqli_query($conn, $query); 
if(mysqli_num_rows($result)>0) { 
while ($row =mysqli_fetch_assoc($result)) {   

?>

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button btn-primary" type="button" data-bs-toggle="collapse" 
      data-bs-target="#collapseOne<?php echo mysqli_real_escape_string($conn,$row["id"]);?>" aria-expanded="true" aria-controls="collapseOne">
      <?php echo mysqli_real_escape_string($conn,$row["item_name"]);?>
      </button>
    </h2>
    <div id="collapseOne<?php echo mysqli_real_escape_string($conn,$row["id"]);?>" class="accordion-collapse collapse show" 
    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body" style="color:white;" >
      <a style="color:white;" href="as.php?menu=<?php echo mysqli_real_escape_string($conn,$row["id"]);?>"><h4> <?php echo mysqli_real_escape_string($conn,$row["item_name"]);?></h4></a>
      <?php
      $query1="SELECT * FROM `pages` WHERE `pages`.`item_name_id`=".mysqli_real_escape_string($conn,$row["id"]);
                    $result1=mysqli_query($conn,$query1);
                    if (mysqli_num_rows($result1)>0){
                        while ($row1 =mysqli_fetch_assoc($result1)) {
                        ?>
                        <ul>
                            <li> 
        <a style="color:white;"  href="as.php?page=<?php echo mysqli_real_escape_string($conn,$row1["id"]);?>"> <?php echo mysqli_real_escape_string($conn,$row1["page_name"]);?></a>
        </li>
    </ul>
<?php 
                        }
                    }


?>

      </div>
    </div>
  </div>
<?php
}
  }                    
 mysqli_free_result($result);  
?>
      </div> 

       </div>



    <div class="col-lg-10  col-sm-12 mt-3">         
    <div class=" ">
    <div class="card-header psht" style="color:azure;">
    <?php echo msg();  ?>
    <h5>  
   <?php 
   if ($menu_id_selected){

     $query="SELECT * FROM `website_bnavbar` WHERE id=".$menu_id_selected; 
    $result =mysqli_query($conn, $query); 
    if(mysqli_num_rows($result)>0) { 
    while ($row =mysqli_fetch_assoc($result)) {  
  echo $row["item_name"];
   }
}
} elseif($page_id_selected){
    $query1="SELECT * FROM `pages` WHERE id=".$page_id_selected;
    $result1=mysqli_query($conn,$query1);
    if (mysqli_num_rows($result1)>0){
        while ($row1 =mysqli_fetch_assoc($result1)) {
            echo $row1["page_name"];

            ?>  
   </h5>
    </div>
     <div class="card-body " style="color:white;background: 
     rgba(255, 255, 255, 0.00); box-shadow:0 5px 15px rgba(0,0,0,.25);">
            
    <?php 
    echo $row1["content"];
  ?> 

            </div>
<?php   }
}
}
   ?>
         </div>


    </div>


    </div>
    </div>
    </div>




 



<?php 


include_once('../includes/layout/footer.php');
?>
</body>
</html>
