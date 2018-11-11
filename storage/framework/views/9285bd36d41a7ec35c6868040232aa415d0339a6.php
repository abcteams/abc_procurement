<?php $__env->startSection('content'); ?>

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Pending Inquiry</li>
        <li class="active">Consider</li>
    </ul>

    <div class="page-title">
        <h2>Consider</h2>
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
                                            <th>Name</th>
                                            <th>Period</th>
                                            <th>Datasheets</th>
                                            <th>Quotations</th>
                                            <th>Our Price</th>
                                            <th>Supplier Price</th>
                                            <th>Compliance</th>
                                            <th>Contact Person</th>
                                            <th>Contact Email</th>
                                            <th>Approve</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($val->name); ?></td>
                                                <td><?php echo e($val->delivery_period); ?></td>
                                                <td>
                                                    <?php if(file_exists('datasheets/'.$val->id)): ?>
                                                        <?php ($files = File::allFiles('datasheets/'.$val->id)); ?>
                                                        <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file=>$f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <a href="<?php echo e(asset($f->getPathname())); ?>">Datasheet</a><br>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if(file_exists('quotations/'.$val->id)): ?>
                                                        <?php ($files = File::allFiles('quotations/'.$val->id)); ?>
                                                        <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file=>$f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <a href="<?php echo e(asset($f->getPathname())); ?>">Quotation</a><br>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="color: white;background: #756d6d"><?php echo e($val->ourPrice.' AED'); ?></td>
                                                <td style="color: white;background: #843939"><?php echo e($val->total_price.' AED'); ?></td>
                                                <td><?php echo e($val->compliance); ?></td>
                                                <td><?php echo e($val->contact_person); ?></td>
                                                <td><?php echo e($val->email); ?></td>
                                                <td>
                                                    <a style="width: 100px" href="<?php echo e(asset('materialinquiry/approveProposal/'.$val->id)); ?>" class="btn btn-success ">Approve</a>
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