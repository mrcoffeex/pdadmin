<?php  
    require("config/includes.php");

    if (isset($_POST['reportLink'])) {
        
        $reportLink = clean_string($_POST['reportLink']);
        $reportDescription = clean_string($_POST['reportDescription']);
        $reportEmail = clean_email($_POST['reportEmail']);

        $createReport = createReport($reportLink, $reportDescription, $reportEmail);

        if ($createReport == true) {
            header("location: pending?note=added");
        } else {
            header("location: report?note=error");
        }

    } else {
        header("location: report?note=invalid");
    }
    
?>