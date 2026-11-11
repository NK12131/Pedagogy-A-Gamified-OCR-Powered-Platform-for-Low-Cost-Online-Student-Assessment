<?php	
	function sendOTP($email,$otp) {
		require('phpmailer/class.phpmailer.php');
		require('phpmailer/class.smtp.php');
	
		$message_body = "One Time Password for PHP login authentication is:<br/><br/>" . $otp;
		$mail = new PHPMailer();
		$mail->IsSMTP(true);
		$mail->SMTPDebug = 1;                     // enables SMTP debug information (for testing)
        $mail->SMTPAuth = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
		$mail->SMTPAutoTLS = false;
        $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
        $mail->Port = 587 ;                   // set the SMTP port for the GMAIL server
		$mail->Username = "anishabhiparth@gmail.com";
		$mail->Password = "Abcd@1234";
		$mail-> Mailer = "smtp";
		$mail->SetFrom("anishabhiparth@gmail.com", "Parth");
		$mail->AddAddress($email);
		$mail->Subject = "OTP to Login";
		$mail->MsgHTML($message_body);
		$mail->IsHTML(true);		
		$result = $mail->Send();
		
		return $result;
	}
?>