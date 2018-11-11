<?php $__env->startSection('content'); ?>

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Inquiry Details</li>
    </ul>

    <div class="page-title">
        <h2>Inquiry Details</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo e($data[0]->sub_gml); ?></h3>
                            </div>
                            <div class="panel-body panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-actions">
                                        <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Size</th>
                                            <th>Budgetory Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="subMatItems" >
                                                <td class="<?php echo e($val->size == 0 ?"changeBackground":''); ?>">
                                                    <?php echo e($val->quantity_unit == '' ?'**'.$val->description:$val->description); ?>

                                                    <input type="hidden" class="description" value="<?php echo e($val->description); ?> "/>
                                                    <input type="hidden" class="id" value="<?php echo e($val->id); ?>" />
                                                </td>
                                                <td class="<?php echo e($val->size == 0 ?"changeBackground":''); ?>">
                                                    <?php echo e($val->quantity .' '.$val->quantity_unit); ?>

                                                    <input type="hidden" class="quantity" value="<?php echo e($val->quantity); ?> "/>
                                                    <input type="hidden" class="quantity_unit" value="<?php echo e($val->quantity_unit); ?> "/>
                                                </td>
                                                <td class="<?php echo e($val->size == 0 ?"changeBackground":''); ?>">
                                                    <input type="hidden" class="size" value="<?php echo e($val->size); ?> " />
                                                    <?php echo e($val->size == 0 ? '-':$val->size.' '.$val->size_unit); ?>

                                                    <input type="hidden" class="size_unit" value="<?php echo e($val->size_unit); ?> "/>
                                                </td>
                                                <td class="<?php echo e($val->size == 0 ?"changeBackground":''); ?>">
                                                    <?php echo e($val->size == 0 ? '-':number_format(($val->budgetory_price),2).' AED'); ?>

                                                </td>
                                                <td  class="<?php echo e($val->size == 0 ?"changeBackground":''); ?>"><input type="checkbox" class="margethis"  ></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Suppliers</h3>
                            </div>
                            <div class="panel-body panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-actions">
                                        <thead>
                                        <tr>
                                            <th width="150">Company Name</th>
                                            <th>Supplier Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($val->company_name); ?></td>
                                                <td><?php echo e($val->name); ?></td>
                                                <td><?php echo e($val->email); ?></td>
                                                <td><?php echo e($val->phone_number); ?></td>
                                                <td><?php echo e($val->address); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <a href="<?php echo e(url()->previous()); ?>" style="margin-left:10px;padding: 15px 60px" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>