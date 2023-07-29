<?php  
	//all redirects
	require_once '../../config/includes.php';
  	require_once 'session.php';

  	//start here

    //user search
  	if (isset($_POST['user_search'])) {
  		$user_search = words($_POST['user_search']);

  		if (ctype_space($user_search)) {
          header("location: users?note=only_space");
      }else if ($search_trans == "0") {
          header("location: users?note=only_zero");
      }else if (search_trans) {
          header("location: search_user?search_text=$user_search");
      }else{
          header("location: users?note=error");
      }

  	}

    //index search
    if (isset($_POST['search'])) {
      $search = words($_POST['search']);
      
      if ($search) {
        header("location: search?search_text=$search");
      }else{
        header("location: ./?note=error");
      }
    }
?>