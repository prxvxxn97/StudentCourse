<div class="users form">
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->control('username') ?>
        <?= $this->Form->control('password') ?>
    </fieldset>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
<center>
	<p><b>Register Here!?
<u>
<?= $this->Html->link("Registration",['controller'=>'Users' ,'action'=>'add']); ?>
</u>
</p>
</center>
</div>