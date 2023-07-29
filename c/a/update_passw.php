<?php
	require_once '../../config/includes.php';
  require_once 'session.php';

  $redirect=@$_GET['cd'];

  if (isset($_POST['update'])) {
    
    $newpassw=words($_POST['newpassw']);

    $gen_passw=encryptIt($newpassw);

    $update_data=$link->query("UPDATE `um_user` SET `um_password`='$gen_passw' Where `um_user_id`='$redirect'");

    if ($update_data) {
      header("location: users?note=updated");
    }else{
      header("location: users?note=error");
    }
  }
?>