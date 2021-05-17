<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Mailer\MailerAwareTrait;

class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['add','login']);
    }


        // if(mail("chauhan.praveen1000@gmail.com","Praveen","Hello Praveen, How are you?","chauhan.praveen1997@gmail.com"))
        // {
        //     echo "Sent";
        // }
        // else
        // {
        //     echo "Not sent";
        // }

    //}

//     public function login()
// {
//     if($this->Auth->user()){
//         $this->Flash->error(__('You are already logged in!'));
//         return $this->redirect($this->Auth->redirectUrl());
//     }
//     else{
//         if ($this->request->is('post')) {
//         $user = $this->Auth->identify();
//         if ($user) {
//             $this->Auth->setUser($user);
//             if($user['groupId']==2)
//                 {
//                     $this->redirect(['controller'=>'Admins','action'=>'request']);
//                 }
//                 else
//                 {
//                     $this->redirect($this->Auth->redirectUrl());    
//                 }
//         }
//         $this->Flash->error('Your username or password is incorrect.');
//       }
//    }
// }



    public function login()
    { 
        // $session->destroy();
        // $this->request->Session->destroy();
        if($this->request->session()->read('Auth.User.id'))
        {
            $this->redirect($this->Auth->redirectUrl());
        }

        else
            if($this->request->is('post')) {
                $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);
                
                if($user['groupId']==1)
                {
                    $this->redirect($this->Auth->redirectUrl());    
                }
                
                else
                {
                    $this->redirect(['controller'=>'Admins','action'=>'request']);
                }
                
            }
            else
            {
                $this->Flash->error(__('Invalid username or password, try again'));
            }

        }
    }

    public function logout()
    {
        $this->redirect($this->Auth->logout());
    }

    public function index()
    {
        if($this->Auth->user('groupId')==1)
        {
            $this->viewBuilder()->layout("myLayout");
            $this->set("title","The Zabardaast Team");
            $user=TableRegistry::get('courses');
            $this->set('Users',$user->find()->where(['username' =>$this->Auth->user('username')])->toList());
            //$this->set('Users', $this->Users->find('all'));
            $this->set('Student',$this->Auth->user('name'));
        }

        else
        {
            $this->redirect(['controller'=>'Admins','action'=>'request']);
        }
    }


use MailerAwareTrait;
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->groupId=1;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                $this->getMailer('mail')->send('regis_mail',[$user]);
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
    }
}
?>
    