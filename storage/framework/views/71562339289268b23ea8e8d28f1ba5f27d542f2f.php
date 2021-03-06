<?php $__env->startSection('content'); ?>

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Materials Requisition</li>
    <li class="active">Pending </li>
</ul>

<div class="page-title">
    <h2>Materials Requisition Pending</h2>
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
                                        <th>Work Zone</th>
                                        <th>Material</th>
                                        <th>Order date</th>
                                        <th>Delivery date</th>
                                        <th>Complete date</th>
                                        <th width="120">Details</th>
                                        <th width="120">Approve</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($val->workzone); ?></td>
                                            <td><?php echo e($val->gml); ?></td>
                                            <td><?php echo e($val->order_date); ?></td>
                                            <td><?php echo e($val->delivery_date); ?></td>
                                            <td><?php echo e($val->complete_date); ?></td>
                                            <td><a href="<?php echo e(asset('materialrequisition/requisitionDetails/'.$val->id)); ?>" class="btn btn-info">Details</a></td>
                                            <td><a href="<?php echo e(asset('materialrequisition/approveReqPending/'.$val->id)); ?>" class="btn btn-success">Approve</a></td>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>