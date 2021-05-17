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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
function approve()
{
            var checkedValue = $('.selected_usercheckbox:checked').map(function() {return this.value;}).get().join(',');
            $.ajax({
            url: "http://zabardaast.com/Admins/approve",
            type: "POST",
            data: {id : checkedValue},
            cache: false,
            success: function(html){
              location.reload();

              }

            });
}

function reject()
{

            var checkedValue = $('.selected_usercheckbox:checked').map(function() {return this.value;}).get().join(',');
            $.ajax({
            url: "http://zabardaast.com/Admins/reject",
            type: "POST",
            data: {id : checkedValue},
            cache: false,
            success: function(html){
              location.reload();

              }

            });
}

</script>
<?= $this->Form->button('Approve',['onclick'=>'approve()']); ?>
<?= $this->Form->button('Reject',['onclick'=>'reject()' ]); ?>
  <tr>
   <!--<th><input type="checkbox" onclick="toggle(this);" />Select All<br /></th>-->
    <th>Sr No.</th>
    <th>Course</th>
    <th>Email</th>
    <th>Description</th>
    <th><?= $this->Form->checkbox('select',['onclick'=>"toggle(this)"]).'Select All'; ?></th>


  </tr>
    <?php
        //$courses = array('cakePHP','Laravel','Django','Flask');
        $page=$this->request->getQuery('page');
        $serial=($page*4)-4; 
        $count=1; 
        foreach ($course as $key => $user) {
          $serial++;
      ?>
      <tr>
        <?php
          if($page==0)
            {
              ?>
              <td><?= $count++; ?></td>

           <?php }
           else
           {
            ?>
              <td><?= $serial; ?></td>   
           <?php } ?>

           <td><?php  
              if($user->course==0)
                echo "CakePHP";
              if ($user->course==1) 
                echo "Laravel";
              if ($user->course==2) 
                echo "CI";
              if ($user->course==3) 
                echo "Django";
                  ?></td>
          <td><?= $user->username; ?></td>
          <td><?= $user->description; ?></td>

           <td>
            <?php
            if($user['status']==1)
            {
              echo "Approved";
            } 
            elseif ($user['status']==2) 
            {
              echo "Rejected";
            }
            else
            {
              ?>
              <?= $this->Form->checkbox('select',['value'=> $user->id,'class'=>'selected_usercheckbox']); ?>
              <!--<input type='checkbox' name='select'class='selected_usercheckbox' value="<?= $user->id ?>" -->
              <?php
              //echo $this->Form->checkbox('select',[$user->id,'class'=>'selected_usercheckbox']);
              /*echo $this->Html->link('Approve',['action'=>'approve',$user->id])."<br>"; 
              
              echo $this->Html->link('Reject',['action'=>'reject',$user->id]);*/   
            }
            
    //         foreach($apps as $app){


    //     echo $this->Form->input('Application.id', array('type'=>'checkbox','multiple' => 'checkbox' , 'id'=>$app['Application']['description'], 'div'=>false,'type'=>'checkbox','value' => $app['Application']['description'],'label'=>$app['Application']['description']));



    // }

            ?> 
            </td>        
        
        </tr>

      <?php
        }
        ?>   
</table>
          <ul class="pagination">
            <?= $this->Paginator->prev("<<") ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(">>") ?>

          </ul>
</body>
</html>




