<?php session_start(); ?>
<?php

include_once('../includes/functions.php');
include_once('../includes/session.php');
include_once('../includes/cnnectdb.php');

$_SESSION['admin_id']=null;
$_SESSION['admin_username']=null;

  redirect('login.php');

?>