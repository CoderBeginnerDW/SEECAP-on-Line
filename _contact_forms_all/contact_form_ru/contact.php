<?php



include 'config.php';

	error_reporting (E_ALL ^ E_NOTICE);

	$post = (!empty($_POST)) ? true : false;



if($post)

	{

		include 'functions.php';

		$name = stripslashes($_POST['name']);

		$email = trim($_POST['email']);

		$message.='ime: ' . $_POST['name'] . "<br/>";

		$message.='E-mail: ' . $_POST['email'] . "<br/>";

		$message.='telefon: ' . $_POST['phone'] . "<br/>";

		$message.='tekst poruke: ' . $_POST['message'];

		$subject='КОНТАКТЫ';



		

		



		$error = '';



// Check name

if(!$name)

	{

		$error .= 'Пожалуйста, укажите имя и фамилию<br />';

	}

// Check email

if(!$email)

	{

		$error .= 'Пожалуйста, укажите адрес электронной почты<br />';

	}

if($email && !ValidateEmail($email))

	{

		$error .= 'Неправильный адрес электронной почты!<br />';

	}

if(!$error)

	{

		$mail = mail(WEBMASTER_EMAIL, $subject, $message,

     		"From: zoran.mitic@seecap.com\r\n"

    		."Reply-To:  zoran.mitic@seecap.com\r\n"

    		.'Content-type: text/html; charset=utf-8' . "\r\n"

    		."X-Mailer: PHP/" . phpversion());

		

				

if($mail)

	{

		echo 'OK';

	}

}

else

	{

		echo '<div class="notification_error">'.$error.'</div>';

	}

}

?>