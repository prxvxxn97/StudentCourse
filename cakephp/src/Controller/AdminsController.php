<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class AdminsController extends AppController
{
	public function initialize()
	{
		parent::initialize();
	}
	
	public function request()
	{
		$this->viewBuilder()->layout("adminLayout");
		$this->set("title","The Zabardaast Team");
		$this->set('Student',$this->Auth->user('name'));
		$admins = TableRegistry::get('courses');
		$data=$admins->find('all');
	    $this->set('course',$this->paginate($data,['limit'=>'4']));

	}

	public function logout()
    {
        $this->redirect($this->Auth->logout());
    }	

	public function approve()
	{
		$this->autoRender=false;
		$this->viewBuilder()->layout("adminLayout");
		$id=$_POST['id'];
		//$id='1,2,3,4,5';
		$var=explode(",", $id);
		foreach ($var as $value) 
		{
			$course=TableRegistry::get('courses');
			$app=$course->get($value);
			$app->status=1;
			if($course->save($app))
			{
				echo "Approved";			
			}	
		}
		die;
		
		//$this->redirect(['action'=>'request']);
	
	}

	public function reject()
	{
		$this->autoRender=false;
		$this->viewBuilder()->layout("myLayout");
		$id=$_POST['id'];
		$var=explode(",", $id);
		foreach ($var as $value) 
		{
			$cour=TableRegistry::get('courses');
			$rej=$cour->get($value);
			$rej->status=2;
			if($cour->save($rej))
			{
				echo "Rejected";			
			}	
		}
		die;

		//$this->redirect(['action'=>'request']);
	
	}		

}







?>