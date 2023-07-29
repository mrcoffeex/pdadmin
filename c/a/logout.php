<?php 

	require_once '../../config/includes.php';
	require_once 'session.php';

	$activity_name = words("Logout by ".$user_identity);
    $activity_date = words(date("Y-m-d H:i:s"));

    $insert_activity_log=$link->query("INSERT Into `um_notification`(
    											`um_notif_type`,
    											`um_notif_text`, 
    											`um_notif_date`) 
    											values(
    											'inout',
    											'$activity_name',
    											'$activity_date')");

	session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
	<meta http-equiv="refresh" content="1;url=../../">
</head>

<style type="text/css">
	.prepare{
		margin-top: 100px;
	}
</style>

<body>
	<center>
		<h3 class="prepare">Preparing to Logout ...</h3>
		<img src="../../assets/img/loading.gif" alt="loader">
	</center>
</body>
</html>