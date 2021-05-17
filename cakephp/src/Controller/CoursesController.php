<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class CoursesController extends AppController
{
	 public function create()
    {
    	if($this->Auth->user('groupId')==1)
        {
        $this->viewBuilder()->layout("myLayout");
        $this->set('Student',$this->Auth->user('name'));
        $this->set("title","Course Add");
        $this->set('username',$this->Auth->user('username'));
        $course = array('cakePHP','Laravel','CI','Django');
        $this->set('course',$course);	
        if($this->request->is('post'))
        {
        	$data=$this->request->getData('course');
            $table = TableRegistry::get('courses');
            if($table->find()->where(['username' =>$this->Auth->user('username'),'OR'=>['course'=>$data],])->toList())
            {	
                $this->Flash->error("This Course is already Selected");
            }
            else
            {	
                $course = $table->newEntity($this->request->getData());
                if($table->save($course))
                	$this->Flash->success("Courses has been added");    
                else
                    $this->Flash->error("Failed to Submit");
            }
        }
    }
	}
}

?>