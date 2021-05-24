<?php session_start(); ?>
<?php 

include_once('../includes/functions.php');
include_once('../includes/session.php');
include_once('../includes/cnnectdb.php');
login_check();

if (isset($_GET["user"])){
    $user_id_selected=urlencode($_GET["user"]);
    }else{
    $user_id_selected=null;
    
    }
        ?>
        
<!DOCTYPE html>

<html >
<head>
    <meta charset="utf-8" />
    <title>users manage</title>
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
     .h1_admins{
        background-color:
         blue; color:white;
        padding:10px;
     }
       .btn-home{
        margin-left: 800px;
        margin-bottom:5px;
       }

      label{
          color: white;
      }
    </style>
</head>

<body class ="body_mc">
    

  <div class="container">
  <div class="row">
    <div class="col-lg-12  col-sm-12 ">
  
 
  <h1 class="h1_admins"  >  Manage Users <i class="fas fa-users"></i> <a type="button" class="btn btn-dark btn-home" href="manage_content.php" > Home <i class="fas fa-home"></i> </a> </h1>

  </div>
 </div>

<div class="row">
 <div class="col-lg-12  col-sm-12 ">

    <?php  echo msg();?>  
    <?php  $errors=err(); ?>
    <?php  error_function($errors); ?>






 <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"> User Information <i class="fas fa-user-cog"></i>  </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Add User  <i class="fas fa-user-plus"></i></button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Edit User  <i class="fas fa-user-edit"></i></button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="delete-tab" data-bs-toggle="tab" data-bs-target="#delete" type="button" role="tab" aria-controls="Delete" aria-selected="false">Delete User <i class="fas fa-user-times"></i></button>
  </li>
</ul>


<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="color: white;">
  <br>
  <h2>Users Information <i class="fas fa-user-cog"></i> </h2> 
        <p>users information according to database:</p>
        <table class="table table-bordered" style="color: white;">
        <thead >
            <tr >
                <th >ID</th>
                <th >User Name</th>
                 <th >Firs Name</th >
                 <th >Last Name</th>
                 <th >Email</th>
                 <th >Phone Number</th>
                 <th >Date</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql="SELECT * FROM `users`";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
           ?>
             <tr>
                 <th ><?php echo htmlentities($row["id"]); ?></th>
                <th ><?php echo htmlentities($row["user_name"]); ?></th>
                 <th ><?php echo htmlentities($row["first_name"]); ?></th>
                 <th ><?php echo htmlentities($row["last_name"]); ?></th>
                 <th ><?php echo htmlentities($row["email_address"]); ?></th>
                 <th ><?php echo htmlentities($row["phone_number"]); ?></th>
                 <th ><?php echo htmlentities($row["date"]); ?></th>
            </tr>
            <?php }} ?>
        </tbody>
    </table>


  </div>


  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<br>
  <h2 style="color: white;">ADD Users <i class="fas fa-user-plus"></i> </h2> 

  <form method="post" action="suers_new.php" style="width: 500px; margin-left:100px">
<div class="form-group mt-3">
<label for="text">User Name:</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input id="text" type="text" class="form-control" name="username" placeholder="User Name">
  </div>
 </div>
<div class="form-group mt-3">
<label for="text">Passwoed:</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input id="text" type="password" class="form-control" name="password" placeholder="Passwoed">
</div>
</div>
<div class="form-group mt-3">
<label for="text">First Name:</label>
<div class="input-group ">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input id="text" type="text" class="form-control" name="firstname" placeholder="First Name">
</div>
</div>
<div class="form-group mt-3">
<label for="text">Last Name:</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input id="text" type="text" class="form-control" name="lastname" placeholder="Last Name">
</div>
</div>
<div class="form-group mt-3">
<label for="text">Email:</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input id="text" type="text" class="form-control" name="email" placeholder="Email">
</div>
</div>
<div class="form-group mt-3">
<label for="text">Phone Number:</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input id="text" type="text" class="form-control" name="phone" placeholder="Phone Number">
</div>
</div>
<br>
<button type="submit" class="btn btn-primary" name="submit" style="margin-left:40%;" >Save</button>

