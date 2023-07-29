<?php
	require_once '../../config/includes.php';
  require_once 'session.php';

  $redirect=@$_GET['cd'];

  if (isset($_POST['myidnum'])) {
    
    $myidnum=words($_POST['myidnum']);
    $myemail=words($_POST['myemail']);
    $myfullname=words($_POST['myfullname']);
    $mycontact=words($_POST['mycontact']);

    $update_data=$link->query("UPDATE `um_user` SET `um_user_code`='$myidnum',
                                                    `um_username`='$myemail',
                                                    `um_full_name`='$myfullname',
                                                    `um_user_contact`='$mycontact' Where `um_user_id`='$redirect'");

    if ($update_data) {
      header("location: users?note=updated");
    }else{
      header("location: users?note=error");
    }
  }
?>