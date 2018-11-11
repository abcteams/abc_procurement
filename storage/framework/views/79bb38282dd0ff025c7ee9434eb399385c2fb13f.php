<!DOCTYPE html>
<html>
<style type="text/css" media="all">
    .table tr td{
        border: 1px solid #000000;
        padding: 10px;
    }
    .table tr th{
        border: 1px solid #000000;
        padding: 10px;
    }
    .table{
        border: 1px solid #000000;
    }
</style>
<body>

<div class="page-container">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <img src="<?php echo e(asset('img/abclogo.png')); ?>">
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
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-8">
                                    <table class="table">
                                        <tr>
                                            <td>SERIAL</td>
                                            <td style="font-size: 18px;width:250px">DESCRIPTION</td>
                                            <td style="font-size: 18px;width:250px">QUANTITY</td>
                                            <td style="font-size: 18px;width:250px">SIZE</td>
                                        </tr>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($k+1); ?></td>
                                                <td><?php echo e($val->description); ?></td>
                                                <td><?php echo e($val->quantity.' '.$val->quantity_unit); ?></td>
                                                <td><?php echo e($val->size.' '.$val->size_unit); ?></td>
                                            </tr>
                                            <?php if(count($val->accessories) > 0): ?>
                                                <?php $__currentLoopData = $val->accessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k2 =>$val2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e(($k+1).'.'.($k2+1)); ?></td>
                                                        <td><?php echo e($val2->description); ?></td>
                                                        <td><?php echo e($val2->quantity); ?></td>
                                                        <td>-</td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                    </center>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                </div>
                    <img src="<?php echo e(asset('img/Stamp.png')); ?>" style="position: absolute;top: 800px;left: 205px;width: 120px">
                    <img src="<?php echo e(asset('img/Asim-Signature.jpg')); ?>" width="50px">
            </div>
        </div>
    </div>
</div>
</body>
</html>