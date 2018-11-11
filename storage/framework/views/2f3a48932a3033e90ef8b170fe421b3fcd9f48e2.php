<?php $__env->startSection('content'); ?>

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Requisition Reports </li>
</ul>
<div class="page-title">
    <h2>Reports</h2>
</div>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo e($val->subgml); ?></h3>
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                                <div class="pull-left">
                                                    <table>
                                                        <tr>
                                                            <td width="100px">Order Date</td>
                                                            <td><?php echo e($val->order_date); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Delivery Date</td>
                                                            <td><?php echo e($val->delivery_date); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Complete Date</td>
                                                            <td><?php echo e($val->complete_date); ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="pull-right"><table>
                                                        <tr>
                                                            <td width="120px">Order Number</td>
                                                            <td><?php echo e($val->order_number); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Job No</td>
                                                            <td><?php echo e($val->job_no); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Site in Charge</td>
                                                            <td><?php echo e($val->name); ?></td>
                                                        </tr>
                                                    </table></div>
                                        </div>
                                        <div class="panel-body">
                                            <h3>LPO Status</h3>
                                            <div class="wizard">
                                                <ul class="steps_4 anchor">
                                                    <li>
                                                        <a href="#step-1" class="<?php echo e($val->is_approved == 1 ? 'selected':'disabled'); ?>" isdone="1" rel="1">
                                                            <span class="stepNumber">1</span>
                                                            <span class="stepDesc">Step 1<br><small>Procurement</small></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#step-2" class="<?php echo e($val->is_checked_out == 1 ? 'selected':'disabled'); ?>" isdone="1" rel="1">
                                                            <span class="stepNumber">2</span>
                                                            <span class="stepDesc">Step 2<br><small>Commercial</small></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#step-3" class="<?php echo e($val->supplier_approved == 1 ? 'selected':'disabled'); ?>" isdone="1" rel="1">
                                                            <span class="stepNumber">3</span>
                                                            <span class="stepDesc">Step 3<br><small>Supplier</small></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#step-4" class="<?php echo e($val->is_approved_req == 1 ? 'selected':'disabled'); ?>" isdone="1" rel="1">
                                                            <span class="stepNumber">4</span>
                                                            <span class="stepDesc">Step 4<br><small>Procurement</small></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#step-5" class="<?php echo e($val->is_approved_lpo == 1 ? 'selected':'disabled'); ?>" isdone="1" rel="1">
                                                            <span class="stepNumber">5</span>
                                                            <span class="stepDesc">Step 5<br><small>LPO</small></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#step-6" class="<?php echo e($val->is_delivered == 1 ? 'selected':'disabled'); ?>" isdone="1" rel="1">
                                                            <span class="stepNumber">6</span>
                                                            <span class="stepDesc">Step 6<br><small>Awating</small></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#step-7" class="<?php echo e($val->is_delivered == 1 ? 'selected':'disabled'); ?>" isdone="0" rel="0">
                                                            <span class="stepNumber">7</span>
                                                            <span class="stepDesc">Step 7<br><small>Delivered</small></span>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <a href="<?php echo e(asset('materialrequisition/requisitionDetails/'.$data[0]->id)); ?>" class="btn btn-info pull-right" style="padding: 10px 25px">Details</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>