<?php $__env->startSection('content'); ?>
    <style>
        .personalInfo{font-size: 13px;font-weight: bold; margin-top: 6px;}
    </style>
    <ul class="breadcrumb">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Users</li>
            <li class="active">User Info</li>
        </ul>
    </ul>
    <div class="page-title" style="padding:10px 0px 0px 20px">
        <h2>
            <span class="fa fa-user"></span>
                <?php echo e($data[0]->name); ?>

            <br />
            <span style="font-size: 12px;padding-left: 35px;"></span>
        </h2>
    </div>
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-5">
                <form action="#" class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3><span class="fa fa-circle" style="color:#0dd20d;font-size: 16px;"></span>&nbsp;
                                <span>Active</span></h3>

                            <div class="text-center" id="user_image">
                                <img src="<?php echo e(asset('img/emptyProfilePic.jpg')); ?>" class="img-thumbnail"/>
                            </div>
                        </div>
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <div class="col-md-12 col-xs-12">
                                    <a href="<?php echo e(asset('users/ccEmails/'.$data[0]->user_id)); ?>" class="btn btn-success btn-block btn-rounded" >CC Emails</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-xs-12">
                                    <a href="#" class="btn btn-danger btn-block btn-rounded" data-toggle="modal" data-target="#modal_change_password">Reset password</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-xs-12">
                                    <a href="#" class="btn btn-danger btn-block btn-rounded" data-toggle="modal" data-target="#modal_change_password">Delete User</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
            <div class="col-md-8 col-sm-8 col-xs-7">

                <form action="#" class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3><span class="fa fa-pencil"></span> Profile</h3>
                        </div>
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Full Name</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class="personalInfo"> <?php echo e(isset($data[0]->name)?$data[0]->name:''); ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Company Name</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class="personalInfo"><?php echo e(isset($data[0]->company_name)?$data[0]->company_name:''); ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Email</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class="personalInfo"> <?php echo e(isset($data[0]->email)?$data[0]->email:''); ?> </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Country</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class="personalInfo"><?php echo e(isset($data[0]->nicename)?$data[0]->nicename:''); ?> </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Address</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class="personalInfo"><?php echo e(isset($data[0]->address)?$data[0]->address:''); ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Phone Number</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class="personalInfo"><?php echo e(isset($data[0]->phone_number)?$data[0]->phone_number:''); ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Phone Number</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class="personalInfo"><?php echo e(isset($data[0]->phone_number2)?$data[0]->phone_number2:''); ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-xs-5">
                                    <div class="col-md-12 col-xs-12">
                                        <div class="personalInfo pull-right"><a href="<?php echo e(asset('supplier/addmaterial/'.$data[0]->user_id)); ?>" class="btn btn-info"  style="padding: 10px">Supplier Materials</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div style="height: 100px;"></div>

    </div>

    <script src="<?php echo e(asset('js/User/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>