<?php $__env->startSection('content'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Materials </li>
    <li class="active">Pending </li>
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
                                        <th>Work Zone</th>
                                        <th width="150">Sub Gml</th>
                                        <th width="150">Date</th>
                                        <th width="150">Close Date</th>
                                        <th>Description</th>
                                        <th width="120">Details</th>
                                        <th width="120">Approve</th>
                                        <th width="100">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($val->wztitle); ?></td>
                                                <td><?php echo e($val->gmltitle); ?></td>
                                                <td><?php echo e($val->date); ?></td>
                                                <td><?php echo e($val->close_date); ?></td>
                                                <td><?php echo e($val->description); ?></td>
                                                <td><a href="<?php echo e(asset('materialinquiry/showInquirydetails/'.$val->work_zone_id.'/'.$val->sub_gml_id.'/'.$val->id)); ?>" class="btn btn-info">Details</a></td>
                                                <td><a href="<?php echo e(asset('materialinquiry/approve/'.$val->id)); ?>" class="btn btn-success">Send to Suppliers</a></td>
                                                <td><div class="btn btn-danger" onclick="removeinquiry('<?php echo e($val->work_zone_id); ?>','<?php echo e($val->sub_gml_id); ?>','<?php echo e($val->id); ?>')">Delete</div></td>
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
<script src="<?php echo e(asset('js/BOQ/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>