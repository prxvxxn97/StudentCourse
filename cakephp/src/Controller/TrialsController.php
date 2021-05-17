<?php
namespace App\Controller;
use App\Controller\AppController;

class TrialsController extends AppController
{
	public $components = array('Email');

	public function index()
	{
		$to='chauhan.praveen1000@gmail.com';
		$subject='Hello Brother, I got your message';
		$message='Nothing Much I sent mail';

		try{
			$mail=$this->Email->send_mail($to,$subject,$message);
		}
		catch(Exception $e)
		{
			echo "Message could not be send ",$mail->ErrorInfo;
		}
		exit;
	}

}


?>