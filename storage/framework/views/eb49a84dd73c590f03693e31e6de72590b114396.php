<?php $__env->startSection('content'); ?>
<!-- page content -->
<div class="right_col" role="main">
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Assalamualaikum user :
						<b><?php echo e(Auth::user()->name); ?></b>
					</div>
					<div class="panel-body">
						anda login sebagai user
					</div>
				</div>
			</div>
		</div>
	</div>
	 <div class="row">
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>