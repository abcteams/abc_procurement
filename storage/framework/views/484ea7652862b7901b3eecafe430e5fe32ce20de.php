<?php $__env->startSection('content'); ?>

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Requisition Reports </li>
</ul>
<div class="page-title">
    <h2>Reports</h2>
</div>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <form method="GET" action="<?php echo e(asset('materialrequisition/reports')); ?>">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Search</h3>
                                </div>
                                <div class="panel-body">
                                    <br />
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Order Number</label>
                                            <input type="text" class="form-control" name="order_number" value="<?php echo e(request()->order_number); ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Order To</label>
                                            <select class="form-control select2" name="supplier_id">
                                                <option value="0">Choose Supplier</option>
                                                <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($val->id); ?>" <?php echo e($val->id == request()->supplier_id ? 'selected':''); ?>><?php echo e($val->company_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Work Zones</label>
                                            <select class="form-control select2" onchange="getSubZone(this)" name="workzone">
                                                <option value="0">Choose Work Zone</option>
                                                <?php $__currentLoopData = $workzones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($val->id); ?>" <?php echo e($val->id == request()->workzone ? 'selected':''); ?>><?php echo e($val->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Sub Work Zones</label>
                                            <select class="form-control select2" id="subworkzone" name="subzone">
                                                <option value="0">
                                                    Choose Sub Zone
                                                </option>
                                                <?php $__currentLoopData = $subzones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($val->id); ?>" <?php echo e($val->id == request()->subzone ? 'selected':''); ?>><?php echo e($val->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>From</label>
                                            <input type="text" class="form-control datepicker" name="from_date"  value="<?php echo e(request()->from_date); ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <label>To</label>
                                            <input type="text" class="form-control datepicker"  name="to_date"  value="<?php echo e(request()->to_date); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <div class="pull-right"><button type="submit" class="btn btn-primary" >Search</button></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br /><br />
            <div class="panel panel-default">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <center>
                                        <h3><?php echo e($val->work_zone); ?> ( <?php echo e($val->sub_zone); ?> )</h3>
                                    </center>
                                    <div class="pull-left">
                                        <table>
                                            <tr>
                                                <td width="100px">Subject</td>
                                                <td><?php echo e($val->subgml); ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100px">Order Number</td>
                                                <td><?php echo e($val->order_number); ?></td>
                                            </tr>
                                            <tr>
                                                <td width="100px">Order Date</td>
                                                <td><?php echo e($val->order_date); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Delivery Date</td>
                                                <td><?php echo e($val->delivery_date); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="pull-right">
                                        <table>
                                            <tr>
                                                <td width="120px">Job No	</td>
                                                <td><?php echo e($val->job_no); ?></td>
                                            </tr>
                                            <tr>
                                                <td width="120px">Oreder To	</td>
                                                <td><?php echo e($val->company_name); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Attention</td>
                                                <td><?php echo e($val->name); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <h3>LPO Status</h3>
                                    <div class="wizard">
                                        <ul class="steps_4 anchor">
                                            <li>
                                                <a href="#step-1" class="<?php echo e($val->is_approved == 1 ? 'selected':'disabled'); ?>" isdone="1" rel="1">
                                                    <span class="stepNumber">1</span>
                                                    <span class="stepDesc">Step 1<br><small>Procurement</small></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-2" class="<?php echo e($val->is_checked_out == 1 ? 'selected':'disabled'); ?>" isdone="1" rel="1">
                                                    <span class="stepNumber">2</span>
                                                    <span class="stepDesc">Step 2<br><small>Commercial</small></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-3" class="<?php echo e($val->supplier_approved == 1 ? 'selected':'disabled'); ?>" isdone="1" rel="1">
                                                    <span class="stepNumber">3</span>
                                                    <span class="stepDesc">Step 3<br><small>Supplier</small></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-4" class="<?php echo e($val->is_approved_req == 1 ? 'selected':'disabled'); ?>" isdone="1" rel="1">
                                                    <span class="stepNumber">4</span>
                                                    <span class="stepDesc">Step 4<br><small>Procurement</small></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-5" class="<?php echo e($val->is_approved_lpo == 1 ? 'selected':'disabled'); ?>" isdone="1" rel="1">
                                                    <span class="stepNumber">5</span>
                                                    <span class="stepDesc">Step 5<br><small>LPO</small></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-6" class="<?php echo e($val->is_delivered == 1 ? 'selected':'disabled'); ?>" isdone="1" rel="1">
                                                    <span class="stepNumber">6</span>
                                                    <span class="stepDesc">Step 6<br><small>Awating</small></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-7" class="<?php echo e($val->is_delivered == 1 ? 'selected':'disabled'); ?>" isdone="0" rel="0">
                                                    <span class="stepNumber">7</span>
                                                    <span class="stepDesc">Step 7<br><small>Delivered</small></span>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <a href="<?php echo e(asset('materialrequisition/requisitionDetails/'.$val->id)); ?>" class="btn btn-info pull-right" style="padding: 10px 25px">Details</a>
                                </div>
                        </div>
                    </div>
                </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="panel-footer">
                <div class="pull-right">
                    <?php echo $data->appends(
                        [
                            'order_number'=>request('order_number') ,
                            'supplier_id'=>request('supplier_id') ,
                            'workzone'=>request('workzone'),
                            'subzone'=>request('subzone'),
                            'from_date'=>request('from_date'),
                            'to_date'=>request('to_date')
                        ])
                    ?>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>
<script src="<?php echo e(asset('js/MTInquiry/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>