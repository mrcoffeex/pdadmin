<?php  

	$getproject=dbconnect()->prepare("SELECT * From projects Where project_id = :project_id");
	$getproject->execute([
		'project_id' => 1
	]);

	$project=$getproject->fetch(PDO::FETCH_ASSOC);

	$my_project_name = $project['project_name'];
	$my_project_address = $project['project_address'];
	$my_project_title = $project['project_title'];
	$my_project_origin = $project['project_created'];
?>