<?php session_start(); ?>
<?php
include_once('../includes/functions.php');
include_once('../includes/session.php');
include_once('../includes/cnnectdb.php');

login_check();

$id_admin=mysqli_real_escape_string($conn,$_GET["id"]);
$id1=(int)$id_admin;


if(!empty($errors)){
$_SESSION['errors']=$errors;
redirect('admins_manage.php');
}

$sql="DELETE FROM `admins` WHERE `id`=".$id1;

$result=mysqli_query($conn,$sql);
if($result && mysqli_affected_rows($conn)>0){
$_SESSION['msg']=delete_success_msg_admin();
redirect("admins_manage.php");
}else{
$_SESSION['msg']=delete_fail_msg_admin();
redirect("admins_manage.php");
}
?>