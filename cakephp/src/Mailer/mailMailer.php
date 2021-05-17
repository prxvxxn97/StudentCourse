<?php
namespace App\Mailer;
use Cake\Mailer\Mailer;


class mailMailer extends Mailer
{
	//public function regis_mail($id)
	public function regis_mail($user) { 
		$this ->to($user->username)->emailFormat('html')->subject(sprintf('Welcome %s', $user->name))->template('welcome_mail'); // By default template with same name as method name is used. 
	}

}



?>