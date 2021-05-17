<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CoursesTable extends Table
{
    public function valid($val)
    {
        // $validator->requirePresence("course","create","course SHould be Needed!")
        // ->add("course",["unique"=>["rule"=>"validateUnique","provider"=>"table","message"=>"course Should be Unique"]]);
    	print_r($val);
    	die;
        $val->requirePresence('course')->notEmpty('course', 'We need your course.')->add("course",["unique"=>["rule"=>"validateUnique","provider"=>"table","message"=>"course Should be Unique"]]);
        //->requirePresence("confirm_pass","create","Confirm Password is Needed")
        /*->add("confirm_pass",[
            "Password Mismatch"=>[
                "rule"=>["comparewith","password"],
                "message"=>"Password didn't Match"]
            ]);*/
     	return $val; 
    }

}
?>