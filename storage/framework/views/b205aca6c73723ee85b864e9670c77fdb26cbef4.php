<?php $__env->startSection('content'); ?>

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Inquiry Under Pricing</li>
</ul>

<div class="page-title">
    <h2>Inquiry Under Pricing</h2>
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
                                        <th width="150">Sub Work Zone</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Size</th>
                                        <th>Budgetory Price</th>
                                        <th width="100">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($val->sub_work_zone); ?></td>
                                                <td><?php echo e($val->description); ?></td>
                                                <td><?php echo e($val->quantity .' '.$val->quantity_unit); ?></td>
                                                <td><?php echo e($val->size.' '.$val->size_unit); ?></td>
                                                <td><?php echo e(number_format(($val->budgetory_price),2)); ?> AED</td>
                                                <td><a href="<?php echo e(asset('boq/addboqsub/'.$val->boq_id.'/'.$val->id)); ?>" class="btn btn-danger">Edit</a> </td>
                                            </tr>
                                            <?php if(count($val->acc)): ?>
                                                <?php $__currentLoopData = $val->acc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k2 => $val2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td style="background: #dee7f2">-</td>
                                                        <td style="background: #dee7f2"><?php echo e($val2->description); ?></td>
                                                        <td style="background: #dee7f2"><?php echo e($val2->quantity); ?></td>
                                                        <td style="background: #dee7f2">-</td>
                                                        <td style="background: #dee7f2">-</td>
                                                        <td style="background: #dee7f2">-</td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="<?php echo e(asset('materialinquiry/margeboqs/'.request()->work_zone_id.'/'.request()->id)); ?>" style="margin-left:10px;padding: 15px 60px" class="btn btn-success pull-right">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>