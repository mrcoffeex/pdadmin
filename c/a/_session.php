<?php 

	session_start([
        'cookie_lifetime' => 86400,
    ]);

	if(!isset($_SESSION['phish_session_id'])){
        header("location: ../../");
    }else if ($_SESSION['phish_session_type'] != 0) {
        header("location: ../../");
    }

    $userId = $_SESSION['phish_session_id'];
    $userType = $_SESSION['phish_session_type'];

    //find user
    $getUserAccount=dbconnect()->prepare("SELECT * From users Where user_uid = :user_uid");
    $getUserAccount->execute([
        'user_uid' => $userId
    ]);
    $row=$getUserAccount->fetch(PDO::FETCH_ASSOC);

    $userEmail = $row['user_username'];
    $userFullname = $row['user_fullname'];

    $datenow = date("Y-m-d H:i:s");
    $onlydate = date("Y-m-d");

?>