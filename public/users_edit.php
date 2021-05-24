<?php session_start(); ?>
<?php
include_once('../includes/functions.php');
include_once('../includes/session.php');
include_once('../includes/cnnectdb.php');
login_check();

if(isset($_POST["submit"]))
{

$id=$_SESSION["id"];
$id1=(int)$id;
$firstname=mysqli_real_escape_string($conn,checkEmptyPage(checkInput($_POST["firstname"])));
$lastname=mysqli_real_escape_string($conn,checkEmptyPage(checkInput($_POST["lastname"])));
$username=mysqli_real_escape_string($conn,checkEmptyPage(check_input_admin($_POST["username"])));
$email=mysqli_real_escape_string($conn,checkEmptyPage(check_input_admin($_POST["email"])));
$phone=mysqli_real_escape_string($conn,checkEmptyPage(check_input_admin($_POST["Phone"])));
$password=mysqli_real_escape_string($conn,checkEmptyPage(check_input_admin($_POST["password"])));

 $password1=password_hash($password,PASSWORD_BCRYPT);
if(!empty($errors)){
$_SESSION['errors']=$errors;
redirect('users_manage.php');
}

$sql="UPDATE `users` SET 
`first_name`='{$firstname}',`last_name`='{$lastname}',`user_name`='{$username}',
`email_address`='{$email}',`password`='{$password1}',`phone_number`='{$phone}' WHERE `id`={$id1}";


if(mysqli_query($conn,$sql)&& mysqli_affected_rows($conn)>0){
$_SESSION['msg']=update_success_msg_admin();
redirect("users_manage.php");
}else{
$_SESSION['msg']=update_fail_msg_admin();
redirect("users_manage.php");
}
}else{
redirect("users_manage.php");

}


?>