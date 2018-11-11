<?php $__env->startSection('content'); ?>
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Accepted </li>
        <li class="active">Create Agreement</li>
    </ul>
    <div class="page-title">
        <h2>Create Agreement</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <form class="form-horizontal" method="POST" action="<?php echo e(url('materialinquiry/addAgreement')); ?>">
                             <?php echo e(csrf_field()); ?>

                            <div class="panel-heading">
                                <h3 class="panel-title">Add</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">Quotation Ref</label>
                                            <div class="col-md-9">
                                                <div class="input-group"  style="width: 100%">
                                                    <input type="text" class="form-control" name="quotation_ref" required value="<?php echo e(old('quotation_ref')); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">Payment Terms</label>
                                            <div class="col-md-9">
                                                <div class="input-group"  style="width: 100%">
                                                    <input id="payment_terms" type="text"  class="form-control" name="payment_terms"  value="<?php echo e(old('payment_terms')); ?>"  required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">Supplier Code</label>
                                            <div class="col-md-9">
                                                <div class="input-group" style="width: 100%">
                                                    <input id="supplier_code" type="text"  value="<?php echo e(old('supplier_code')); ?>" class="form-control" name="supplier_code" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="hidden" value="<?php echo e($id); ?>" name="mtinquiry_id">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">All Materials Included</label>
                                            <div class="col-md-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="0" name="allMaterial" style="margin-top: 10px" checked>
                                                    <label class="form-check-label" for="defaultCheck1">

                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">Submital Requisted</label>
                                            <div class="col-md-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="submital_requisted" value="Soft Copy" checked>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Soft Copy
                                                    </label>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="form-check-input" type="radio" name="submital_requisted" value="Hard Copy">
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Hard Copy
                                                    </label>

                                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                    <label class="form-check-label" for="copies_number">
                                                        Copies Number
                                                    </label>
                                                    &nbsp&nbsp
                                                    <input class="" style="width: 50px" type="number" name="copies_number" value="1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label"></label>
                                            <div class="col-md-9">
                                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="alert alert-danger"><?php echo e($error); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                                <br>
                            <div class="panel-footer">
                                <input style="margin-left:10px;" type="submit" value="Send Email" class="btn btn-primary pull-right" />
                                <a href="<?php echo e(asset('materialinquiry/showAccepted/'.$id)); ?>" style="width:70px" class="btn btn-danger pull-right" >Cancel</a>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>