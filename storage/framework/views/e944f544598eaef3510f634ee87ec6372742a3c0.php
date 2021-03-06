<?php $__env->startSection('content'); ?>
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Subcontractor Request </li>
        <li class="active">Create Request</li>
    </ul>
    <div class="page-title">
        <h2>Create Request</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                            <form class="form-horizontal" method="POST" action="<?php echo e(url('subcontractorrequest/addSCrequest')); ?>">
                             <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="scr_id" value="<?php echo e($scr_id); ?>" >
                            <div class="panel-heading">
                                <h3 class="panel-title">Add</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Date</label>
                                            <div class="col-md-10">
                                                <div class="input-group" <?php echo e($errors->default->has('date') ?  $errors->default->first('date') : ''); ?> style="width: 100%">
                                                    <input id="date" type="text" value="" class="form-control datepicker" name="date" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Close Date</label>
                                            <div class="col-md-10">
                                                <div class="input-group" <?php echo e($errors->default->has('closeDate') ?  $errors->default->first('closeDate') : ''); ?> style="width: 100%">
                                                    <input id="closeDate" type="text" value="" class="form-control datepicker" name="closeDate" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Description</label>
                                            <div class="col-md-10">
                                                <div class="input-group"  style="width: 100%">
                                                    <textarea class="form-control" id="description" name="description"></textarea>
                                                </div>
                                                <div class="errorMasseges" style="padding:10px 0px">
                                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="alert alert-danger"><?php echo e($error); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            <div class="panel-footer">

                                <input style="margin-left:10px;width:70px" type="submit" value="Add" class="btn btn-primary pull-right" />
                                <a href="<?php echo e(asset('scr/showsubscr/'.$scr_id)); ?>" style="width:70px" class="btn btn-danger pull-right" >Cancel</a>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>