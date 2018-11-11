<?php $__env->startSection('content'); ?>
    <ul class="breadcrumb">
        <li><a href="<?php echo e(asset('home')); ?>">Home</a></li>
        <li><a href="<?php echo e(asset('workzone/show')); ?>">Work Zone</a> </li>
        <li><a href="<?php echo e(URL::previous()); ?>">Sub Work Zone</a></li>
        <li class="active">Add Sub Work Zone</li>
    </ul>
    <div class="page-title">
        <h2><?php echo e($workzone[0]->title); ?> </h2><h4 style="padding-top:10px">&nbsp -> Add Sub </h4>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <form class="form-horizontal" method="POST" action="<?php echo e(url('workzone/addsubworkzone')); ?>"  enctype="multipart/form-data">
                             <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e(isset($theRecord[0])?$theRecord[0]->id:'0'); ?>" >
                            <div class="panel-heading">
                                <h3 class="panel-title">Add</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Title</label>
                                            <div class="col-md-10">
                                                <div class="input-group" <?php echo e($errors->default->has('title') ?  $errors->default->first('title') : ''); ?> style="width: 100%">
                                                    <input id="title" type="text" value="<?php echo e(isset($theRecord[0])?$theRecord[0]->title:''); ?>" class="form-control" name="title" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <?php if(isset($theRecord[0])): ?>
                                    <?php if(file_exists('boundary/'.$theRecord[0]->id)): ?>
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label for="old_boundary" class="col-md-2 control-label" style="line-height: 15px;">Currently Boundary</label>
                                                    <div class="col-md-10">
                                                        <div class="input-group" style="width: 100%">

                                                            <?php ($files = File::allFiles('boundary/'.$theRecord[0]->id)); ?>
                                                            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file=>$f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <a href="<?php echo e(asset($f->getPathname())); ?>">View Boundary</a>
                                                                .....................................
                                                                <a href="#" onclick='removeBoundary("<?php echo e($theRecord[0]->id); ?>","<?php echo e($f->getFilename()); ?>")' class="glyphicon glyphicon-remove" style="color:#b13f3f;cursor: pointer;"></a><br>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <br>
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Add Boundary</label>
                                            <div class="col-md-10">
                                                <div class="input-group" style="width: 100%">
                                                    <input type="file" name="boundary" onchange="uploadBoundary(this)"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br><br>
                            <div class="panel-footer">
                                <input type="hidden" value="<?php echo e($workzone[0]->id); ?>" name="workzoneId" >
                                <input style="margin-left:10px;width:70px" type="submit" value="<?php echo e(isset($theRecord[0])?'update':'add'); ?>" class="btn btn-primary pull-right" />
                                <a href="<?php echo e(asset('workzone/showsub/'.$workzone[0]->id)); ?>" style="width:70px" class="btn btn-danger pull-right">Cancel</a>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('js/workzone/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>