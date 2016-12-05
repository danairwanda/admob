<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">AdUnit</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('updateUnit', $adUnits->id)); ?>">
						<?php echo e(csrf_field()); ?>

						<?php /* input adunit ID */ ?>
						<div class="form-group">
							<label for="AdUnit_id" class="col-md-4 control-label">AdUnit ID</label>
								<div class="col-md-6">
									<input type="text" id="AdUnit_id" class="form-control" name="AdUnit_id" value="<?php echo e($adUnits->adUnit_id); ?>">
								</div>
						</div>
						<?php /* input adunit name */ ?>
						<div class="form-group">
							<label for="name" class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" id="name" class="form-control" name="name" value="<?php echo e($adUnits->name); ?>">
							</div>
						</div>
						<?php /* dropdown application ID */ ?>
						<div class="form-group">
							<label for="fk_app" class="col-md-4 control-label">Application ID</label>
							<div class="col-md-6">
								<select name="fk_app" class="form-control">
									<option value="<?php echo e($adUnits->fk_app); ?>"><?php echo e($adUnits->fk_app); ?></option>
									<?php foreach($all as $unit): ?>
										<option value="<?php echo e($unit->fk_app); ?>"><?php echo e($unit->fk_app); ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<?php /* submit save */ ?>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-btn fa-user"></i>Update
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>