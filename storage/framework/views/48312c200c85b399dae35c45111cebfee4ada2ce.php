<?php $__env->startSection('content'); ?>
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Users </li>
        <li class="active">Add User</li>
    </ul>
    <style>
        .personalInfo{font-size: 13px;font-weight: bold; margin-top: 6px;}
    </style>
    <div class="page-title" style="padding:10px 0px 0px 20px">
        <h2>
            <span class="fa fa-user"></span>
            Add User
        </h2>
    </div>
    <div class="page-content-wrap" style="background: #e8e8e8;padding-top: 40px;">
        <form class="form-horizontal" method="POST" action="<?php echo e(url('users/addSupplierInfo')); ?>">
            <?php echo e(csrf_field()); ?>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-1 col-sm-2 col-xs-2">
                </div>
                <div class="col-md-10 col-sm-8 col-xs-8">
                    <input type="hidden" name="id" value="<?php echo e(isset($data['main'][0]->id)?$data['main'][0]->id:'0'); ?>" >
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3><span class="fa fa-pencil"></span>Info</h3>
                        </div>
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Full Name</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class='input-group'>
                                        <input id="name" type="text" value="<?php echo e(isset($data['main'][0])?$data['main'][0]->name:old('name')); ?>"  class="form-control" name="name" required>
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Company Name</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class='input-group'>
                                        <input id="company_name" type="text" value="<?php echo e(isset($data['genral'][0])?$data['genral'][0]->company_name:old('company_name')); ?>" class="form-control" name="company_name" required>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Country</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class='input-group'>
                                        <?php
                                        ;
                                        ?>
                                        <select class="form-control select2" name="country" required>
                                            <option value="">Choose Country</option>

                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k =>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($val->id); ?>" <?php echo e(isset($data['genral'][0]->country ) ? $data['genral'][0]->country == $val->id ? 'selected':'':''); ?>><?php echo e($val->nicename); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span class="input-group-addon"><span class="fa fa-flag"></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Address</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class='input-group'>
                                        <input id="address" type="text" value="<?php echo e(isset($data['genral'][0])?$data['genral'][0]->address:old('address')); ?>" class="form-control" name="address">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-md-3 col-xs-5 control-label">Phone Number</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class='input-group'>
                                        <input id="phone_number" type="number" value="<?php echo e(isset($data['genral'][0])?$data['genral'][0]->phone_number:old('phone_number')); ?>" class="form-control" name="phone_number">
                                        <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-md-3 col-xs-5 control-label">Phone Number2</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class='input-group'>
                                        <input id="phone_number2" type="number" value="<?php echo e(isset($data['genral'][0])?$data['genral'][0]->phone_number2:old('phone_number2')); ?>" class="form-control" name="phone_number2">
                                        <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-md-3 col-xs-5 control-label">Email</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class='input-group'>
                                        <input id="email" type="email" value="<?php echo e(isset($data['main'][0])?$data['main'][0]->email:old('email')); ?>" class="form-control" name="email" required>
                                        <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-md-3 col-xs-5 control-label"></label>
                                <div class="errorMasseges" style="padding:10px 0px">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="alert alert-danger"><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-2 col-xs-2">
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-1 col-sm-2 col-xs-2">
                </div>
                <div class="col-md-10 col-sm-8 col-xs-8">
                    <input type="hidden" name="id" value="<?php echo e(isset($data['main'][0]->id)?$data['main'][0]->id:'0'); ?>" >
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3><span class="fa fa-pencil"></span>CC Emails</h3>
                        </div>
                        <div class="panel-body form-group-separated">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-actions" id="ccEmailsList" style="border:10px solid whitesmoke">
                                    <tr>
                                        <th class="listHeader" width="90%">
                                            Email
                                        </th>
                                        <th class="listHeader" width="100px">
                                            <span class="btn btn-info" style="font-size: 25px;padding: 7px;width: 50px" onclick="addEmail()">+</span>
                                        </th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-2 col-xs-2">
                    </div>
                </div>
            </div>

            <div class="row" style="padding:20px">
                <div class="col-md-1 col-sm-2 col-xs-2"></div>
                <div class="col-md-9 col-sm-8 col-xs-8">

                </div>
                <div class="col-md-2 col-sm-2 col-xs-2"></div>
            </div>
            <div class="row" style="padding:20px">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-8 col-sm-8 col-xs-8">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <button class="btn btn-success pull-right" style="width:120px;padding:10px">Save</button>
                        <a href="<?php echo e(asset('users/showUsers')); ?>" style="width:120px;padding:10px;margin-right: 10px" class="btn btn-danger pull-right">Cancel</a>
                    </div>
                </div>
                <div style="height:200px"></div>
            </div>
        </div>
    </form>
    </div>
    <script src="<?php echo e(asset('js/User/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>