<?php $__env->startSection('content'); ?>
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Create Material Requisition</li>
    </ul>
    <div class="page-title">
        <h2>Create Material Requisition</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo e($data[0]->title); ?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped table-actions" style="border:10px solid whitesmoke">
                                        <tr>
                                            <th style="width: 150px">Add To Cart</th>
                                            <th>Description</th>
                                            <th>Size</th>
                                            <th>Quantity</th>
                                            <th>Model</th>
                                            <th style="text-align: center">Accessories & Fittings</th>
                                        </tr>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <button onclick="addToOrder(this,1,<?php echo e($val->id); ?>)" class="btn btn-success" id="material<?php echo e($val->id); ?>">Add To Cart</button>
                                                </td>
                                                <td>
                                                    <?php echo e($val->description); ?>

                                                    <input type="hidden" class="sub_material_id" value="<?php echo e($val->id); ?>">
                                                </td>
                                                <td><?php echo e($val->size.' '.$val->size_unit); ?></td>
                                                <td>
                                                    <?php echo e($val->quantity - $val->rest_quantity.' '.$val->quantity_unit); ?>

                                                    <input type="hidden" class="real_qu" value="<?php echo e($val->quantity - $val->rest_quantity); ?>">
                                                </td>
                                                <td>
                                                    <?php echo e($val->model); ?>

                                                </td>
                                                <td>
                                                    <?php if(count($val->accessories) > 0): ?>
                                                        <table class="table table-bordered table-striped table-actions">
                                                            <tr class="tr_clone">
                                                                <th>Add</th>
                                                                <th>Description</th>
                                                                <th>Quantity</th>
                                                                <th>Model</th>
                                                            </tr>
                                                            <?php $__currentLoopData = $val->accessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k2 => $val2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr class="tr_clone">
                                                                    <td><button onclick="addToOrder(this,2,<?php echo e($val2->id); ?>)" class="btn btn-success" id="accessory<?php echo e($val2->id); ?>">Add To Cart</button></td>
                                                                    <td>
                                                                        <?php echo e($val2->description); ?>

                                                                        <input type="hidden" class="accessory_id" value="<?php echo e($val2->id); ?>">
                                                                        <input type="hidden" class="sub_material_id" value="<?php echo e($val->id); ?>">
                                                                    </td>
                                                                    <td><?php echo e($val2->quantity); ?> <input type="hidden" class="real_qu" value="<?php echo e($val2->quantity - $val2->rest_quantity); ?>"></td>
                                                                    <td>
                                                                        <?php echo e($val2->model); ?>

                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </table>
                                                    <?php else: ?>
                                                        No Accessories
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content-wrap">
        <div class="row">
            <form class="form-horizontal" id="orderForm">
                <?php echo e(csrf_field()); ?>

            <div class="col-md-8">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Cart</h3>
                        </div>
                            <input type="hidden" id="sub_boq_id" value="<?php echo e($id); ?>" >
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="panel-title">Materials Cart</h3>
                                            <table class="table table-bordered table-striped table-actions" id="materials_order_table">
                                                <tr>
                                                    <th>Description</th>
                                                    <th>Size</th>
                                                    <th>Quantity</th>
                                                    <th>Model</th>
                                                    <th>Your Quantity</th>
                                                    <th width="70px">Actions</th>
                                                </tr>
                                               <tr id="materialCartEmpty">
                                                   <td colspan="6">Cart Empty</td>
                                               </tr>
                                           </table>
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-md-12">
                                           <h3 class="panel-title">Accessories & Fittings Cart</h3>
                                           <table class="table table-bordered table-striped table-actions" id="accessories_order_table">
                                               <tr>
                                                   <th>Description</th>
                                                   <th>Quantity</th>
                                                   <th>Model</th>
                                                   <th>Your Quantity</th>
                                                   <th width="70px">Actions</th>
                                               </tr>
                                               <tr id="accessoryCartEmpty">
                                                   <td colspan="5">Cart Empty</td>
                                               </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="margin-top: 10px">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Delivery Details</h3>
                    </div>
                    <div class="row" style="padding: 70px 20px 10px 20px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Delivery Date</label>
                                <input type="text" class="form-control datepicker"  id="delivery_date" required>
                            </div>
                        </div>
                    </div>
                    <div class="row"  style="padding: 0px 20px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Installation Complete Date</label>
                                <input id="complete_date" type="text" class="form-control datepicker"  id="complete_date" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="panel-footer">
                        <input style="margin-left:10px;padding: 10px 20px" type="button" onclick="submitOrderForm()" value="Check Out" class="btn btn-primary pull-right" />
                        <a href="<?php echo e(URL::previous()); ?>" style="padding:10px 20px" class="btn btn-danger pull-right" >Cancel</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <!-- END PAGE CONTENT -->
        <br/><br/><br/><br/><br/><br/><br/><br/>
    </div>

    <script src="<?php echo e(asset('js/MTInquiry/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>