</form>
  </div>

  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  <br>
  <h2 style="color: white;">Edit Users <i class="fas fa-user-edit"></i> </h2> 
<br>
<div  style="width:150px;float:left;border:groove;text-align:center;border-color:blue;padding:10px;margin-top:10px;">
 
        <?php
        $query1="SELECT * FROM `users`";
        $result1=mysqli_query($conn,$query1);
        if(mysqli_num_rows($result)>0){
         while($row1=mysqli_fetch_assoc($result1)){ ?>
        <ul class="list-group">
        <li class="list-group-item  mb-3" ><a  href="users_manage.php?user=<?php echo mysqli_real_escape_string($conn,$row1["id"]); ?>"><?php echo mysqli_real_escape_string($conn,$row1["user_name"]); ?> </a></li>

          

        </ul>

          <?php  }}  ?>
 </div>

         <?php 
             
            if($user_id_selected){
            $_SESSION['id']=$user_id_selected;
                   
         $sql="SELECT * FROM `users` WHERE id=".$user_id_selected;
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
            ?>
<form method="post" action="users_edit.php" style="margin-left: 200px;width:450px;">
<div class="form-group">
<label for="text">User Name:</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input id="text" type="text" class="form-control" name="username" placeholder="User Name" value="<?php echo htmlentities($row["user_name"]); ?>">
</div>
</div >
<div class="form-group mt-2">
<label for="text">Passwoed:</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input id="text" type="text" class="form-control" name="password" placeholder="Password" value="<?php echo htmlentities($row["password"]); ?>">
</div>
</div>
<div class="form-group mt-2">
<label for="text">First Name:</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input id="text" type="text" class="form-control" name="firstname" placeholder="First Name" value="<?php echo htmlentities($row["first_name"]); ?>">
</div>
</div>
<div class="form-group mt-2">
<label for="text">Last Name:</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input id="text" type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?php echo htmlentities($row["last_name"]); ?>">
</div>
</div>
<div class="form-group mt-2">
<label for="text">Email:</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input id="text" type="text" class="form-control" name="email" placeholder="Email" value="<?php echo htmlentities($row["email_address"]); ?>">
</div>
</div>   

<div class="form-group mt-2">
<label for="text">Phone Number:</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input id="text" type="text" class="form-control" name="Phone" placeholder="Phone Number" value="<?php echo htmlentities($row["phone_number"]); ?>" >
</div>
</div>



<button type="submit" class="btn btn-primary mt-3" name="submit" style="margin-left:210px;">Save</button>
</form>
<?php
        }}}
        ?>

</div>








  <div class="tab-pane fade" id="delete" role="tabpanel" aria-labelledby="delete-tab" style="color: white;">
<br>
<h2>Delete Users <i class="fas fa-user-times"></i> </h2> 
  <table class="table table-bordered" style="color: white;">
<thead >
            <tr >
                <th >ID</th>
                <th >User Name</th>
                 <th >Firs Name</thstyle="border:groove">
                 <th >Last Name</th>
                 <th >Email</th>
                 <th >Phone Number</th>
                 <th >Date</th>
                <th >Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql="SELECT * FROM `users`";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
           ?>
             <tr>
             <th ><?php echo htmlentities($row["id"]); ?></th>
                <th ><?php echo htmlentities($row["user_name"]); ?></th>
                 <th ><?php echo htmlentities($row["first_name"]); ?></th>
                 <th ><?php echo htmlentities($row["last_name"]); ?></th>
                 <th ><?php echo htmlentities($row["email_address"]); ?></th>
                 <th ><?php echo htmlentities($row["phone_number"]); ?></th>
                 <th ><?php echo htmlentities($row["date"]); ?></th>
                 <th ><a type="button" class="btn btn-danger" href="User_delete.php?id=<?php echo mysqli_real_escape_string($conn,$row["id"]); ?>">Delete</a></th>
            </tr>
            <?php }} ?>
           
        </tbody>
    </table>





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