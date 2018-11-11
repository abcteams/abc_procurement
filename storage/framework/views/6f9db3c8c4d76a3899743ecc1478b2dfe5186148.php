<?php $__env->startSection('content'); ?>

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Pending Suppliers</li>
    </ul>
    <div class="page-title">
        <h2>Pending Suppliers</h2>
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
                                            <?php if($auth->can_approve || $auth->can_approve2): ?>
                                                <th class="listHeader">
                                                    Action
                                                </th>
                                            <?php endif; ?>
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
                                                <?php if($val->is_approved == 0): ?>
                                                    <?php if($auth->can_approve): ?>
                                                        <td>
                                                            <a href="<?php echo e(asset('users/approveUser/'.$val->id)); ?>" class="btn btn-success">Procurement Approval</a>
                                                            <button onclick="delete_User('<?php echo e($val->id); ?>');" class="btn btn-danger">Reject</button>
                                                        </td>
                                                    <?php else: ?>
                                                        <td>Wait for Procurement approve</td>
                                                    <?php endif; ?>
                                                <?php elseif($val->is_approved2 == 0): ?>
                                                    <?php if($auth->can_approve2): ?>
                                                        <td>
                                                            <a href="<?php echo e(asset('users/approve2User/'.$val->id)); ?>" class="btn btn-success">Commercial Approval</a>
                                                            <button onclick="delete_User('<?php echo e($val->id); ?>');" class="btn btn-danger">Reject</button>
                                                        </td>
                                                    <?php else: ?>
                                                        <td>Wait for Commercial approve</td>
                                                    <?php endif; ?>
                                                <?php endif; ?>
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