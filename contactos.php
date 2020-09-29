<?php
	require_once "Mail.php";

	$from = 'bot.csgd@gmail.com';
	$to = 'guigaspp@gmail.com';

	$subject = $_REQUEST['subject'];
	$name = $_REQUEST['name'];
    $cmessage = $_REQUEST['message'];

	$message = '<html><body>';
	$message .= "<tr><td><strong>Nome: </strong> </td><td>". strip_tags($name) . "</td></tr>";
	$message .= "<tr><td><strong>Email: </strong> </td><td>". strip_tags($from) . "</td></tr>";
	$message .= "<tr><td><strong>Message: </strong> </td><td>". $cmessage . "</td></tr>";
	$message .= "</body></html>";
	
	$headers = array(
		'From' => $from,
		'To' => $to,
		'Subject' => $subject
	);
	
	$smtp = Mail::factory('smtp', array(
			'host' => 'ssl://smtp.gmail.com',
			'port' => '465',
			'auth' => true,
			'username' => 'bot.csgd@gmail.com',
			'password' => 'saoclaudio2021'
		));
	
	$mail = $smtp->send($to, $headers, $message);
	
	if (PEAR::isError($mail)) {
		echo('<p>' . $mail->getMessage() . '</p>');
	} else {
		echo('<p>Message successfully sent!</p>');
	}
	
?>