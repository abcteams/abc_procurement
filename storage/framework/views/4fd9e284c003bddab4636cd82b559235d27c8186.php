<?php $__env->startSection('content'); ?>
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Scubcontractor Category </li>
        <li class="active">Add Request</li>
    </ul>
    <div class="page-title">
        <h2>Add Subcontractor Request</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <form class="form-horizontal" method="POST" action="<?php echo e(url('scr/addscr')); ?>">
                             <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e(isset($theRecord[0])?$theRecord[0]->id:'0'); ?>" >
                            <input type="hidden" name="sub_work_zone_id" value="<?php echo e($sub_work_zone_id); ?>" >
                            <input type="hidden" name="work_zone_id" value="" >

                            <div class="panel-heading">
                                <h3 class="panel-title">Add</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">SCL</label>
                                            <div class="col-md-10">
                                                <div class="input-group" <?php echo e($errors->default->has('title') ?  $errors->default->first('title') : ''); ?> style="width: 100%">
                                                    <select class="select2 form-control" onchange="getSubScl(this)" name="state">
                                                        <option value="0">Choose SCL</option>
                                                        <?php $__currentLoopData = $scl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k =>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($val->id); ?>"><?php echo e($val->title); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Sub SCL</label>
                                            <div class="col-md-10">
                                                <div class="input-group" <?php echo e($errors->default->has('sub_scl') ?  $errors->default->first('sub_scl') : ''); ?> style="width: 100%">
                                                    <select class="select2 form-control" name="sub_scl" id="subScl">
                                                        <option value="0">Choose Sub scl</option>
                                                    </select>
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
                                            <div class="col-md-2"></div>
                                            <div class="col-md-10">
                                                <div class="errorMasseges" style="padding:10px 0px">
                                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="alert alert-danger"><?php echo e($error); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div><br>
                            <div class="panel-footer">

                                <input style="margin-left:10px;width:70px" type="submit" value="<?php echo e(isset($theRecord[0])?'update':'add'); ?>" class="btn btn-primary pull-right" />
                                <a href="<?php echo e(asset('scr/show/'.$sub_work_zone_id)); ?>" style="width:70px" class="btn btn-danger pull-right" >Cancel</a>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT -->
    </div>
    <script src="<?php echo e(asset('js/SCR/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>