<?php $__env->startSection('content'); ?>
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Users </li>
    </ul>
    <div class="page-title">
        <h2>Users List</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="<?php echo e(asset('users/add')); ?>">
                                <button class="btn btn-success btn-condensed">
                                    <span class="fa fa-plus"></span>
                                    Add New User
                                </button>
                            </a>
                        </div>
                        <br />
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <div class="col-md-10">
                                            <br />
                                            <form method="GET" action="<?php echo e(asset('users/showUsers')); ?>" class="input-group" style="height:35px;">
                                                <div class="input-group-btn"  style="width:11%">
                                                    <select class="btn btn-default dropdown-toggle searchselect selectpicker" name="type" >
                                                        <option value="all" >All</option>
                                                        <option value="name" <?php echo e(request('type') == 'name' ? 'selected': ''); ?>>Name</option>
                                                        <option value="email"  <?php echo e(request('type') == 'email' ? 'selected': ''); ?>>Email</option>
                                                    </select>
                                                </div><!-- /btn-group -->
                                                <input type="text" value="<?php echo e(request('value')); ?>" class="form-control" style="height:35px;width: 85%" aria-label="..."  name="value">
                                                <button type="submit" class="input-group-addon" style="width:15%;line-height: 33px;cursor: pointer;">Search</button>
                                            </form>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                            </div> <br>
                            <div class="row">
                                    <div class="">
                                        <div class="row">
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <a href="<?php echo e(asset('/users/showuserprofiel/'.$val->id)); ?>">
                                                        <div class="panel-body profile">
                                                            <div class="profile-controls">
                                                                <?php if($val->active_status == 1): ?>
                                                                    <span class="profile-control-right" style="float:right;"><span class="fa fa-circle" style="color:#0dd20d;font-size: 20px;box-shadow: 2px 2px 4px black;border-radius: 100%;"></span></span>
                                                                <?php else: ?>
                                                                    <span class="profile-control-right" style="float:right;"><span class="fa fa-circle" style="color:#d64543;font-size: 20px;box-shadow: 2px 2px 4px black;border-radius: 100%;"></span></span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="profile-image">
                                                                <img src="<?php echo e(asset('img/emptyProfilePic.jpg')); ?>" alt="<?php echo e($val->name); ?>"/>
                                                            </div>
                                                            <div class="profile-data">
                                                                <div class="profile-data-name"><?php echo e($val->name); ?></div>
                                                                <div class="profile-data-title"><?php echo e($val->email); ?></div>
                                                            </div>
                                                        </div>
                                                        </a>
                                                        <div class="panel-body">
                                                            <p><small>Mobile</small><br/><?php echo e($val->phone_number == ''?'---' : $val->phone_number); ?></p>
                                                            <hr style="margin-top: 0px;">
                                                            <a href="<?php echo e(asset('users/usersrules/'.$val->id)); ?>" class="btn btn-info btn-sm btn-block btn-rounded " >Rules</a>
                                                            <a href="<?php echo e(asset('users/usersWorkzones/'.$val->id)); ?>" class="btn btn-danger btn-sm  btn-block btn-rounded ">Work Zones</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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