<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;    
}
</style>
</head>
<body>

<table style="width:100%">
  <tr>
    <th>Sr No.</th>
    <th>Course</th>
    <th>Email</th>
    <th>Description</th>
    <th>Action</th>

  </tr>
    <?php
        $courses = array('cakePHP','Laravel','Django','Flask');
        $count=1;
        foreach ($course as $key => $user) {
      ?><tr>
          <td><?= $count++; ?></td>

           <td><?php  $var=explode(',', $user->course);
              if(in_array(0, $var))
                echo "CakePHP,";
              if (in_array(1, $var)) 
                echo "Laravel,";
              if (in_array(2, $var)) 
                echo "Django,";
              if (in_array(3, $var)) 
                echo "Flask";
                  ?></td>
          <td><?= $user->username; ?></td>
          <td><?= $user->description; ?></td>
           <td>
            <?php
            if($user['status']==1)
            {
              echo "Approved";
            } 
            elseif ($user['status']==2) {
              echo "Rejected";
            }
            else
            {
              echo $this->Html->link('Approve',['action'=>'approve',$user->id])."<br>"; 
              
              echo $this->Html->link('Reject',['action'=>'reject',$user->id]);   
            }
            
            ?>         
          </td>
        </tr>
      <?php
        }
        ?>    
        
</table>

</body>
</html>
