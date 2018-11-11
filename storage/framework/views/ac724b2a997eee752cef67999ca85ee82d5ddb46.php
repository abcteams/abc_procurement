<?php $__env->startSection('content'); ?>
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li>User Profiel </li>
        <li class="active">Change Password</li>
    </ul>
    <div class="page-title">
        <h2>Change Password</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <form class="form-horizontal" method="POST" action="<?php echo e(url('users/changeThePassword')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="panel-heading">
                                <h3 class="panel-title">Add</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label  class="col-md-4 control-label">Old Password</label>
                                            <div class="col-md-8">
                                                <div class="input-group" style="width: 100%">
                                                    <input type="password" class="form-control"  required name="old_password"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">New Password</label>
                                            <div class="col-md-8">
                                                <div class="input-group" style="width: 100%">
                                                    <input type="password" class="form-control"  required  name="my_password" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Confirm Password</label>
                                            <div class="col-md-8">
                                                <div class="input-group"  style="width: 100%">
                                                    <input type="password"  class="form-control" name="cpassword" >
                                                </div>
                                                <div class="errorMasseges" style="padding:10px 0px">
                                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="alert alert-danger"><?php echo e($error); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                <div class="panel-footer">

                                    <input style="margin-left:10px;width:70px" type="submit" value="Update" class="btn btn-primary pull-right" />
                                    <a href="<?php echo e(url()->previous()); ?>" style="width:70px" class="btn btn-danger pull-right" >Cancel</a>
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