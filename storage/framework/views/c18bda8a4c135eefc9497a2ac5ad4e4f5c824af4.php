<?php $__env->startSection('content'); ?>

    <ul class="breadcrumb">
        <li><a href="<?php echo e(asset('home')); ?>">Home</a></li>
        <li ><a href="<?php echo e(asset('gml/show')); ?>">Materials</a></li>
        <li class="active">Pending </li>
    </ul>

    <div class="page-title">
        <h2>Pending Sub Material</h2>
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
                                            <th>Added</th>
                                            <th width="300">Items Name</th>
                                            <th>General Material</th>
                                            <th>Description</th>
                                            <th width="250">Approve</th>
                                            <th width="120">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(\Carbon\Carbon::parse($val->created_at,'Asia/Dubai')->diffForHumans()); ?></td>
                                                <td><?php echo e($val->title); ?></td>
                                                <td><?php echo e($val->gml_title); ?></td>
                                                <td><?php echo e($val->description); ?></td>
                                                <?php if($val->is_approved == 0): ?>
                                                    <?php if($auth->can_approve == 1): ?>
                                                        <td><a href="<?php echo e(asset('gml/approvePending/'.$val->id)); ?>" class="btn btn-success">Procurement Approve</a></td>
                                                    <?php else: ?>
                                                        <td>Wait For Procurement Approve</td>
                                                    <?php endif; ?>
                                                <?php elseif($val->is_approved2 == 0): ?>
                                                    <?php if($auth->can_approve2 == 1): ?>
                                                        <td><a href="<?php echo e(asset('gml/approve2Pending/'.$val->id)); ?>" class="btn btn-success">Technical Approve</a></td>
                                                    <?php else: ?>
                                                        <td>Wait For Technical Approve</td>
                                                    <?php endif; ?>

                                                <?php elseif($val->is_approved3 == 0): ?>
                                                    <?php if($auth->can_approve3 == 1): ?>
                                                        <td><a href="<?php echo e(asset('gml/approve3Pending/'.$val->id)); ?>" class="btn btn-success">Project Manger Approve</a></td>
                                                    <?php else: ?>
                                                        <td>Wait For Project Manger Approve</td>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <td>
                                                    <a href="<?php echo e(asset('gml/addsub/'.$val->gml_id.'/'.$val->id )); ?>" class="btn btn-default btn-rounded btn-condensed btn-sm"  title="edit"><span class="fa fa-pencil"></span></a>
                                                    <button class="btn btn-danger btn-rounded btn-condensed btn-sm" onclick="delete_sub('<?php echo e($val->id); ?>' , 2);"  title="delete"><span class="fa fa-times"></span></button>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <script src="<?php echo e(asset('js/Gml/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>