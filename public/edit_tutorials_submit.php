<?php session_start(); ?>
<?php
include_once('../includes/functions.php');
include_once('../includes/session.php');
include_once('../includes/cnnectdb.php');
login_check();

if(isset($_POST["submit"])){
    $id=$_SESSION['id'];
    $id1=(int)$id;
    $name_content=$name_content= checkLength(checkEmpty(checkInput($_POST["name_content"])),12,4);
    $content=check_content($_POST["content"]);
    $name_content2=mysqli_real_escape_string($conn,$name_content);
    $content=mysqli_real_escape_string($conn,$content);
    
    $filename = $_FILES["upload"]["name"];
    $temp = $_FILES["upload"]["tmp_name"];
    $folder = "static/img/".$filename;  
    move_uploaded_file($temp,$folder);

    if(!empty($errors)){
        $_SESSION['errors']=$errors;
        redirect('edit_tutorials.php');
        }
        $sql="UPDATE `page_tutorials` SET `name_content`='{$name_content2}',`content`='{$content}',
        `img`='{$folder}'  WHERE `id`=".$id1;    
        if(mysqli_query($conn,$sql)&& mysqli_affected_rows($conn)>0){
        $_SESSION['msg']=success_update_msg();
        redirect("as.php");
        }else{
        $_SESSION['msg']=fail_update_msg();
        redirect("edit_tutorials.php");
        }
        
        }
        else{
        redirect("edit_tutorials.php");
        
        }

?>