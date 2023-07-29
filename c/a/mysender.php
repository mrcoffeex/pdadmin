<?php  
	require '../../vendor/autoload.php';

	$messagebird = new MessageBird\Client('DFoU5CuQZBQd4dCyDpf6wU0TW');
	$message = new MessageBird\Objects\Message;
	$message->originator = '+639121610673';
	$message->recipients = [ $rec ];
	$message->body = $smsbody." This is an automated sms. Please do not reply.";

	$messagebird->messages->create($message);
?>