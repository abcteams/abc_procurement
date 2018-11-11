<?php $__env->startSection('content'); ?>
    <?php
    $allnoti    =   new \App\Notifications();
    ?>
    <ul class="breadcrumb">
        <li><a href="<?php echo e(asset('home')); ?>">Home</a></li>
        <li class="active">Notifications</li>
    </ul>

    <div class="page-title">
        <h2>All Notifications</h2>
    </div>
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">All Notifications</h3>
                            </div>
                            <div class="panel-body panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-actions">
                                        <thead>
                                        <tr>
                                            <th class="listHeader">Added at</th>
                                            <th class="listHeader">Notification</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="subMatItems">
                                                    <td><span class="fa fa-clock-o" style="padding-right:10px;"></span><?php echo e(\Carbon\Carbon::parse($val->created_at,'Asia/Dubai')->diffForHumans()); ?></td>
                                                    <td onclick="pendingGml('<?php echo e($val->link); ?>')"><?php echo e($val->description); ?></td>
                                                    <?php $allnoti->updateStatus($val->not_id); ?>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                     
                                        </tbody>
                                    </table>
                                    <div class="panel-footer">
                                        <div class="pull-right"><?php echo e($data->links()); ?></div>
                                    </div>        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('js/Notification/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>