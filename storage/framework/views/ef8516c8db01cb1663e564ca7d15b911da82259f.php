<?php $__env->startSection('content'); ?>

    <ul class="breadcrumb">
        <li><a href="<?php echo e(asset('home')); ?>">Home</a></li>
        <li ><a href="<?php echo e(asset('scl/show')); ?>">Subcontractor Category</a></li>
        <li class="active">Pending Sub Materials</li>
    </ul>

    <div class="page-title">
        <h2>Pending</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">List</h3>
                            </div>
                            <div class="panel-body panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-actions">
                                        <thead>
                                        <tr>
                                            <th width="300">Items Name</th>
                                            <th>Subcontractor Category</th>
                                            <th>Description</th>
                                            <th width="300">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($val->title); ?></td>
                                                <td><?php echo e($val->scl_title); ?></td>
                                                <td><?php echo e($val->description); ?></td>
                                                <?php if($val->is_approved == 0): ?>
                                                    <?php if($auth->can_approve == 1): ?>
                                                        <td>
                                                            <a href="<?php echo e(asset('scl/approveSubPending/'.$val->id)); ?>" class="btn btn-success">Procurement Approve</a>
                                                            <button class="btn btn-danger" id="deleteUser"  onclick="delete_sub('<?php echo e($val->id); ?>' , 2);">Reject</button>
                                                        </td>
                                                        </td>
                                                    <?php else: ?>
                                                        <td>Wait For Procurement Approval</td>
                                                    <?php endif; ?>
                                                <?php elseif($val->is_approved2 == 0): ?>
                                                    <?php if($auth->can_approve2 == 1): ?>
                                                        <td>
                                                            <a href="<?php echo e(asset('scl/approve2SubPending/'.$val->id)); ?>" class="btn btn-success">Technical Approve</a>
                                                            <button class="btn btn-danger" id="deleteUser"  onclick="delete_sub('<?php echo e($val->id); ?>' , 2);">Reject</button>
                                                        </td>
                                                    <?php else: ?>
                                                        <td>Wait For Technical Approval</td>
                                                    <?php endif; ?>

                                                <?php elseif($val->is_approved3 == 0): ?>
                                                    <?php if($auth->can_approve3 == 1): ?>
                                                        <td>
                                                            <a href="<?php echo e(asset('scl/approve3SubPending/'.$val->id)); ?>" class="btn btn-success">Project Manger Approve</a>
                                                            <button class="btn btn-danger" id="deleteUser"  onclick="delete_sub('<?php echo e($val->id); ?>' , 2);">Reject</button>
                                                        </td>
                                                    <?php else: ?>
                                                        <td>Wait For Project Manger Approval</td>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(count($data)==""): ?>
                                            <tr class="text-center">
                                                <td colspan="4" style="color: dimgray;">No Pending Requests Found !</td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('js/Scl/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>