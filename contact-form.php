<?php
if(isset($_POST['submit'])) 
{

$robotest = $_POST['robotest'];
    if($robotest)
      $error = "You are a gutless robot.";
    else{
$message=
'Nome:	'.$_POST['fullname'].'<br />
Assunto:	'.$_POST['subject'].'<br />
Email:	'.$_POST['emailid'].'<br />
Mensagem:	<br /><br />'.$_POST['comments'].'
';
    require "phpmailer/class.phpmailer.php"; //include phpmailer class
      
    // Instantiate Class  
    $mail = new PHPMailer();  
      
    // Set up SMTP  
    $mail->IsSMTP();                // Sets up a SMTP connection  
    $mail->SMTPAuth = true;         // Connection with the SMTP does require authorization    
    $mail->SMTPSecure = "ssl";      // Connect using a TLS connection  
    $mail->Host = "smtp.gmail.com";  //Gmail SMTP server address
    $mail->Port = 465;  //Gmail SMTP port
    $mail->Encoding = '7bit';
    
    // Authentication  
    $mail->Username   = "kpntunnel@gmail.com"; // Your full Gmail address
    $mail->Password   = "Egz0669937/"; // Your Gmail password
      
    // Compose
    $mail->SetFrom($_POST['emailid'], $_POST['fullname']);
    $mail->AddReplyTo($_POST['emailid'], $_POST['fullname']);
    $mail->Subject = $_POST['subject'];      // Subject (which isn't required)  
    $mail->MsgHTML($message);
 
    // Send To  
    $mail->AddAddress("kpntunnel@gmail.com", "Recipient Name"); // Where to send it - Recipient
    $result = $mail->Send();		// Send!  
	$message = $result ? 'Enviado com Sucesso!' : 'O Envio Falhou!';      
	unset($mail);

}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<p><?php if(!empty($message)) echo $message; ?></p>
<p><?php if(!empty($error)) echo $error; ?></p>
</body>
</html>
