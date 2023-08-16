<?php
	require_once '../../config/includes.php';
    require_once '_session.php';

    $uid = clean_int($_GET['uid']);
    $request = removeUser($uid);

    if ($request == true) {
        header("location: users?note=user_removed");
    } else {
        header("location: users?note=error");
    }
?>