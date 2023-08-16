<?php  
	function verifyPassword($entered, $stored){

        if (md5($entered) === $stored) {
            return true;
        } else {
            return false;
        }

    }

	function clean_string($value){

        include 'conf.php';
		
		if (empty($value)) {
            return $value;
        } else {
            if (!filter_var($value, FILTER_SANITIZE_STRING)) {
                header($input_error."?note=not_real_string");
            } else {
                return $value;
            }
        }
        
	} 

    function clean_email($value){

        include 'conf.php';

        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            header($input_error."?note=not_real_email");
        } else {
            return $value;
        }

    }

    function clean_int($value){

        include 'conf.php';

        if (empty($value)) {
            return $value;
        } else {
            if (!filter_var($value, FILTER_VALIDATE_INT)) {
                header($input_error."?note=not_real_int");
            } else {
                return $value;
            }
        }        
    }

    function clean_float($value){

        include 'conf.php';

        if (empty($value)) {
            return $value;
        } else {
            if (!filter_var($value, FILTER_VALIDATE_FLOAT)) {
                header($input_error."?note=not_real_float");
            } else {
                return $value;
            }
        }        
    }

    function stringLimit($name, $limit){

        if (strlen($name) > $limit){
            $name = substr($name, 0, $limit) . '...';
        }else{
            $name = $name;
        }

        return $name;
    }

	function get_curr_age($birthday){
        //values
        $date_now = strtotime(date("Y-m-d"));
        $value = strtotime($birthday);

        //subtract in seconds
        $date_diff = $date_now-$value;
        //convert in days
        $days = $date_diff / 86400;
        //convert in years
        $years = $days / 365.25;

        $months = $days / 30;

        $weeks = $days / 7;

        if ($days <= 28) {
            $finalset = $weeks;
            $age_ext = " weeks";
        }else if ($days <= 364) {
            $finalset = $months;
            $age_ext = " months";
        }else{
            $finalset = $years;
            $age_ext = " yrs";
        }

        //result
        $result = floor($finalset)." ".$age_ext;

        return $result;
    }

    function get_year_two_param($before, $later){
        //values
        $value_one = strtotime($later);
        $value_two = strtotime($before);

        //subtract in seconds
        $date_diff = $value_one-$value_two;
        //convert in days
        $days = $date_diff / 86400;
        //convert in years
        $years = $days / 365.25;

        //result
        $result = floor($years);

        return $result;
    }

    function get_timeage($basetime, $currenttime){
        $secs = $currenttime - $basetime;
        $days = $secs / 86400;

        if ($days < 1 ) {
            $age = 1;
        }else{
            $age = 1 + $days;
        }

        //classify weather day, month or year
        if ($age < 30.5) {
            $creditage = floor($age)." day(s)";
        }else if ($age >= 30.5 && $age < 365.25) {
            $creditage = floor(($age / 30.5))." month(s)";
        }else{
            $creditage = floor(($age / 265.25))." year(s)";
        }

        return $creditage;
    }

    function getTimePassed($basetime, $currenttime){

        $secs = strtotime($currenttime) - strtotime($basetime);

        $mins = $secs / 60;
        $hours = $secs / 3600;
        $days = $secs / 86400;

        if ($secs < 60) {
            $res = "Just Now";
        } else if ($secs >= 60 && $secs < 3600) {
            $res = floor($mins) . " minute(s) ago";
        } else if ($secs >= 3600 && $secs < 86400) {
            $res = floor($hours) . " hour(s) ago";
        } else {
            if ($days < 7) {
                $res = floor($days) . " day(s) ago";
            } else if ($days >= 7 && $days < 30.5) {
                $res = floor($days / 7)." week(s) ago";
            } else if ($days >= 30.5 && $days < 365.25) {
                $res = floor(($days / 30.5))." month(s) ago";
            } else {
                $res = floor(($days / 365.25))." year(s) ago";
            }
        }
        
        return $res;
    }

    function proper_date($datetime){

        if ($datetime == "") {
            $res = "";
        }else{
            $res = date("Md Y", strtotime($datetime));
        }

        return $res;

    }

    function proper_time($datetime){

        if ($datetime == "") {
            $res = "";
        }else{
            $res = date("g:i A", strtotime($datetime));
        }

        return $res;

    }

    function get_days($fromdate, $todate) {
        $fromdate = \DateTime::createFromFormat('Y-m-d', $fromdate);
        $todate = \DateTime::createFromFormat('Y-m-d', $todate);
        return new \DatePeriod(
            $fromdate,
            new \DateInterval('P1D'),
            $todate->modify('+1 day')
        );
    }

    function data_verify($my_ver_data){
        if ($my_ver_data == "") {
            $my_ver_data_value = "No Data";
        }else{
            $my_ver_data_value = $my_ver_data;
        }

        return $my_ver_data_value;
    }

    function my_rand_str( $length ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";   

        $str="";
        
        $size = strlen( $chars );
        for( $i = 0; $i < $length; $i++ ) {
            $str .= $chars[ rand( 0, $size - 1 ) ];
        }

        return $str;
    }

    function my_rand_int( $length ) {
        $chars = "0123456789";   

        $str="";
        
        $size = strlen( $chars );
        for( $i = 0; $i < $length; $i++ ) {
            $str .= $chars[ rand( 0, $size - 1 ) ];
        }

        return $str;
    }

    function randomizer( $length ) {
        $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";   

        $str="";
        
        $size = strlen( $chars );
        for( $i = 0; $i < $length; $i++ ) {
            $str .= $chars[ rand( 0, $size - 1 ) ];
        }

        return $str;
    }

    function toAlpha($number){
        
        $alphabet = array('N', 'S', 'T', 'A', 'R', 'G', 'O', 'L', 'D', 'E');

        $count = count($alphabet);
        if ($number == 10){
            $alpha = "SN";
        } else if ($number <= $count) {
            return $alphabet[$number - 0];
        }
        $alpha = '';
        while ($number > 0) {
            $modulo = ($number - 0) % $count;
            $alpha  = $alphabet[$modulo] . $alpha;
            $number = floor((($number - $modulo) / $count));
        }
        return $alpha;
    }

    function createLog($note_text, $user, $type){

    	$my_notification_full = $note_text." - ".$user;
    	
    	//INSERT to database
    	$statement=dbconnect()->prepare("INSERT Into notifications(
                                notif_type,
                                notif_text,
                                notif_date) 
                                Values(
                                    :mytype,
                                    :mynotification,
                                    NOW() )");
        $statement->execute([
            'mytype' => $type,
            'mynotification' => $my_notification_full
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }

    // users

    function selectUsers(){

        $statement=dbconnect()->prepare("SELECT 
                                        * 
                                        From 
                                        users 
                                        Where
                                        user_uid != :user_uid
                                        Order By 
                                        user_fullname 
                                        ASC");
        $statement->execute([
            'user_uid' => 1
        ]);

        return $statement;
    }

    function countUsers($searchText){

        if (empty($searchText)) {
            $statement=dbconnect()->prepare("SELECT 
                                            * 
                                            From 
                                            users 
                                            Where
                                            user_uid != :user_uid");
            $statement->execute([
                'user_uid' => 1
            ]);
        } else {
            $statement=dbconnect()->prepare("SELECT 
                                            * 
                                            From 
                                            users 
                                            Where
                                            user_uid != :user_uid
                                            AND
                                            CONCAT
                                            (
                                                user_username,
                                                user_fullname
                                            )
                                            LIKE :searchText");
            $statement->execute([
                'user_uid' => 1,
                'searchText' => "%$searchText%"
            ]);
        }
        
        $count=$statement->rowCount();

        return $count;
    }

    function getUserPassword($userId){

        $statement=dbconnect()->prepare("SELECT 
                                        user_password
                                        From 
                                        users 
                                        Where
                                        user_uid = :user_uid");
        $statement->execute([
            'user_uid' => $userId
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        return $res['user_password'];
    }

    function createUser($userFullname, $userUsername, $userPassword, $userType){

        $userCode = randomizer(10);

        $statement=dbconnect()->prepare("INSERT INTO 
                                        users
                                        (
                                            user_code, 
                                            user_fullname, 
                                            user_username, 
                                            user_password, 
                                            user_type, 
                                            user_status, 
                                            user_verify
                                        )
                                        Values
                                        (
                                            :user_code, 
                                            :user_fullname, 
                                            :user_username, 
                                            :user_password, 
                                            :user_type, 
                                            :user_status, 
                                            :user_verify
                                        )");
        $statement->execute([
            'user_code' => $userCode, 
            'user_fullname' => $userFullname, 
            'user_username' => $userUsername, 
            'user_password' => $userPassword, 
            'user_type' => $userType, 
            'user_status' => 0, 
            'user_verify' => 1
        ]);

        if ($statement) {
            return true;        
        } else {
            return false;
        }
    }

    function updateUser($userFullname, $userUsername, $userPassword, $userType, $userId){

        $statement=dbconnect()->prepare("UPDATE 
                                        users
                                        SET
                                        user_fullname = :user_fullname,
                                        user_username = :user_username,
                                        user_password = :user_password,
                                        user_type = :user_type
                                        Where
                                        user_uid = :user_uid");
        $statement->execute([
            'user_fullname' => $userFullname, 
            'user_username' => $userUsername, 
            'user_password' => $userPassword, 
            'user_type' => $userType, 
            'user_uid' => $userId
        ]);

        if ($statement) {
            return true;        
        } else {
            return false;
        }
    }

    function updateUserPassword($userPassword, $userId){

        $statement=dbconnect()->prepare("UPDATE 
                                        users
                                        SET
                                        user_password = :user_password
                                        Where
                                        user_uid = :user_uid");
        $statement->execute([
            'user_password' => $userPassword,
            'user_uid' => $userId
        ]);

        if ($statement) {
            return true;        
        } else {
            return false;
        }
    }

    function removeUser($userId){

        $statement=dbconnect()->prepare("DELETE
                                        FROM
                                        users
                                        Where
                                        user_uid = :user_uid");
        $statement->execute([
            'user_uid' => $userId
        ]);

        if ($statement) {
            return true;        
        } else {
            return false;
        }
    }

    // report

    function createReport($link, $description, $email){

        $reference = randomizer(30);

        $statement=dbconnect()->prepare("INSERT INTO 
                                        reports
                                        (
                                            report_reference, 
                                            report_link, 
                                            report_description, 
                                            report_email, 
                                            report_status, 
                                            report_created, 
                                            report_updated
                                        )
                                        VALUES
                                        (
                                            :report_reference, 
                                            :report_link, 
                                            :report_description, 
                                            :report_email, 
                                            :report_status, 
                                            NOW(), 
                                            NOW()
                                        )");
        $statement->execute([
            'report_reference' => $reference, 
            'report_link' => $link, 
            'report_description' => $description, 
            'report_email' => $email, 
            'report_status' => 0
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }

    function countReports($searchText){

        if (empty($searchText)) {
            $statement=dbconnect()->prepare("SELECT 
                                        * 
                                        FROM
                                        reports");
            $statement->execute();
        } else {
            $statement=dbconnect()->prepare("SELECT 
                                        * 
                                        FROM
                                        reports
                                        Where
                                        CONCAT
                                        (
                                            report_link,
                                            report_email,
                                            report_reference,
                                            report_created
                                        )
                                        LIKE
                                        :report_search");
            $statement->execute([
                'report_search' => "%$searchText%"
            ]);
        }
        
        $count=$statement->rowCount();

        return $count;
    }

    function countPhish($searchText){

        if (empty($searchText)) {
            $statement=dbconnect()->prepare("SELECT 
                                        * 
                                        FROM
                                        reports
                                        Where
                                        report_status = :report_status");
            $statement->execute([
                'report_status' => 1
            ]);
        } else {
            $statement=dbconnect()->prepare("SELECT 
                                        * 
                                        FROM
                                        reports
                                        Where
                                        report_status = :report_status
                                        AND
                                        CONCAT
                                        (
                                            report_link,
                                            report_email,
                                            report_reference,
                                            report_created
                                        )
                                        LIKE
                                        :report_search");
            $statement->execute([
                'report_status' => 1,
                'report_search' => "%$searchText%"
            ]);
        }

        $count=$statement->rowCount();

        return $count;
    }

    function selectRecentReports(){

        $statement=dbconnect()->prepare("SELECT 
                                        * 
                                        FROM
                                        reports
                                        ORDER BY
                                        report_created
                                        DESC
                                        LIMIT 7");
        $statement->execute();

        return $statement;
    }

    function selectReports(){

        $statement=dbconnect()->prepare("SELECT 
                                        * 
                                        FROM
                                        reports
                                        ORDER BY
                                        report_created
                                        DESC");
        $statement->execute();

        return $statement;
    }

    function getTopReports($count){

        $statement=dbconnect()->prepare("SELECT report_link, COUNT(report_link) AS occurrence_count
                                        FROM reports
                                        GROUP BY report_link
                                        ORDER BY occurrence_count DESC
                                        LIMIT :get_count");
        $statement->execute([
            'get_count' => $count
        ]);

        return $statement;

    }

    function getReportStatus($status){
        
    	if ($status == 0) {
    		$res = "pending";
    	}else if ($status == 1) {
    		$res = "suspicious";
    	}else{
    		$res = "safe";
    	}

    	return $res;
    }

    function getReportStatusSkin($status){
        
    	if ($status == 0) {
    		$res = "warning";
    	}else if ($status == 1) {
    		$res = "danger";
    	}else{
    		$res = "success";
    	}

    	return $res;
    }

    function updateReportStatus($reportStatus, $reportId){

        $statement=dbconnect()->prepare("UPDATE
                                        reports
                                        SET
                                        report_status = :report_status
                                        Where
                                        report_id = :report_id");
        $statement->execute([
            'report_status' => $reportStatus,
            'report_id' => $reportId
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
    }

    function removeReport($reportId){

        $statement=dbconnect()->prepare("DELETE
                                        FROM
                                        reports
                                        Where
                                        report_id = :report_id");
        $statement->execute([
            'report_id' => $reportId
        ]);

        if ($statement) {
            return true;        
        } else {
            return false;
        }
    }

    // dataloads

    function countDataloads(){

        $statement=dbconnect()->prepare("SELECT 
                                        * 
                                        FROM
                                        dataloads");
        $statement->execute();
        $res=$statement->fetch(PDO::FETCH_ASSOC);

        return $res['dataload_count'];
    }

    function updateDataLoad($count){

        if (empty(countDataloads())) {
            $statement=dbconnect()->prepare("INSERT INTO
                                            dataloads
                                            (
                                                dataload_count
                                            )
                                            VALUES
                                            (
                                                :dataload_count
                                            )");
            $statement->execute([
                'dataload_count' => $count
            ]);
        } else {
            $statement=dbconnect()->prepare("UPDATE
                                            dataloads
                                            SET
                                            dataload_count = dataload_count + :dataload_count");
            $statement->execute([
                'dataload_count' => $count
            ]);
        }

        if ($statement) {
            return true;
        } else {
            return false;
        }

    }

    //visited_sites

    function createVisitedSites($site){

    	$statement=dbconnect()->prepare("INSERT INTO 
                                        visited_sites
                                        (
                                            vis_link, 
                                            vis_created
                                        ) 
                                        VALUES
                                        (
                                            :vis_link,
                                            NOW() 
                                        )");
        $statement->execute([
            'vis_link' => $site
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }

    }

    function getTopVisitedSites($count){

        $statement=dbconnect()->prepare("SELECT vis_link, COUNT(vis_link) AS occurrence_count
                                        FROM visited_sites
                                        GROUP BY vis_link
                                        ORDER BY occurrence_count DESC
                                        LIMIT :get_count");
        $statement->execute([
            'get_count' => $count
        ]);

        return $statement;

    }
?>