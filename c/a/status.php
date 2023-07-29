<?php
	require_once '../../config/includes.php';
  require_once 'session.php';

  	$redirect = @$_GET['cd'];
    $temp = @$_GET['temp'];

    if ($temp == "process") {
      $status = "processing";
    }else if ($temp == "pickup") {
      $status = "pickup";
    }else if ($temp == "complete") {
      $status = "complete";
    }else{
      $status = "";
    }

    if ($status == "") {
      header("location: view?note=error");
    }

    $update_data=$link->query("UPDATE `um_order` SET `um_order_status`='$status' Where `um_order_ref`='$redirect'");

    if ($update_data) {
      //send sms
      if ($temp == "process") {
        $smsbody = "Your Order #".$redirect." is on process.";
      }else if ($temp == "pickup") {
        $smsbody = "Your Order #".$redirect." is ready for pick-up.";
      }else if ($temp == "complete") {
        $smsbody = "Your Order #".$redirect." transaction is complete.";
      }else{
        $smsbody = "";
      }

      $rec = "+63".get_phone_using_ref($redirect);

      include 'mysender.php';

      header("location: view?cd=$redirect&note=updated");
    }else{
      header("location: view?cd=$redirect&note=error");
    }
?>