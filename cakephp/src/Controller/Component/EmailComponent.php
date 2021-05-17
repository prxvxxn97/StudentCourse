<?php
namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\Core\App;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ROOT. '/vendor/phpmailer/phpmailer/src/Exception.php';
require ROOT. '/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require ROOT. '/vendor/phpmailer/phpmailer/src/SMTP.php';	

class EmailComponent extends Component
{
	public function send_mail($to,$subject,$message)
	{
		$sender='chauhan.praveen1997@gmail.com';

		$header='X-Mailer: PHP/'.phpversion() . 'Return-Path: $sender';

		$mail=new PHPMailer();
		$mail->SMTPDebug=2;
		$mail->IsSMTP();
		$mail->Host='smtp@gmail.com';
		$mail->SMTPAuth=true;
		$mail->username='';
		$mail->username='';
		$mail->SMTPSecure='tls';
		$mail->Port=587;


		$mail->SMTPOptions=array(
			'tls'=>array(
				'verify_peer' =>false,
				'verify_peer_name' =>false,
				'allow_self_signed' =>true
			),
			'ssl' =>array(
				'verify_peer' => false,
				'verify_peer_name' =>false,
				'allow_self_signed' =>true
			)
		);

		$mail->FROM=$sender;
		$mail->FromName="From Me";

		$mail->AddAddress($to);

		$mail->IsHTML(true);
		$mail->CreateHeader($header);

		$mail->Subject=$subject;
		$mail->Body = nl2br($message);

		$mail->AltBody=nl2br($message);

		if(!$mail->Send())
		{
			return array('error'=>true,'message'=>'Mailer Error' .$mail->ErrorInfo);
		}
		else
		{
			return array('error'=>false,'message'=>'Message Sent');
		}
	}
}

?>