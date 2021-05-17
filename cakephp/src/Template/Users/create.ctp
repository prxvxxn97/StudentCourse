<div class="panel panel-default">
  <div class="panel-heading">
<?php
echo $this->Html->link(
      "< Back",
      "/Users/index",
      [
        "class"=>"btn btn-info pull-right",
        "style"=>"margin-top:-6px;"]);

?>

  </div>
  <div class="panel-body">
    <?php echo $this->Form->create(); ?>
  	<div class="form-group">
    <label class="control-label col-sm-2" for="name"></label>
    <div class="col-sm-10">
      <?php
        $options = array('CakePHP', 'Laravel', 'Django','Flask');
        echo $this->Form->input('Courses' , 
            array('multiple' => 'checkbox', 'options' => $options)
        );
      ?>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-12" for="email"></label>
    <div class="col-sm-13">
     <?php echo $this->Form->control('username',['value'=>$username,'readonly'=>'readonly']); ?>
  </div>


  <div class="form-group">
    <label class="control-label col-sm-2" for="description"></label>
    <div class="col-sm-12">
    	<?php echo $this->Form->input('description');  ?>
    </div>
  </div>

  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </div>
</form>


  </div>
</div>