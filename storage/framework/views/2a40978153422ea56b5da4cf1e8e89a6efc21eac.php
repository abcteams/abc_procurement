<?php $__env->startSection('content'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <ul class="breadcrumb">
        <li><a href="<?php echo e(asset('home')); ?>">Home</a></li>
        <li><a href="<?php echo e(asset('users/showUsers')); ?>">Users</a></li>
        <li class="active">Rules</li>
    </ul>
    <div class="page-title">
        <h2><?php echo e($user[0]->name); ?></h2>
    </div>

    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12" style="padding-top: 10px">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Work Zone</th>
                                            <th>Rules</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $workzones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php ($checked   =   'checked'); ?>

                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($val->id == $val2->work_zone_id): ?>
                                                    <?php ($checked = ''); ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <tr  class="subMatItems">
                                                <td><?php echo e($val->title); ?></td>
                                                <td>
                                                    <label class="switch switch-small">
                                                        <label class="switch switch-small">
                                                            <input type="checkbox" value="<?php echo e($val->id); ?>" class="workzone" <?php echo e($checked); ?> >
                                                            <span></span>
                                                        </label>
                                                    </label>
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
            <div class="panel-footer">
                <div class="row" style="padding:20px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-8 col-sm-8 col-xs-8"></div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <button onclick="saveWorkzoneRules()" class="btn btn-success pull-right" style="width:120px;padding:10px">Save</button>
                            <a href="<?php echo e(asset('users/showUsers')); ?>" style="width:120px;padding:10px;margin-right: 10px" class="btn btn-danger pull-right">Cancel</a>
                        </div>
                    </div>
                    <div style="height:200px">
                        <input type="hidden" value="<?php echo e($user[0]->id); ?>" id="user_id">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo e(asset('js/User/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>