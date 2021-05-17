<div class="row">
	<div class="panel panel-default">
	  <div class="panel-heading">Course List
	  	<?php echo $this->Html->link("+ Add Courses",
	  			"/Courses/create",[
	  				"class"=>"btn btn-success pull-right",
	  				"style"=>"margin-top:-6px;"]) ?>


	  </div>
		  <div class="panel-body">
		  	<table class="table">
    <thead>
      <tr>
        <th>Sr No</th>
        <th>Course Name</th>
        <th>Email Address</th>
        <th>Description</th>
        <th>Status</th>
        <th>Date_Time</th>
      </tr>
    </thead>
	    <tbody>
	    	<?php
	    	$count=1;
	    	$course=array('CakePHP','Laravel','CI','Django');
	    	foreach ($Users as $key => $user) {
	    ?>
	    <tr>
	        <td><?php  echo $count++; ?></td>
	        <td><?php  echo $course[$user->course]; ?></td>
	        <td><?php  echo $user->username; ?></td>
	        <td><?php  echo $user->description; ?></td>
	        <td><?php  if($user['status']==0)
	        				{
	        					echo "Pending";	
	        				}
	        			elseif ($user['status']==1) {
	        					echo "Approved";
	        				}
	        			elseif ($user['status']==2) {
	        					echo "Rejected";
	        				}	
	        			 ?></td>
	        <td><?php   echo $user->date_time;  ?></td>
	      </tr>
	    <?php
	    		}
	    	?>     

	      
	    </tbody>
  </table>
		  </div>
	</div>
</div>