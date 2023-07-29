<?php
	require_once '../../config/includes.php';
  require_once 'session.php';

  	$redirect = @$_GET['cd'];
    $stat = @$_GET['stat'];

    if ($stat == "approve") {
      $status = "1";
    }else{
      $status = "2";
    }

    $update_data=$link->query("UPDATE `um_student_record` SET `um_stu_status`='$status' Where `um_stu_id`='$redirect'");

    if ($update_data) {
      //send sms

      if ($stat == "approve") {
        $smsbody = "Hello ".get_fullname_stuid($redirect).", your id number validation request is approved.";
      }else{
        $smsbody = "Hello ".get_fullname_stuid($redirect).", your id number validation request is denied.";
      }

      $rec = "+63".get_phone_using_stu_id($redirect);

      include 'mysender.php';

      header("location: ./?note=done");
    }else{
      header("location: ./?note=error");
    }
?>