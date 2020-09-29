<?php
	session_start();

	require_once "Mail.php";

	$from = 'bot.csgd@gmail.com';
	$to = 'guigaspp@gmail.com';

	$name = $_POST['name'];
	$email = $_POST['email'];
    $message = $_POST['message'];
	$subject = $_POST['subject'];

	$body = '<html><body>';
	$body .= "<tr><td><strong>Nome: </strong> </td><td>". $name . "</td></tr>";
	$body .= "<tr><td><strong>Email: </strong> </td><td>". $email . "</td></tr>";
	$body .= "<tr><td><strong>Message: </strong> </td><td>". $message . "</td></tr>";
	$body .= "</body></html>";
	
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
	
	$mail = $smtp->send($to, $headers, $body);
	
	if (PEAR::isError($mail)) {
		echo('<p>' . $mail->getMessage() . '</p>');
		exit();
	} else {
		die('<p>Message successfully sent!</p>');
	}
	
?>