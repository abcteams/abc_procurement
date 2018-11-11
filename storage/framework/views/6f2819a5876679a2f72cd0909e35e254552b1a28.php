<?php $__env->startSection('content'); ?>
    <ul class="breadcrumb">
        <li><a href="<?php echo e(asset('home')); ?>">Home</a></li>
        <li><a href="<?php echo e(asset('users/showUsers')); ?>">Users</a></li>
        <li class="active">Positions </li>
    </ul>
    <div class="page-title">
        <h2>Positions</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->

    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php if($auth->can_edit): ?>
                                <a href="<?php echo e(asset('users/addPosition')); ?>">
                                <button class="btn btn-primary btn-condensed">
                                    <span class="fa fa-plus"></span>
                                    Add New Position
                                </button>
                                </a>
                            <?php endif; ?>
                        </div>
                        <br />
                        <div class="panel-body">
                            <br />
                            <br />

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Positions List</h3>
                                        </div>
                                        <div class="panel-body panel-body-table">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-actions" id="gmlList" style="border:10px solid whitesmoke">
                                                    <tr>
                                                        <th class="listHeader" >
                                                            Position
                                                        </th>
                                                        <th class="listHeader" width="150">
                                                            Users
                                                        </th>
                                                        <?php if($auth->can_edit): ?>
                                                        <th class="listHeader" width="150px">Actions</th>
                                                        <?php endif; ?>
                                                    </tr>
                                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr class="subMatItems">
                                                            <td title="Sub Items">
                                                                <strong>
                                                                    <?php echo e($val->title); ?>

                                                                </strong>
                                                            </td>
                                                            <?php if($auth->can_show): ?>
                                                            <td>
                                                                <a href="<?php echo e(asset('users/positionUsers/'.$val->id)); ?>" class="btn btn-info" style="padding: 5px 30px;">Users</a>
                                                            </td>
                                                            <?php endif; ?>
                                                            <?php if($auth->can_edit): ?>
                                                            <td>
                                                                <a href="addPosition/<?php echo e($val->id); ?>" class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></a>
                                                                <button class="btn btn-danger btn-rounded btn-condensed btn-sm" onclick="delete_row('<?php echo e($val->id); ?>')"><span class="fa fa-times"></span></button>
                                                            </td>
                                                            <?php endif; ?>
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
    <script src="<?php echo e(asset('js/Gml/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>