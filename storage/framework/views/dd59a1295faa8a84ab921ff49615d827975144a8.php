<?php $__env->startSection('content'); ?>

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Pending Subcontractors</li>
</ul>

<div class="page-title">
    <h2>Pending Subcontractors</h2>
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
                                        <th class="listHeader">
                                            Name
                                        </th>
                                        <th class="listHeader">
                                            Email
                                        </th>
                                        <th class="listHeader">
                                            Company Name
                                        </th>
                                        <th class="listHeader">
                                            Country
                                        </th>
                                        <th class="listHeader">
                                            Address
                                        </th>
                                        <th width="120">Approve</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr  class="subMatItems">
                                                <td title="Sub Items" onclick="supplierInfo('<?php echo e($val->id); ?>')">
                                                    <strong>
                                                        <?php echo e($val->name); ?>

                                                    </strong>
                                                </td>
                                                <td  onclick="supplierInfo('<?php echo e($val->id); ?>')">
                                                    <?php echo e($val->email); ?>

                                                </td>
                                                <td onclick="supplierInfo('<?php echo e($val->id); ?>')">
                                                    <?php echo e($val->company_name); ?>

                                                </td>
                                                <td onclick="supplierInfo('<?php echo e($val->id); ?>')">
                                                    <?php echo e($val->nicename); ?>

                                                </td>
                                                <td onclick="supplierInfo('<?php echo e($val->id); ?>')">
                                                    <?php echo e($val->address); ?>

                                                </td>
                                                <td><a href="<?php echo e(asset('users/approveUser/'.$val->id)); ?>" class="btn btn-success">Approve</a></td>
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
<script src="<?php echo e(asset('js/User/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>