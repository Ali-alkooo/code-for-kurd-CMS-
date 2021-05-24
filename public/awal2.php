<?php session_start(); ?>
<?php 

if (isset($_GET["tut"])){
    $tut_id_selected=$_GET["tut"];
}
else { 
$tut_id_selected=null;
  }



include_once('../includes/session.php');
include_once('../includes/cnnectdb.php');



$query="SELECT * FROM `website_bnavbar` WHERE `visible`=1"; 
$result =mysqli_query($conn, $query); 
if(mysqli_num_rows($result)>0) { 


?>

<!DOCTYPE html>

<html >
<head>
    <meta charset="utf-8" />
    <title>second</title>
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
  
        .alkoo {
            background: linear-gradient(to left, #fc5c7d, #6a82fb);
        }
        .center2 {
            color: #85C1E9;

        }
        .center1 {
            font-size: 35px;
            
            padding-top: 15px;
            padding-bottom: 10px;
        }

        .img1, .img2 {
            margin: 20px;
            border: 2px solid;
        }

            .img1:hover {
                box-shadow: 10px 10px 5px lightblue;
                height: 110px;
                width: 45%;
            }

        .card1 {
            color: #85C1E9;
            height: 505px;
            overflow: auto;
        }

        .psht {
            background: linear-gradient(to left, #6a82fb, #6a82fb);
        }
       
    </style>
</head>
<body style="    background: linear-gradient(to left, #fc5c7d, #000c40);">
    <nav class="navbar navbar-expand-lg navbar-dark  alkoo">
        <div class="container-fluid">
            <a class="navbar-brand" href="awal.php"> CODE 4 KURD </a>
            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php 
                    while ($row =mysqli_fetch_assoc($result)) {                                 
                    $query1="SELECT * FROM `pages` WHERE `visible`=1 
                    AND `pages`.`item_name_id`=".$row["id"];
                    $result1=mysqli_query($conn,$query1);
                    if (mysqli_num_rows($result1)>0){
                        echo'
                        <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle"                          
                        data-bs-toggle="dropdown"
                         href=""> 
                        '.$row["item_name"].'
                      </a> ';                                           
                    }
                      else {
                        echo '<li class="nav-item  active">
                        <a class="nav-link " href="awal.php?menu='.$row['id'].'" > '
                      .$row["item_name"]
                      ."</a> "; 
                      }
                    echo"<div class='dropdown-menu' aria-labelledby='dropdown01'>";
                    while ($row1 =mysqli_fetch_assoc($result1)) {
                    echo  "<a class='dropdown-item' href=manage_content.php?page="
                    .$row1["id"].">".$row1["page_name"]."</a>";                        
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
                <div class="col-lg-3  col-sm-12 mt-2">
                    <div class=" ">
                        <div class="card-header psht" style="color:azure;">
                            <h4> <i class="fab fa-buffer"></i> Our lesson's </h4>
                        </div>
                        
                        <div class="card-body card1 " style="text-align: center;background: rgba(255, 255, 255, 0.00); box-shadow:0 5px 15px rgba(0,0,0,.25);">
                        <?php 
                        
                        $query="SELECT * FROM `page_tutorials` "; 
                        $result =mysqli_query($conn, $query); 
                        if(mysqli_num_rows($result)>0) { 
                        while ($row =mysqli_fetch_assoc($result)) {   

                         ?>
                       <div class="d-grid gap-2">
                                <a href="awal2.php?tut=<?php echo $row["id"]; ?>"  class="btn btn-primary" type="button"><?php echo $row["name_content"]; ?></a>
                            </div>
                            <hr>
                            <?php }}?>
                        </div>
                    </div>
                </div>



                <div class="col-lg-9 col-sm-12	 mt-2 ">
                <?php 
if ($tut_id_selected){
?>
                <?php $query="SELECT * FROM `page_tutorials` WHERE `id`=".$tut_id_selected; 
                        $result =mysqli_query($conn, $query); 
                        if(mysqli_num_rows($result)>0) { 
                        while ($row =mysqli_fetch_assoc($result)) {   

                         ?>


                    <div class=" ">
                        <div class="card-header psht" style="color:azure ; ">
                            <h4>   <?php echo $row["name_content"]; ?> </h4>
                        </div>

                        <div class="card-body card1" style="text-align: center;background: rgba(255, 255, 255, 0.00); box-shadow:0 5px 15px rgba(0,0,0,.25);">
                        <P style="font-size: 22px;">
                           <?php echo $row["content"];  ?>
                           </P>
                           <img  src="<?php echo $row["img"]; ?>" height="300" width="300" />
                        </div>
                    </div>

                    <?php }}?>
                </div>
<?php } else { ?>
    
              
                </div>
    <?php }?>

            </div>

        </div>

    

    <footer class="alkoo text-white  mt-3">

        <center class="center1">

            <h5> © 2021 Copyright:  <a class="text-white" href="https://mdbootstrap.com/">CODE 4 KURD</a></h5>



            <button class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
            </button>

            <button class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-google"></i>
            </button>
            <button class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-whatsapp"></i>
            </button>
            <button class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-youtube"></i>
            </button>


        </center>
    </footer>

    <?php 


include_once('../includes/layout/footer.php');
?>
</body>
</html>
