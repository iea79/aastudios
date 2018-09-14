<?php
	if(isset($_POST['form-type']) && $_POST['form-type'] != ''){

		require './phpmailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;

		// $mail->addAddress('irkov.alexey@gmail.com');
        $mail->addAddress('olesya2008.79@mail.ru');
		
		$mail->CharSet = 'UTF-8';

		if(isset($_POST['doctor-form-email']) && $_POST['doctor-form-email'] != '') {
			$mail->From = $_POST['doctor-form-email'];
		} else {
			$mail->From = 'robot@startsev.me';
		}

		if(isset($_POST['doctor-form-name']) && $_POST['doctor-form-name'] != '') {
			$mail->FromName = $_POST['doctor-form-name'];
		} else if(isset($_POST['popup-name']) && $_POST['popup-name'] != ''){
			$mail->FromName = $_POST['popup-name'];
		}

		$currentDate = date('d/m/Y');

		$mail->isHTML(true);

		if($_POST['form-type'] == "1") {
			$subj = "Заказ обратного звонка";
			$mail->Body  = '<p><b>Дата:</b> ' . $currentDate . '</p><p><b>Телефон:</b> ' . trim($_POST['popup-phone']) . '</p><p><b>Имя:</b> ' . trim($_POST['popup-name']) . '</p>';
		}

		if($_POST['form-type'] == "2") {
			$subj = "Вопрос доктору";
			$mail->Body  = '<p><b>Дата:</b> ' . $currentDate . '</p><p><b>Имя:</b> ' . trim($_POST['doctor-form-name']) . '</p><p><b>Сообщение:</b> ' . trim($_POST['doctor-form-message']) . '</p>';
		}

		$mail->Subject = $subj;


		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		}

	}
	else {
		echo "false";
	}

?>