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

</div>
