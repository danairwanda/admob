<?php $__env->startSection('content'); ?>
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-lg-offset-1">
				<?php echo e(Session::get('message')); ?>

				<div class="panel panel-default">
					<div class="panel-heading"><strong>Admin Projects</strong>
						<?php echo Form::open(['method' => 'GET', 'url' => 'cariproject', 'role' => 'search']); ?>

						<div class="input-group custom-search-form col-md-4 col-lg-offset-8">
							<input type="text" class="form-control" name="search" placeholder="Search...">
							<span class="input-group-btn">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default"><i class="fa fa-search"></i>Cari</button>
								</span>
							</span>
						<?php echo Form::close(); ?>

					</div>
					</div>
						<div class="panel-body">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Application</th>
									<th>Unit</th>
									<th>Share</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($projects as $project): ?>
								<tr>
									<td><?php echo e(++$i); ?></td>
									<td><?php echo e($project->user->name); ?></td>
									<td><?php echo e($project->application->name); ?></td>
									<td><?php echo e($project->adunit->name); ?></td>
									<td><?php echo e($project->share); ?></td>
							
									<td>
										<form method="POST" action="" accept-charset="UTF-8">
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
											<a href="" name="btn_edit" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</a>
											<button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin menghapus data ?');"><span class="glyphicon glyphicon-trash"></span> Delete</button>
										</form>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
				<?php echo $projects->render(); ?>

			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>