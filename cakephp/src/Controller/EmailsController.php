<?php
namespace App\Controller;
use App\Controller\AppController;

class EmailsController extends AppController
{
	public function sendmail($receiver = null, $name = null, $pass = null) {
	        $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->webroot . "users/login/";
	        $message = 'Hi,' . $name . ', Your Password is: ' . $pass;
	        App::uses('CakeEmail', 'Network/Email');
	        $email = new CakeEmail('gmail');
	        $email->from('chauhan.praveenn1000@gmail.com');
	        $email->to($receiver);
	        $email->subject('Mail Confirmation');
	        $email->send($message . " " . $confirmation_link);
	    }
}
?>