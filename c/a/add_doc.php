<?php
	require_once '../../config/includes.php';
  require_once 'session.php';

  if (isset($_POST['mydocname'])) {
    
    $mydocname=words($_POST['mydocname']);
    $myrate=words($_POST['myrate']);

    $insert_data=$link->query("INSERT `um_request_type`(`um_reqtype_name`,`um_reqtype_rate`) Values('$mydocname','$myrate')");

    if ($insert_data) {
      header("location: documents?cd=added");
    }else{
      header("location: documents?cd=error");
    }
    
  }
?>