<?php
	require_once '../../config/includes.php';
  require_once 'session.php';

  $redirect=@$_GET['cd'];

  if (isset($_POST['mydocname'])) {
    
    $mydocname=words($_POST['mydocname']);
    $myrate=words($_POST['myrate']);

    $update_data=$link->query("UPDATE `um_request_type` SET `um_reqtype_name`='$mydocname',
                                                    `um_reqtype_rate`='$myrate' Where `um_reqtype_id`='$redirect'");

    if ($update_data) {
      header("location: documents?note=updated");
    }else{
      header("location: documents?note=error");
    }
  }
?>