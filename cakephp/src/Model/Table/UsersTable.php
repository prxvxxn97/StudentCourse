<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function validationDefault(Validator $validator)
    {

        $validator->requirePresence("name","create","Name is Needed");
        // $validator->requirePresence('username')->add('username','validFormat',[
        // 'rule'=>'email'])->add('username',["unique"=>["rule"=>"validateUnique",'message'=>'username must be valid']]);
        $validator->requirePresence("username","create","Username SHould be Needed!")
        ->add("username",["unique"=>["rule"=>"validateUnique","provider"=>"table","message"=>"username Should be Unique"]])->add('username','validFormat',[
         'rule'=>'email','message'=>'Invalid Username']);

        $validator->requirePresence("password","create","Password is Needed");
        $validator->requirePresence('mobile')->notEmpty('mobile', 'We need your mobile.')->numeric('mobile','Please, enter valid phone  number !')
            ->add('mobile', 'minLength',[
                'rule' => ['minLength', 10],
                'message' => 'Mobile must be of 10 Digits'
            ]);

        //->requirePresence("confirm_pass","create","Confirm Password is Needed")
        /*->add("confirm_pass",[
            "Password Mismatch"=>[
                "rule"=>["comparewith","password"],
                "message"=>"Password didn't Match"]
            ]);*/
        return $validator;
    }

}
?>