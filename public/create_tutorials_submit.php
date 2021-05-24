<?php session_start(); ?>
<?php
include_once('../includes/functions.php');
include_once('../includes/session.php');
include_once('../includes/cnnectdb.php');
login_check();
if(isset($_POST["submit"])){
    $name_content=$name_content= checkLength(checkEmpty(checkInput($_POST["name_content"])),12,4);
    $page_name_id=(int)$_POST["page_name_id"];
    $content=check_content($_POST["content"]);
    $name_content2=mysqli_real_escape_string($conn,$name_content);
    $content=mysqli_real_escape_string($conn,$content);
    
    $filename = $_FILES["upload"]["name"];
    $temp = $_FILES["upload"]["tmp_name"];
    $folder = "static/img/".$filename;  
    move_uploaded_file($temp,$folder);
    
    if(!empty($errors)){
    $_SESSION['errors']=$errors;
    redirect('create_tutorials.php');
    }
    $sql="INSERT INTO `page_tutorials`(`name_content`, `page_name_id`, `content`,`img`) VALUES 
    ('{$name_content2}','{$page_name_id}','{$content}','{$folder}')";
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