<?php

	session_start();

	if(!isset($_SESSION['um_identifier_session_id'])){
        header("location: ../");
    }else if (!$_SESSION['um_identifier_session_type']) {
        header("location: ../");
    }

?>