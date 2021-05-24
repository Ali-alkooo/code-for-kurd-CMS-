<?php session_start(); ?>
<?php
include_once('../includes/functions.php');
include_once('../includes/session.php');
include_once('../includes/cnnectdb.php');
login_check();
if (isset($_POST["submit"]))  {

    $firstname=mysqli_real_escape_string($conn,checkEmptyPage(checkInput($_POST["firstname"])));
    $lastname=mysqli_real_escape_string($conn,checkEmptyPage(checkInput($_POST["lastname"])));
    $username=mysqli_real_escape_string($conn,checkEmptyPage(check_input_admin($_POST["username"])));
    $email=mysqli_real_escape_string($conn,checkEmptyPage(check_input_admin($_POST["email"])));
    $phone=mysqli_real_escape_string($conn,checkEmptyPage(check_input_admin($_POST["phone"])));
    $password=mysqli_real_escape_string($conn,checkEmptyPage(check_input_admin($_POST["password"])));
       
   
    $password1=password_hash($password,PASSWORD_BCRYPT);
   
   
       if(!empty($errors)){
   $_SESSION['errors']=$errors;
   redirect('admins_manage.php');
   }
   
   $sql="INSERT INTO `users`(`user_name`, `password`, `first_name`, `last_name`, `email_address`, `phone_number`) VALUES 
   ('{$username}','{$password1}','{$firstname}','{$lastname}','{$email}','{$phone}')";
   
   if(mysqli_query($conn,$sql)&& mysqli_affected_rows($conn)>0){
   $_SESSION['msg']=success_msg_admin();
   redirect("users_manage.php");
   }else{
   $_SESSION['msg']=fail_msg_admin();
   redirect("users_manage.php");
   }
   }else{
   redirect("users_manage.php");
       
   
   
   }



?>