<h2></h2>
<div class="container">
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><b><?php echo h($user['User']['full_name']); ?></b></div>

  <!-- Table -->
  <table class="table">
  	<thead>
  		<tr>
  			<th>Id</th>
  			<th>Username</th>
  			<th>Password</th>
  			<th>Full Name</th>
  		</tr>
  	</thead>
  	<tbody>
  		<tr>
  			<td><?php echo h($user['User']['id']); ?></td>
  			<td><?php echo h($user['User']['username']); ?></td>
  			<td><?php echo h($user['User']['password']); ?></td>
  			<td><?php echo h($user['User']['full_name']); ?></td>
  		</tr>
  	</tbody>	
  </table>
</div>
	<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
    Actions
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
	</ul>
</div>

</div>
