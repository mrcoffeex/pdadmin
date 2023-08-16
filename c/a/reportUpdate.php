<?php
	require_once '../../config/includes.php';
    require_once '_session.php';

    $reportId = clean_int($_GET['reportId']);

    if (isset($_POST['reportStatus'])) {
        
        $reportStatus = clean_int($_POST['reportStatus']);

        $request = updateReportStatus($reportStatus, $reportId);

        if ($request == true) {
            header("location: reports?note=report_updated");
        } else {
            header("location: reports?note=error");
        }

    }
?>