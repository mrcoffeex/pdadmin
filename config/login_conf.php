<?php  
	session_start();

	require_once('conn.php');
	require_once('function.php');

	if(isset($_POST['pUsername'])){

		// reCaptcha

		$recaptcha_secret_key = '6Ld6zOMlAAAAALcsr6xH6Hr9EOnQ56I72i2ttDKc';
		$recaptcha_response = $_POST['g-recaptcha-response'];
		$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
		$recaptcha_data = array(
			'secret' => $recaptcha_secret_key,
			'response' => $recaptcha_response,
		);

		$recaptcha_options = array(
			'http' => array(
				'header' => "Content-type: application/x-www-form-urlencoded\r\n",
				'method' => 'POST',
				'content' => http_build_query($recaptcha_data),
			),
		);

		$recaptcha_context = stream_context_create($recaptcha_options);
		$recaptcha_result = file_get_contents($recaptcha_url, false, $recaptcha_context);
		$recaptcha_response_data = json_decode($recaptcha_result, true);

		$username = clean_string($_POST['pUsername']);
		$password = clean_string(md5($_POST['pPassword']));
	
		if ($recaptcha_response_data['success'] || !$recaptcha_response_data['success']) {
			
			$statement=dbconnect()->prepare("SELECT * From users Where 
									user_username = :username AND 
									user_password = :keypassword");
			$statement->execute([ 
				'username' => $username,
				'keypassword' => $password
			]);
									
			$count=$statement->rowCount();
			$row=$statement->fetch(PDO::FETCH_ASSOC);

			$_SESSION['phish_session_id'] = $row['user_uid'];
			$_SESSION['phish_session_type'] = $row['user_type'];

			if($count > 0){
				if ($row['user_status'] == 0) {
					
					if($row['user_type'] == 0){
		
						createLog("Login", $username, "auth");
						header("location: ../c/a/");
		
					}else{
						createLog("Login Attempt", $username, "attempt");
						session_destroy();
						header("location: ../?note=noexist&email=$username");
					}

				}else{
					createLog("Login Attempt", $username, "attempt");
					session_destroy();
					header("location: ../?note=suspended&email=$username");
				}

			}else{
				createLog("Login Attempt", $username, "attempt");
				session_destroy();
				header("location: ../?note=noexist&email=$username");
			}

		} else {
			createLog("Login Attempt", $username, "attempt");
			session_destroy();
			header("location: ../?note=captcha_error&email=$username");
		}
	}
		
?>