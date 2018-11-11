<?php $__env->startSection('content'); ?>
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Inquiry Under Pricing</li>
        <li class="active">Add New Proposal</li>
    </ul>
    <div class="page-title">
        <h2>Add New Supplier Proposal</h2>
    </div>

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Add</h3>
                                <form class="form-horizontal" method="POST" action="<?php echo e(url('materialinquiry/submitSuplierProposal')); ?>"  enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" value="<?php echo e($data[0]->m_id); ?>" name="material_inquiry">
                                    <div class="row">
                                        <div class="panel panel-default" style="padding-bottom: 10px">
                                            <div class="panel-body form-group-separated">
                                                <div class="form-group">
                                                    <label class="col-md-4 col-xs-5 control-label">Supplier</label>
                                                    <div class="col-md-8 col-xs-7">
                                                        <select name="supplier" class="form-control select2" required>
                                                            <option value="">Choose Supplier</option>
                                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($val->user_id); ?>"><?php echo e($val->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 col-xs-5 control-label">Total Price (AED)</label>
                                                    <div class="col-md-8 col-xs-7">
                                                        <div class='input-group'>
                                                            <input id="totalPrice" type="float"   value="<?php echo e(old('total_price')); ?>" class="form-control" name="total_price" required>
                                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 col-xs-5 control-label">Upload Quotation</label>
                                                    <div class="col-md-8 col-xs-7">
                                                        <div class='input-group'>
                                                            <input type="file" value="<?php echo e(old('quotation')); ?>" name="quotation"  onchange="uploadFile(this)"  >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 col-xs-5 control-label">Upload Datasheet</label>
                                                    <div class="col-md-8 col-xs-7">
                                                        <div class='input-group'>
                                                            <input type="file"  value="<?php echo e(old('datasheet')); ?>" name="datasheet"  onchange="uploadFile(this)"  >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group" >
                                                    <label class="col-md-4 col-xs-4 control-label">Compliance</label>
                                                    <div class="col-md-8 col-xs-8">
                                                        <div class="col-md-4 col-xs-4"><input type="radio" name="compliance" <?php echo e(old('compliance') == 'Full' ? 'checked':''); ?> value="Full" checked> Full</div>
                                                        <div class="col-md-4 col-xs-4"><input type="radio" name="compliance" <?php echo e(old('compliance') == 'Partial' ? 'checked':''); ?> value="Partial"> Partial</div>
                                                        <div class="col-md-4 col-xs-4"><input type="radio" name="compliance" <?php echo e(old('compliance') == 'N/A' ? 'checked':''); ?> value="N/A"> N/A</div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 col-xs-5 control-label">Delivery Period</label>
                                                    <div class="col-md-8 col-xs-7">
                                                        <div class='input-group'>
                                                            <input type="text" class="form-control" value="<?php echo e(old('deliveryPeriod')); ?>"  name="deliveryPeriod" required>
                                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group" >
                                                    <label class="col-md-4 col-xs-5 control-label">Contact Person</label>
                                                    <div class="col-md-8 col-xs-7">
                                                        <div class='input-group'>
                                                            <input type="text" class="form-control" value="<?php echo e(old('supplier_name')); ?>"  name="supplier_name"  >
                                                            <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group" >
                                                    <label class="col-md-4 col-xs-5 control-label">Email</label>
                                                    <div class="col-md-8 col-xs-7">
                                                        <div class='input-group'>
                                                            <input class="form-control" type="supplier_email"  value="<?php echo e(old('email')); ?>" name="email" >
                                                            <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                                        </div>
                                                        <div class="errorMasseges" style="padding:10px 0px">
                                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li class="alert alert-danger"><?php echo e($error); ?></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12 col-xs-5"></div>
                                                </div>
                                            </div>

                                            <div style="padding: 10px">
                                                <button class="btn btn-success pull-right" style="width:120px;">Send</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT -->
    </div>

    <script src="<?php echo e(asset('js/MTInquiry/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>