<?php
namespace App\Controller;
use App\Controller\AppController;

class LinearController extends AppController
{
	public function lin()
	{
		$this->autoRender=false;
		$a=array(11,22,33,44,55);
		$b=$a[2];
		for($i=0;$i<count($a);$i++)
		{
			print_r($a);
			echo "<br>";
			if($b==$a[$i])
			{
				echo "Found ".$b;
				break;
			}
		}
	}
}

<!--<input type='checkbox' name='selected_user' id='selected_user' class='selected_usercheckbox' value="<?= $value->id ?>">
-->
  <!-- function send_notification()
        {

            var checkedValue = $('.selected_usercheckbox:checked').map(function() {return this.value;}).get().join(',');
            alert(checkedValue);
           
           /* var title = $("#title").val();
            var msg   = $("#msg").val();
            $.ajax({
                url:base_url+'Users/send_notification_to_selecte -->	

?>