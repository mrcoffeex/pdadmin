<?php
	require_once '../../config/includes.php';
    require_once '_session.php';

    $reportId = clean_int($_GET['reportId']);
    $request = removeReport($reportId);

    if ($request == true) {
        header("location: reports?note=report_removed");
    } else {
        header("location: reports?note=error");
    }
?>