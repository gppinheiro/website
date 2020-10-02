<?php
	session_start();

	require_once "Mail.php";

	$from = 'bot.csgd@gmail.com';
	$to = 'claudio_a96@hotmail.com';

	$name = $_POST['name'];
	$email = $_POST['email'];
    $message = $_POST['message'];
	$subject = $_POST['subject'];

	$body = "CONTACTOS\r\n";
	$body .= "Nome: ". $name . "\r\n";
	$body .= "Email: ". $email . "\r\n";
	$body .= "Message: ". $message . "\r\n";
	
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
		echo("<script type='text/javascript'> window.location.href='contactos.html';</script>"); 
		exit();
	}
?>