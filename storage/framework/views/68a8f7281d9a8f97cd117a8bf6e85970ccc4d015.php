<?php $__env->startSection('content'); ?>
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-lg-offset-1"> 
            <div class="panel panel-default">
            <?php echo e(Session::get('message')); ?>

            <div class="panel-heading">
                <h4><i class="fa fa-users"></i><strong> DAFTAR USER</strong></h4><hr>
                <div class=row>
                    <div class="col-md-6">
                        <a href="<?php echo e(route('create')); ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah</a>
                        <a href="<?php echo e(route('users')); ?>" class="btn btn-success"><i class="fa fa-refresh"></i> Semua Data</a>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <!-- Form Pencarian -->
                    <div class="col-md-4">
                        <?php echo Form::open(['method'=>'GET','url'=>'cariuser','role'=>'search']); ?>

                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <span class="input-group-btn">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Cari</button>
                                 </span>
                             </span>
                         </div>
                         <?php echo Form::close(); ?>

                    </div>
                </div>
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
                                            <a href="<?php echo e(route('edit', $user->id)); ?>" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</a>  
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');"><span class="glyphicon glyphicon-trash"></span> Hapus</button>
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
        </div>    
    </div>
</div>  
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>