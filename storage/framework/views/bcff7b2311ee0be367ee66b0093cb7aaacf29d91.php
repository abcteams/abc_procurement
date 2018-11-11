<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Procurement</title>

    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" id="theme"  href="<?php echo e(asset('css/theme-default.css')); ?>"/>
    <link rel="stylesheet" type="text/css" id="theme"  href="<?php echo e(asset('css/select2.css')); ?>"/>

    <script type="text/javascript" src="<?php echo e(asset('js/plugins/jquery/jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/plugins/bootstrap/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/sweetalert.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/select2.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/Forms/main.js')); ?>"></script>

</head>
<body>

<div class="page-container" style="height: 100%;">
    <div class="page-sidebar" style="padding: 1px;float: left;">
        <div style="text-align: center;background: #33414e;padding: 50px 0px">
            <img style="width: 130px;padding-bottom: 14%" src="<?php echo e(asset('img/abclogo.png')); ?>">


            <div style="padding: 15px;border-left: 2px solid #faee05;margin: 10px;text-align: center">
                <span style="color: white;font-size: 20px;font-family: Andalus"><?php echo e(strtoupper('Project Name ')); ?></span><br />
                <span  style="color:#faee05;font-size: 20px;font-family: Andalus"><?php echo e(strtoupper($data[0]->work_zone)); ?></span>
            </div>
            <div style="padding: 15px;border-left: 2px solid #faee05;margin: 10px;;text-align: center">
                <span style="color: white;font-size: 20px;font-family: Andalus"><?php echo e(strtoupper('Project Status ')); ?></span><br />
                <span  style="color: #faee05;font-size: 20px;font-family: Andalus"><?php echo e(strtoupper('Job In hand')); ?></span>
            </div>
        </div>
    </div>
    <div class="page-content" style="padding-top: 30px">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="padding: 20px">
                            <h3 class="panel-title" style="text-align: center;width:100%">
                                <div>ADVANCE BUILDING CONSTRUCTION COMPANY L.L.C.</div>
                                <div>PURCHASE ORDER-SUBCONTRACT</div>
                                <div><?php echo e($data[0]->work_zone); ?></div>
                            </h3>
                            <table class="pull-left">
                                <tr><td width="100px">Ref</td><td><?php echo e($data[0]->main_id); ?></td></tr>
                                <tr><td width="100px">Supject</td><td><?php echo e($data[0]->title); ?></td></tr>
                            </table>
                            <table class="pull-right">
                                <tr><td width="100px">Name</td><td><?php echo e($supplier->name); ?></td></tr>
                                <tr><td width="100px">Email</td><td><?php echo e($supplier->email); ?></td></tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Inquiry</h3>
                                <a href="<?php echo e(asset('pdf/pdfInquiry/'.$data[0]->main_id.'/'.$supplier->id)); ?>" class="btn btn-primary  pull-right" style="width: 160px">
                                    <div class="pull-left">Download Inquiry </div>
                                    <span class="fa fa-download pull-right" style="margin-top:3px;color:#ffffff"></span>
                                </a>
                            </div>
                            <div class="panel-body">
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Description</th>
                                                <th>Quantity</th>
                                                <th>Unit</th>
                                                <th>Size</th>
                                                <th>Material Specs</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class = "<?php echo e($val->size == 0 ?"changeBackground":''); ?> ">
                                                        <?php echo e($k+1); ?>

                                                    </td>
                                                    <td class="<?php echo e($val->size == 0 ?"changeBackground":''); ?>" >
                                                        <?php echo e($val->quantity_unit == ''?'**':''); ?>

                                                        <?php echo e($val->description); ?>

                                                    </td>
                                                    <td class="<?php echo e($val->size == 0 ?"changeBackground":''); ?>" >
                                                        <?php echo e($val->quantity); ?></td>
                                                    <td class="<?php echo e($val->size == 0 ?"changeBackground":''); ?>" >
                                                        <?php echo e($val->quantity_unit == ''?'-':$val->quantity_unit); ?>

                                                    </td>
                                                    <td class="<?php echo e($val->size == 0 ?"changeBackground":''); ?>" >
                                                        <?php echo e($val->size == 0?'-':$val->size.' '.$val->size_unit); ?>

                                                    </td>
                                                    <td class="<?php echo e($val->size == 0 ?"changeBackground":''); ?>" >
                                                        <?php if(file_exists('attachments/material_specs/'.$val->id)): ?>
                                                            <?php ($files = File::allFiles('attachments/material_specs/'.$val->id)); ?>
                                                            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file=>$f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <a href="<?php echo e(asset($f->getPathname())); ?>">View Specs</a><br>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </td>
                                                 </tr>
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">

                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Supplier Form</h3>
                            </div>
                            <div class="panel-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="cursor: pointer" onclick="showAccept()">
                                        <h3 class="panel-title" >
                                            <span class="fa fa-circle" style="color:#36bb36;font-size: 16px;" id="acceptIcon"></span>
                                            Accept
                                        </h3>
                                        <div style="padding: 7px">
                                            <span class="fa fa-chevron-circle-down pull-right" style="font-size: 20px;color:#333333"></span>
                                        </div>
                                    </div>
                                    <div class="panel-body" id="supplierAccept">
                                        <?php echo $__env->make('Forms.supplierAccept', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    </div>

                                    <div class="panel-heading"  style="cursor: pointer"  onclick="showDecline()">
                                        <h3 class="panel-title">
                                            <span class="fa fa-circle" style="color:#6b5f5f;font-size: 16px;" id="declineIcon"></span>
                                            Decline
                                        </h3>
                                        <div style="padding: 7px">
                                            <span class="fa fa-chevron-circle-down pull-right" style="font-size: 20px;color:#333333"></span>
                                        </div>
                                    </div>
                                    <div class="panel-body"  id="supplierDecline" style="display:none;">
                                        <?php echo $__env->make('Forms.supplierDecline', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <br /><br /><br />
            <br />
        </div>
    </div>
</div>
<!-- Scripts -->
<!-- END PLUGINS -->

<script type="text/javascript" src="<?php echo e(asset('js/plugins.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/actions.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/plugins/bootstrap/bootstrap-datepicker.js')); ?>"></script>


</body>
</html>
