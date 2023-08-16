<?php  
    require("config/includes.php");

    $url = $_GET['url']; // Get the URL parameter from the query string

    $statement=dbconnect()->prepare("SELECT 
                                    COUNT(*) AS count 
                                    FROM 
                                    reports 
                                    WHERE 
                                    report_status = :report_status
                                    AND 
                                    report_link LIKE :report_link");
    $statement->execute([
        'report_status' => 1,
        'report_link' => "%$url%"
    ]);
    $row=$statement->fetch(PDO::FETCH_ASSOC);
    
    $isSuspicious = $row['count'] > 0;

    echo json_encode(['isSuspicious' => $isSuspicious]);

    //extras
    if ($url == "undefined" || empty($url) || $url == "chrome://newtab/") {
        // no action
    } else {
        updateDataLoad(1);
        createVisitedSites($url);
    }
    
?>