<h2></h2>
<div class="container">
<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>


	<?php
		echo $this->Form->input('id', array('class' => 'form-control'));
		echo $this->Form->input('username', array('class' => 'form-control'));
		echo $this->Form->input('password', array('class' => 'form-control'));
		echo $this->Form->input('full_name', array('class' => 'form-control'));
	?>
	</fieldset>
	<br>
	<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-info')); ?>
<br>
</div>
	<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
    Actions
    <span class="caret"></span>
  </button>
 <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), array(), __('Are you sure you want to delete Username: %s?', $this->Form->value('User.username'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
	</ul>
</div>
</div>