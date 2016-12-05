<?php $__env->startSection('content'); ?>
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-lg-offset-1">
				<?php echo e(Session::get('message')); ?>

				<div class="panel panel-default">
					<div class="panel-heading"><strong>Admin AdUnit</strong>
						<a href="<?php echo e(route('createUnit')); ?>" name="btn_add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add</a><br><br>
					</div>
						<div class="panel-body">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>AdUnit ID</th>
									<th>Name</th>
									<th>Application ID</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($adUnits as $adUnit): ?>
								<tr>
									<td><?php echo e(++$i); ?></td>
									<td><?php echo e($adUnit->adUnit_id); ?></td>
									<td><?php echo e($adUnit->name); ?></td>
									<td><?php echo e($adUnit->fk_app); ?></td>
									<td>
										<a href="" name="btn_edit" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</a>
										<a href="" name="btn_delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
				<?php echo $adUnits->render(); ?>

			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>