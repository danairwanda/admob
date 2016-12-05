<?php $__env->startSection('main'); ?>
<h1>All Users</h1>
<p><?php echo e(link_to_route('users.create','Add new user')); ?></p>
<?php if($users->count()): ?>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Username</th>
				<th>Password</th>
				<th>Phone</th>
				<th>Name</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($users as $user): ?>
			<tr>
				<td><?php echo e($user->name); ?></td>
				<td><?php echo e($user->email); ?></td>
				<td><?php echo e(link_to_route('user.edit','Edit', array($user->id), array('class' => 'btn btn-info'))); ?></td>
				<td>
					<?php echo e(Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id)))); ?>

					<?php echo e(Form::submit('Delete', array('class' => 'btn btn-danger'))); ?>

					<?php echo e(Form::close()); ?>

				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php else: ?>
		There are no users
	<?php endif; ?>
	<?php $__env->stopSection(); ?>