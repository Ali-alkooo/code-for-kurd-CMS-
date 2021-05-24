<?php session_start(); ?>
<?php
include_once('../includes/functions.php');
include_once('../includes/session.php');
include_once('../includes/cnnectdb.php');

login_check();
if(isset($_POST["submit"])){
    $id=$_SESSION["id"];
    $page= checkEmptyPage(checkInput($_POST["page"]));
    $opteadio=(int)$_POST["optradio"];
    $opteadio1=(int)$_POST["optradio1"];
    $rank=(int)$_POST["rank"];
    $id_page_name=(int)$_POST["id_page_name"];
    $content=check_content($_POST["content"]);
    $page2=mysqli_real_escape_string($conn,$page);
    $content=mysqli_real_escape_string($conn,$content);
    
    
    $filename = $_FILES["upload"]["name"];
    $temp = $_FILES["upload"]["tmp_name"];
    $folder = "static/img/".$filename;  
    move_uploaded_file($temp,$folder);
    
    
    
    if(!empty($errors)){
    $_SESSION['errors']=$errors;
    redirect('create_page.php');
    }
    
    
    $sql="INSERT INTO `pages`(`item_name_id`, `page_name`, `content`, `rank`, `visible`, `status`,`img`,`id_page_name`) VALUES
    ('{$id}','{$page2}','{$content}','{$rank}','{$opteadio}','{$opteadio1}','{$folder}' ,'{$id_page_name}')";
    
    if(mysqli_query($conn,$sql)&& mysqli_affected_rows($conn)>0){
    $_SESSION['msg']=success_msg();
    redirect("as.php");
    }else{
    $_SESSION['msg']=error_msg();
    redirect("create_page.php");
    }
    }
    else{
    redirect("create_page.php");
    
    }
    







?>