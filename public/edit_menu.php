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
    <title>edit Menu</title>
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
      <a style="color:white;" href="edit_menu.php?menu=<?php echo mysqli_real_escape_string($conn,$row["id"]);?>"><h4> <?php echo mysqli_real_escape_string($conn,$row["item_name"]);?></h4></a>
      <?php
      $query1="SELECT * FROM `pages` WHERE `pages`.`item_name_id`=".mysqli_real_escape_string($conn,$row["id"]);
                    $result1=mysqli_query($conn,$query1);
                    if (mysqli_num_rows($result1)>0){
                        while ($row1 =mysqli_fetch_assoc($result1)) {
                        ?>
                        <ul>
                            <li> 
        <a style="color:white;"  href="edit_menu.php?page=<?php echo mysqli_real_escape_string($conn,$row1["id"]);?>"> <?php echo mysqli_real_escape_string($conn,$row1["page_name"]);?></a>
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

      </div> <!-- نهاية كونتينيور الاول -->
      <div class="col-lg-10  col-sm-12 mt-3">
    <?php  echo msg();?>  
    <?php  $errors=err(); ?>
    <?php  error_function($errors); ?>
    <?php if($menu_id_selected){ 
      $_SESSION["id"]=$menu_id_selected;
      ?>
    <div class=" ">
    <div class="card-header psht" style="color:azure;">

    


    <h5>  
    <i class="fa fa-plus-square" aria-hidden="true" style="color: white;"></i> 
       Edit Menu :

   </h5>
    </div>
     <div class="card-body " style="color:white;background: 
     rgba(255, 255, 255, 0.00); box-shadow:0 5px 15px rgba(0,0,0,.25);">
            
   
 <form method="post" action="edit_menu_submit.php">
 <?php 
 
 $query="SELECT * FROM `website_bnavbar` WHERE `id`=".$menu_id_selected; 
$result =mysqli_query($conn, $query); 
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_assoc($result))
    {
 ?>
  <div class="mb-3">
    <label for="text" class="form-label" style="color:white;">Menu Name: <?php echo $row["item_name"] ?>  </label>
    <input type="text" class="form-control" id="exampleInputEmail1" 
    aria-describedby="emailHelp" name="menu" value="<?php echo $row["item_name"] ?>">
  </div>
   
  <div class="form-group mb-3">
  <div class="radio">
<label for="text">Visible :</label><br>
<?php if ($row["visible"]==1){ ?>
  <label><input type="radio" name="optradio" value="1" style="margin-top: 10px;" checked>Yes</label>
  <label><input type="radio" name="optradio" value="0" style="margin-left: 10px;">No</label>
<?php }  else {?>
  <label><input type="radio" name="optradio" value="1" style="margin-top: 10px;" >Yes</label>
  <label><input type="radio" name="optradio" value="0" style="margin-left: 10px;" checked>No</label>
<?php }?>
</div>
</div>
<div class="mb-3">
<label for="exampleInputEmail1" class="form-label" style="color:white;">Rank : <?php echo $row["rank"] ?> </label>
  <select class="form-select" name="rank">
  <?php }}?>
      <option selected>Choose...</option>
      <?php 
$query="SELECT rank FROM `website_bnavbar`"; 
$result =mysqli_query($conn, $query); 
$row_cnt=mysqli_num_rows($result);
 for($i=1;$i<=$row_cnt+1;$i++){
?>
    <option value="<?php echo $i; ?>"><?php echo $i;?></option>
<?php
}
?>
  </select>
</div>
<button type="submit" class="btn btn-primary mt-3" name="submit"> Save </button>
</form>

  </div>
   </div>
<?php } ?>

<?php 

