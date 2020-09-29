<?php
	session_start();

	require_once "Mail.php";

	$from = 'bot.csgd@gmail.com';
	$to = 'claudio_a96@hotmail.com';

	$primeiro_nome = $_POST['primeiro_nome'];
	$segundo_nome = $_POST['segundo_nome'];
	$email = $_POST['email'];
	$numero = $_POST['numero'];
	$genero = $_POST['genero'];
	$data = $_POST['data'];
	$morada = $_POST['morada'];
	$localidade = $_POST['localidade'];
	$codigo = $_POST['codigo'];

	$subject='Inscrição/Renovação de Sócios';

	$body = "Sócios\r\n";
	$body .= "Primeiro Nome: ". $primeiro_nome . "\r\n";
	$body .= "Segundo Nome: ". $segundo_nome . "\r\n";
	$body .= "Email: ". $email . "\r\n";
	$body .= "Número: ". $name . "\r\n";
	$body .= "Género: ". $genero . "\r\n";
	$body .= "Data de Nascimento: ". $data . "\r\n";
	$body .= "Morada: ". $morada . "\r\n";
	$body .= "Localidade: ". $localidade . "\r\n";
	$body .= "Código de Postal: ". $codigo . "\r\n";
	
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
		echo("<script type='text/javascript'> window.location.href='socios.html';</script>"); 
		exit();
	}
?>