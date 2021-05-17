<div class="users form">
<?= $this->Form->create($user); ?>
    <fieldset>
        <legend><?= __('Registration Form') ?></legend>
        <?= $this->Form->control('name') ?>
        <?= $this->Form->control('username') ?>
        <?= $this->Form->control('password') ?>
        <?= $this->Form->control('mobile') ?>

   </fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end() ?>
<center>
	<p><b>Already Register?
<u>
<?= $this->Html->link("Sign In",['controller'=>'Users' ,'action'=>'login']); ?>
</u>
</p>
</center>


</div>