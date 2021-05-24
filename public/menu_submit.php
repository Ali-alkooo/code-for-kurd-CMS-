<?php session_start(); ?>
<?php
include_once('../includes/functions.php');
include_once('../includes/session.php');
include_once('../includes/cnnectdb.php');
login_check();
if(isset($_POST["submit"])){
$menu=$menu= checkLength(checkEmpty(checkInput($_POST["menu"])),12,4);
$optradio=(int)$_POST["optradio"];
$rank=(int)$_POST["rank"];
$menu2=mysqli_real_escape_string($conn,$menu);




if(!empty($errors)){
$_SESSION['errors']=$errors;
redirect('create_menu.php');
}
$sql="INSERT INTO `website_bnavbar`(`item_name`, `rank`, `visible`) VALUES 
('{$menu2}','{$rank}','{$optradio}')";
if(mysqli_query($conn,$sql)&& mysqli_affected_rows($conn)>0){
$_SESSION['msg']=success_msg();
redirect("as.php");
}else{
$_SESSION['msg']=error_msg();
redirect("as.php");
}
} else{
redirect("as.php");

}





?>