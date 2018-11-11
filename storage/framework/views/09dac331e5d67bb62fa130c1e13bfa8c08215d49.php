<?php $__env->startSection('content'); ?>
    <ul class="breadcrumb">
        <li><a href="<?php echo e(asset('home')); ?>">Home</a></li>
        <li><a href="<?php echo e(asset('users/showPositions')); ?>">Positions</a></li>
        <li class="active">Users </li>
    </ul>
    <div class="page-title">
        <h2>Position Users List</h2>
    </div>

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <br />
                        <div class="panel-body">
                            <br />

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Users List</h3>
                                        </div>
                                        <div class="panel-body panel-body-table">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-actions" id="gmlList" style="border:10px solid whitesmoke">
                                                    <tr>
                                                        <th class="listHeader" width="300">
                                                            Name
                                                        </th>
                                                        <th class="listHeader">
                                                            Email
                                                        </th>
                                                        <th class="listHeader" width="50">
                                                            Rules
                                                        </th>
                                                        <th class="listHeader" width="120">Status</th>
                                                    </tr>

                                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr class="subMatItems">
                                                            <td title="Sub Items" onclick="userProfile('<?php echo e($val->id); ?>')">
                                                                <strong>
                                                                    <?php echo e($val->name); ?>

                                                                </strong>
                                                            </td>
                                                            <td onclick="userProfile('<?php echo e($val->id); ?>')">
                                                                <?php echo e($val->email); ?>

                                                            </td>
                                                            <td>
                                                                <a href="<?php echo e(asset('users/usersrules/'.$val->id)); ?>" class="btn btn-info" style="width: 120px">Rules</a>
                                                            </td>
                                                            <td>
                                                                <span class="fa fa-circle" style="color:#0dd20d;font-size: 16px;"></span>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </table>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                        </div>
                                    </div>
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