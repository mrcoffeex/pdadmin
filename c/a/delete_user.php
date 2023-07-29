<?php
  require_once '../../config/includes.php';
  require_once 'session.php';

  $redirect=@$_GET['cd'];

  $delete_data=$link->query("DELETE FROM `um_user` Where `um_user_id`='$redirect'");

  if ($delete_data) {
    header("location: users?note=delete");
  }else{
    header("location: users?note=error");
  }
?>