<?php $__env->startSection('content'); ?>

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">pending Agreement</li>
</ul>

<div class="page-title">
    <h2>pending Agreement</h2>
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
                                        <th>Material</th>
                                        <th>Company</th>
                                        <th>Approve Date</th>
                                        <th>Final Price</th>
                                        <th>Payment Terms</th>
                                        <th>Delivery Agreement</th>
                                        <th>Approve</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($val->title); ?></td>
                                                <td>ABC</td>
                                                <td><?php echo e($val->approve_date); ?></td>
                                                <td style="background: #5d8da0;color: white"><?php echo e($val->final_price); ?></td>
                                                <td><?php echo e($val->payment_terms); ?></td>
                                                <td><?php echo e($val->delivery_agreement); ?></td>
                                                <td style="width: 200px">
                                                    <a href="<?php echo e(asset('subcontractor/accepetAgreement/'.$val->id)); ?>" class="btn btn-success" style="width: 150px">Accept</a><br />
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

<script src="<?php echo e(asset('js/Supplier/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>