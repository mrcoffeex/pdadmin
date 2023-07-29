<?php
  require_once '../../config/includes.php';
  require_once 'session.php';

  $redirect=@$_GET['cd'];

  $delete_data=$link->query("DELETE FROM `um_request_type` Where `um_reqtype_id`='$redirect'");

  if ($delete_data) {
    header("location: documents?note=delete");
  }else{
    header("location: documents?note=error");
  }
?>