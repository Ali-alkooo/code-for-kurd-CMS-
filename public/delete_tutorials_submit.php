<?php session_start(); ?>
<?php
include_once('../includes/functions.php');
include_once('../includes/session.php');
include_once('../includes/cnnectdb.php');
login_check();

$id_menu=mysqli_real_escape_string($conn,$_GET["tutorials"]);
$id1=(int)$id_menu;
if(!empty($errors)){
$_SESSION['errors']=$errors;
redirect("delete_tutorials.php");
}


$sql="DELETE FROM `page_tutorials` WHERE `id`=".$id1;
$result=mysqli_query($conn,$sql);

if($result && mysqli_affected_rows($conn)>0){
$_SESSION['msg']=success_delete_msg();
redirect("as.php");
}
else {

$_SESSION['msg']=fail_delete_msg();
redirect("delete_tutorials.php");

}













?>