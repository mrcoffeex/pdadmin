<?php 

	session_start([
        'cookie_lifetime' => 86400,
    ]);

	if(!isset($_SESSION['um_identifier_session_id'])){
        header("location: ../../index");
    }else if ($_SESSION['um_identifier_session_type'] != 0) {
        header("location: ../../index");
    }

    $user_id = $_SESSION['um_identifier_session_id'];
    $user_type = $_SESSION['um_identifier_session_type'];

    //find user
    $identify_user=$link->query("SELECT `um_username`,`um_user_id`,`um_full_name` From `um_user` Where `um_user_id`='$user_id'");
    $row=$identify_user->fetch_array();

    $user_email = $row['um_username'];
    $user_identity = $row['um_full_name'];
    $user_id = $row['um_user_id'];

    $datenow = date("Y-m-d H:i:s");
    $onlydate = date("Y-m-d");

?>