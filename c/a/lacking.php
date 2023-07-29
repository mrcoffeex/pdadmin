<?php
	require_once '../../config/includes.php';
  require_once 'session.php';

  	$redirect = @$_GET['cd'];

    if (isset($_POST['remarks'])) {

      $remarks = words($_POST['remarks']);

      $insert_data=$link->query("INSERT INTO `um_remarks`(`um_order_ref`, `um_rem_date`, `um_rem_text`) Values('$redirect','$datenow','$remarks')");

      if ($insert_data) {
        //send here
        $rec = "+63".get_phone_using_ref($redirect);
        $smsbody = $remarks.".";

        include 'mysender.php';

        header("location: view?cd=$redirect&note=added_remarks");
      }else{
        header("location: view?cd=$redirect&note=error");
      }
    }
?>