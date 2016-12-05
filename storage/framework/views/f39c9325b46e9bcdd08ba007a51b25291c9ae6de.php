<?php $__env->startSection('content'); ?>
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Dashboard Admin</div>
				<div class="panel-body">
					Assalamualaikum : <b><?php echo e(Auth::user()->name); ?></b><br>
					Anda login sebagai admin, anda bisa melakukan manajemen data.
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>