<?php
	require_once '../../config/includes.php';
  require_once 'session.php';

  if (isset($_POST['myidnum'])) {
    
    $myidnum=words($_POST['myidnum']);
    $myemail=words($_POST['myemail']);
    $myfullname=words($_POST['myfullname']);
    $mycontact=words($_POST['mycontact']);

    //generate account
    $gen_password=words(my_rand_str(8));
    $enc_password=words(encryptIt($gen_password));

    if (check_exist_email($email) == "false") {
      header("location: users?note=existed");
    }else{
      $insert_data=$link->query("INSERT INTO `um_user`(`um_user_code`, 
                                                  `um_full_name`, 
                                                  `um_user_contact`, 
                                                  `um_username`, 
                                                  `um_password`, 
                                                  `um_user_type`, 
                                                  `um_user_status`) 
                                                  Values(
                                                  '$myidnum',
                                                  '$myfullname',
                                                  '$mycontact',
                                                  '$myemail',
                                                  '$enc_password',
                                                  '1',
                                                  '0')");
      if ($insert_data) {
        $emailto = $myemail;
        $emailsubject = "UMDoc Request Portal";

        $emailmessage .= "<center>";
        $emailmessage .= "<h1>Hello, ".$myfullname." this is your login details.<h1>";
        $emailmessage .= "<h3>Username: ".$myemail."</h3>";
        $emailmessage .= "<h3>Password: ".$gen_password."</h3>";
        $emailmessage .= "<p><i>SYSTEM GENERATED EMAIL. DO NOT REPLY.</i></p>";
        $emailmessage .= "</center>";

        include 'mailer.php';

        if (!$mail->send()) {

          header("location: users?note=email_not_sent");

        }else{

          header("location: users?note=added");

        }
      }else{
        header("location: users?note=error");
      }
    }
  }
?>