if($page_id_selected){
$_SESSION["id"]=$page_id_selected;
$query="SELECT * FROM `pages` WHERE `id`=".$page_id_selected; 
$result =mysqli_query($conn,$query); 
if(mysqli_num_rows($result)>0)
  {
while($row=mysqli_fetch_assoc($result))
  {
    ?>
 <div class=" ">
    <div class="card-header psht" style="color:azure;">

    


    <h5>  
    <i class="fas fa-edit" aria-hidden="true" style="color: white;"></i> 
       Edit Page :

   </h5>
    </div>
     <div class="card-body " style="color:white;background: 
     rgba(255, 255, 255, 0.00); box-shadow:0 5px 15px rgba(0,0,0,.25);">
            
 <form method='post' action='edit_page_submit.php' enctype='multipart/form-data'>

    
<div class='form-group'>
<label for='sel1'>ID Page Name  :<?php echo $row["id_page_name"]; ?></label>

<select class='form-control' id='sel1' name='id_page_name'>


<?php 
$query1="SELECT `id_page_name` FROM `pages` "; 

$result1 =mysqli_query($conn, $query1); 
$row_cnt=mysqli_num_rows($result1);
 for($i=1;$i<=$row_cnt+1;$i++){

 echo "<option value=".$i."'>".$i."</option>";
 }
 ?>
</select>
 </div>




 <div class=" mb-3">

<label for="exampleInputEmail1" class="form-label" style="color:white;">Image : <br/> <img src="<?php echo $row['img'];?>" height = "100" width ="100" /></label>

  <input type="file" class="form-control" name="upload" >
</div>
 <div class='form-group'>
<label for='text'> Page Name: {<?php echo $row["page_name"];?>}</label>
<div class='input-group'>

<span class='input-group-addon'> <i class='glypgicon glypgicon-user'></i></span>
<input id='text type' class='form-control' name='page' value= <?php echo  $row["page_name"];?> />
</div>
</div>
<br>
<div class='form-group'>
<div class='radio'>
<label for='text'>Visible :</label> <br>
<?php if($row["visible"]==1){?>
 <label><input type='radio' name='optradio' value='1' checked>Yes</label>
  <label><input type='radio' name='optradio' value='0'>No</label>
 
  <?php }
   else{ ?>
 <label><input type='radio' name='optradio' value='1' >Yes</label>
 <label><input type='radio' name='optradio' value='0' checked>No</label>
 <?php } ?>
</div>
</div>

<div class='form-group'>
<div class='radio'>
<label for='text'>Status :</label> <br>
<?php if($row["status"]==1){ ?>
 <label><input type='radio' name='optradio1' value='1' checked>Yes</label>
  <label><input type='radio' name='optradio1' value='0'>No</label>
  <?php }
   else{ ?>
  <label><input type='radio' name='optradio1' value='1' >Yes</label>
  <label><input type='radio' name='optradio1' value='0' checked>No</label>
  <?php } ?>
</div>
</div>

<div class='form-group mt-2'>
  <label for='comment'>Content :</label>
  <textarea class='form-control' rows='5' name='content'><?php echo $row["content"]; ?></textarea>
</div>
    
<div class='form-group'>
<label for='sel1'>Rank:<?php echo $row["rank"]; ?></label>

<select class='form-control' id='sel1' name='rank'>


<?php 
$query1="SELECT `rank` FROM `pages` WHERE `item_name_id`=".$row["item_name_id"]; 

$result1 =mysqli_query($conn, $query1); 
$row_cnt=mysqli_num_rows($result1);
 for($i=1;$i<=$row_cnt+1;$i++){

 echo "<option value=".$i."'>".$i."</option>";
 }
 ?>
</select>
 </div>

 <div class='checkbox'>
<?php 
 $query2="SELECT `id`,`item_name` FROM `website_bnavbar`";
 $result2=mysqli_query($conn, $query2);
 if(mysqli_num_rows($result2)>0){
 while($row2=mysqli_fetch_assoc($result2)){
 if($row2["id"]==$row["item_name_id"]){

  echo"  <lable>  <input type='checkbox' name='checkbox'checked";
} 
  else {
  
  echo"  <lable>   <input type='checkbox' name='checkbox' ";
  }
  
   echo" value='{$row2["id"]}'> {$row2["item_name"]} </lable> &nbsp;&nbsp;";
  }
  }
  echo"</div>";
   }
   ?>

<button type='submit' class='btn btn-primary mt-2' name='submit'>SAVE</button>
 </form>
  </div>
   </div>
   <?php 
    }
  }
?>
    </div> <!-- نهاية الكونتينيور -->
    
    
    </div>
    </div>




 



<?php 


include_once('../includes/layout/footer.php');
?>
</body>
</html>
