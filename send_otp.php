<?phpsession_start();include 'database/config.php';$con=mysqli_connect('localhost','root','','oes_db');$email=$_POST['email'];$res=mysqli_query($con,"select * from tbl_users where email='$email'");$count=mysqli_num_rows($res);if($count>0){	$otp=rand(11111,99999);	mysqli_query($con,"update tbl_users set otp='$otp' where email='$email'");	$html="Your otp verification code is ".$otp;	$_SESSION['EMAIL']=$email;	smtp_mailer($email,'OTP Verification',$html);	echo "yes";}else{	echo "not_exist";}function smtp_mailer($to,$subject, $msg){
	require_once("smtp/class.phpmailer.php");
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPDebug = 2; 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 	$mail->SMTPAutoTLS = false;
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "otpforoes@gmail.com";
	$mail->Password = "Abcd@1234";
	$mail->SetFrom("otpforoes@gmail.com");
	$mail->Subject = $subject = trim("Email OTP Verifcation - www.oes.in");;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	if(!$mail->Send()){
		return 0;
	}else{
		return 1;
	}
}?>