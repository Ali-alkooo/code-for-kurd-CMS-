<?php
$errors=array();

function redirect($url){
header("Location: ".$url);
exit();
}
function success_msg(){
$msg ="<div class='alert alert-success alert-dismissible'>";
$msg.= "<a hrf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
$msg.= "<strog>Success!</strog> New record created successfully";
$msg.="</div>";
 return $msg;
}
function error_msg(){
$msg="<div class='alert alert-danger alert-dismissible'>";
$msg.="<a hrf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
$msg.="<strog>Error!</strog>"."".mysqli_error($conn).".";
$msg.="</div>";
return $msg;
}
function checkInput($option){
 $option=str_replace("_","",$option);
 $option=trim($option);
 $option=stripslashes($option);
 $option=htmlspecialchars($option);
 $option=ucfirst($option);
 return $option;
}
function checkLength($data,$max,$min){
global $errors;

if(strlen($data)<$min){
$errors['too short']="Input is too short,minimum is 4 characters(12max)";
}
else if (strlen($data)>$max){
$errors['too long']="Input is too long,maximum is 12 characters,";
}
else {
return $data;
}
}
function checkEmpty($data){
global $errors;
$data =trim($data);
if (isset($data)===true && $data==='')
{
$errors['empty']="empty filed !.";
}
else {
return $data;
}
}
function error_function($errors=array()){
    if(!empty($errors)){
  
    foreach($errors as $key => $value){
    
    echo"<div class='alert alert-danger alert-dismissible'>";
    echo"<a hrf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    echo"<strog>Wrong!</strog> {$key}=>{$value}.";
    echo"</div>";
    
    }

     }
     }
function success_update_msg(){
$msg ="<div class='alert alert-success alert-dismissible'>";
$msg.= "<a hrf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
$msg.= "<strog>Success!</strog> Record Updated successfully";
$msg.="</div>";
 return $msg;
}
function fail_update_msg(){
$msg ="<div class='alert alert-warning alert-dismissible'>";
$msg.= "<a hrf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
$msg.= "<strog>Warning!</strog> Sorry record not Updated.! ";
$msg.="</div>";
 return $msg;
}
function fail_delete_msg(){
$msg ="<div class='alert alert-warning alert-dismissible'>";
$msg.= "<a hrf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
$msg.= "<strog>Sorry !</strog>  You can not delete menu contain pages.! ";
$msg.="</div>";
 return $msg;
}
function success_delete_msg(){
$msg ="<div class='alert alert-success alert-dismissible'>";
$msg.= "<a hrf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
$msg.= "<strog>Success!</strog> Record deleted successfully";
$msg.="</div>";
 return $msg;
}
function checkEmptyPage($data){
 global $errors;
 if(isset($data)===true && $data===''){
 $errors['empty']="empty filed !.";
}
return $data;
}
function check_content($data){
  
$data=stripslashes($data);
$data=htmlspecialchars($data);
return $data;

}
function check_input_admin($data){
  
$data=str_replace("-","",$data);
$data=trim($data);
$data=stripslashes($data);
$data=htmlspecialchars($data);
return $data;

}
function success_msg_admin(){
$msg ="<div class='alert alert-success alert-dismissible'>";
$msg.= "<a hrf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
$msg.= "<strog>Success!</strog> Admin created successfully";
$msg.="</div>";
 return $msg;
}
function fail_msg_admin(){
$msg ="<div class='alert alert-warning alert-dismissible'>";
$msg.= "<a hrf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
$msg.= "<strog>Sorry!</strog> You can not create admin";
$msg.="</div>";
 return $msg;
}
function update_success_msg_admin(){
$msg ="<div class='alert alert-success alert-dismissible'>";
$msg.= "<a hrf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
$msg.= "<strog>Success!</strog> Admin updated successfully";
$msg.="</div>";
 return $msg;
}
function update_fail_msg_admin(){
$msg ="<div class='alert alert-warning alert-dismissible'>";
$msg.= "<a hrf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
$msg.= "<strog>Sorry!</strog> You can not update create admin";
$msg.="</div>";
 return $msg;
}
function delete_success_msg_admin(){
$msg ="<div class='alert alert-success alert-dismissible'>";
$msg.= "<a hrf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
$msg.= "<strog>Success!</strog> Admin deleted successfully";
$msg.="</div>";
 return $msg;
}
function delete_fail_msg_admin(){
$msg ="<div class='alert alert-warning alert-dismissible'>";
$msg.= "<a hrf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
$msg.= "<strog>Sorry!</strog> You can not delete admin";
$msg.="</div>";
 return $msg;
}
function login_success_msg(){
$msg ="<div class='alert alert-success alert-dismissible'>";
$msg.= "<a hrf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
$msg.= "<strog>Success!</strog> welcome ".$_SESSION['admin_username']." !";
$msg.="</div>";
 return $msg;
}
function login_fail_msg(){
$msg ="<div class='alert alert-warning alert-dismissible'>";
$msg.= "<a hrf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
$msg.= "<strog>Sorry!</strog> Check Username and Password..!";
$msg.="</div>";
 return $msg;
}
function login_check(){
 if(!isset($_SESSION['admin_id'])){
 redirect('login.php');
 }
}
error_function($errors);
?>





