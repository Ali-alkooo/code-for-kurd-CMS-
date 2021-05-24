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
$page= checkEmptyPage(checkInput($_POST["page"]));
$opteadio=(int)$_POST["optradio"];
$opteadio1=(int)$_POST["optradio1"];
$checkbox=(int)$_POST["checkbox"];
$rank=(int)$_POST["rank"];
$id_page_name=(int)$_POST["id_page_name"];
$content=check_content($_POST["content"]);
$page2=mysqli_real_escape_string($conn,$page);
$content=mysqli_real_escape_string($conn,$content);

$filename = $_FILES["upload"]["name"];
$temp = $_FILES["upload"]["tmp_name"];
$folder = "static/img_up/".$filename;
move_uploaded_file($temp,$folder);



if(!empty($errors)){
$_SESSION['errors']=$errors;
redirect('edit_menu.php');
}




$sql="UPDATE `pages` SET `item_name_id`={$checkbox},
`page_name`='{$page2}',`content`='{$content}',
`rank`={$rank},`visible`={$opteadio},`status`={$opteadio1} ,
`img`='{$folder}' ,`id_page_name`={$id_page_name} WHERE `id`=".$id1;



if(mysqli_query($conn,$sql)&& mysqli_affected_rows($conn)>0){
$_SESSION['msg']=success_update_msg();
redirect("as.php");
}else{
$_SESSION['msg']=fail_update_msg();
redirect("edit_menu.php");
}

}
else{
redirect("edit_menu.php");

}


?>