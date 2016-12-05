<?php $__env->startSection('content'); ?>
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <?php echo e(Session::get('message')); ?>

            <div class="panel panel-default">
                <div class="panel-heading"><strong>Dashboard Admin</strong>
                <a href="<?php echo e(route('create')); ?>" name="btn_add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add</a><br><br>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($users as $user): ?>
                        <tr>
                            <td><?php echo e(++$i); ?></td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td> 
                            <?php if($user->isadmin == 1): ?> 
                                <?php echo e("Admin"); ?>

                            <?php else: ?>
                                <?php echo e("User"); ?>

                            <?php endif; ?> 
                            </td>
                            <td>
                                <form method="POST" action="<?php echo e(route('delete', $user->id)); ?>" accept-charset="UTF-8">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <a href="<?php echo e(route('edit', $user->id)); ?>" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span>Edit</a>  
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');"><span class="glyphicon glyphicon-trash"></span>Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                    </div>
            </div>
            <?php echo $users->render(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>