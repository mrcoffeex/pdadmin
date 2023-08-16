<?php  
	//all redirects
	require_once '../../config/includes.php';
    require_once '_session.php';

  	if (isset($_POST['userSearch'])) {

  		$userSearch = clean_string($_POST['userSearch']);

  		if (ctype_space($userSearch)) {
            header("location: users?note=invalid");
        }else if ($userSearch == "0") {
            header("location: users?note=invalid");
        }else if ($userSearch) {
            header("location: userSearch?searchText=$userSearch");
        }else{
            header("location: users?note=error");
        }

  	}

    if (isset($_POST['searchReport'])) {

        $searchReport = clean_string($_POST['searchReport']);

        if (ctype_space($searchReport)) {
            header("location: reports?note=invalid");
        }else if ($searchReport == "0") {
            header("location: reports?note=invalid");
        }else if ($searchReport) {
            header("location: reportSearch?searchText=$searchReport");
        }else{
            header("location: reports?note=error");
        }

    }

    if (isset($_POST['searchPhish'])) {

        $searchPhish = clean_string($_POST['searchPhish']);

        if (ctype_space($searchPhish)) {
            header("location: pdatabase?note=invalid");
        }else if ($searchPhish == "0") {
            header("location: pdatabase?note=invalid");
        }else if ($searchPhish) {
            header("location: pdatabaseSearch?searchText=$searchPhish");
        }else{
            header("location: pdatabase?note=error");
        }

    }
?>