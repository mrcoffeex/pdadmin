<?php
	require_once '../../config/includes.php';
  	require_once '_session.php';

  	if (isset($_POST['oldPassword'])) {

  		$oldPassword = clean_string($_POST['oldPassword']);
  		$newPassword = clean_string($_POST['newPassword']);
  		$newPassword2 = clean_string($_POST['newPassword2']);

      if ($row['user_password'] == md5($oldPassword)) {

        if ($newPassword == $newPassword2) {
            $encPassword = clean_string(md5($newPassword2));
            $request = updateUserPassword($encPassword, $userId);

            if ($request == true) {
                header("location: profile?note=password_update");
            }else{
                header("location: profile?note=error");
            }
        } else {
            header("location: profile?note=nomatch");
        }

      }else{
            header("location: profile?note=nomatch");
      }
  	}
?>