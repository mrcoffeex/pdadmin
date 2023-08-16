<?php
	require_once '../../config/includes.php';
    require_once '_session.php';

    $uid = clean_int($_GET['uid']);

    if (isset($_POST['myfullname'])) {
        
        $myfullname=clean_string($_POST['myfullname']);
        $myemail=clean_email($_POST['myemail']);
        $mypassword=clean_string($_POST['mypassword']);

        if (empty($mypassword)) {
            $enc_password = getUserPassword($uid);
        } else {
            $enc_password = md5($mypassword);
        }

        $request = updateUser($myfullname, $myemail, $enc_password, 0, $uid);

        if ($request == true) {
            header("location: users?note=user_updated");
        } else {
            header("location: users?note=error");
        }

    }
?>