<?php 
	require_once '../../config/includes.php';
	require_once '_session.php';

	createLog("Logout", $userEmail, "auth");
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