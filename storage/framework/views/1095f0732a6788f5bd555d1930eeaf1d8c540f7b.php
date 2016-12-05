<?php $__env->startSection('content'); ?>

<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Admin
                <button type="button" class="btn btn-success pull-right" href="<?php echo e(route('users.create')); ?>">Add User</button>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($users as $user): ?>
                        <tr>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td> 
                            <?php if($user->isadmin == 1): ?> 
                                <?php echo e("Admin"); ?>

                            <?php else: ?>
                                <?php echo e("User"); ?>

                            <?php endif; ?> 
                            </td>
                            <td><button type="button" class="btn btn-info">Edit</button>  
                            <button type="button" class="btn btn-danger">Delete</button></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
            </div>
            <?php echo $users->render(); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>