<?php $__env->startSection('content'); ?>
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-lg-offset-1">
			<?php echo e(Session::get('message')); ?>

			<div class="panel panel-default">
				<div class="panel-heading"><strong>Admin Application</strong>
					<a href="<?php echo e(route('createApp')); ?>" name="btn_add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add</a><br><br>
				</div>
				<div class="panel-body">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Application ID</th>
							<th>Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($apps as $app): ?>
						<tr>
							<td><?php echo e(++$i); ?></td>
							<td><?php echo e($app->app_id); ?></td>
							<td><?php echo e($app->name); ?></td>
							<td>
								<form  method="POST" action="<?php echo e(route('deleteApp', $app->id)); ?>" accept-charset="UTF-8">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
									<a href="<?php echo e(route('editApp', $app->id)); ?>" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</a>
									<button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');"><span class="glyphicon glyphicon-trash"></span> Delete</button>
								</form>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				</div>
			</div>
			<?php echo $apps->render(); ?>

		</div>
	</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>