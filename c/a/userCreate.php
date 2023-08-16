<?php
	require_once '../../config/includes.php';
    require_once '_session.php';

  if (isset($_POST['myfullname'])) {
    
    $myfullname=clean_string($_POST['myfullname']);
    $myemail=clean_email($_POST['myemail']);
    $enc_password=clean_string(md5("12345678"));

    $request = createUser($myfullname, $myemail, $enc_password, 0);

    if ($request == true) {
        header("location: users?note=user_added");
    } else {
        header("location: users?note=error");
    }

  }
?>