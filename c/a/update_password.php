<?php
	require_once '../../config/includes.php';
  	require_once 'session.php';

  	if (isset($_POST['submit_profile'])) {
  		$old_p = words($_POST['old_p']);
  		$new_p = words($_POST['new_p']);
  		$confirm_new_p = words(encryptIt($_POST['confirm_new_p']));

      if ($row['um_password'] == encryptIt($old_p)) {

        $update_data=$link->query("UPDATE `um_user` SET `um_password`='$confirm_new_p' Where `um_user_id`='$user_id'");

        if ($update_data) {
          header("location: profile?note=password_update");
        }else{
          header("location: profile?note=error");
        }

      }else{
        header("location: profile?note=nomatch");
      }
  	}
?>