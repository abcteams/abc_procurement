<?php $__env->startSection('content'); ?>

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Accepted Proposal </li>
</ul>

<div class="page-title">
    <h2>Accepted Proposal</h2>
</div>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div style="padding:10px">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">list</h3>
                    </div>
                    <div style="padding: 70px 0px 20px 0px; ">
                        <div class="row" >
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="Supplier_FullName">Supplier</label>
                                    <div class="col-md-9" style="background:#f5f5f5;height:30px;margin-top:-5px;padding-top:5px;border-radius:3px">
                                        <?php echo e($data[0]->name); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="Inquiry_Material_Item_SubitemName">Supplier price</label>
                                    <div class="col-md-9" style="background:#f5f5f5;height:30px;margin-top:-5px;padding-top:5px;border-radius:3px">
                                        <?php echo e($data[0]->total_price); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="padding-top:10px">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="Proposal">Contact Person</label>
                                    <div class="col-md-9" style="background:#f5f5f5;height:30px;margin-top:-5px;padding-top:5px;border-radius:3px">
                                        <?php echo e($data[0]->contact_person); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="Proposal">Compliance</label>
                                    <div class="col-md-9" style="background:#f5f5f5;height:30px;margin-top:-5px;padding-top:5px;border-radius:3px">
                                        <?php echo e($data[0]->compliance); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="IsAccepted">Contact Email</label>
                                    <div class="col-md-9" style="background:#f5f5f5;height:30px;margin-top:-5px;padding-top:5px;border-radius:3px">
                                        <div class="input-group">
                                            <?php echo e($data[0]->email); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="IsAccepted">Delivery Period</label>
                                    <div class="col-md-9" style="background:#f5f5f5;height:30px;margin-top:-5px;padding-top:5px;border-radius:3px">
                                        <div class="input-group">
                                            <?php echo e($data[0]->delivery_period); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="IsAccepted">Datasheet</label>
                                    <div class="col-md-9" style="background:#f5f5f5;height:30px;margin-top:-5px;padding-top:5px;border-radius:3px">
                                        <div class="input-group">
                                            <?php if(file_exists('datasheets/'.$data[0]->id)): ?>
                                                <?php ($files = File::allFiles('datasheets/'.$data[0]->id)); ?>
                                                <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file=>$f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="<?php echo e(asset($f->getPathname())); ?>">Datasheet</a><br>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="IsAccepted">Quotations</label>
                                    <div class="col-md-9" style="background:#f5f5f5;height:30px;margin-top:-5px;padding-top:5px;border-radius:3px">
                                        <div class="input-group">
                                            <?php if(file_exists('quotations/'.$data[0]->id)): ?>
                                                <?php ($files = File::allFiles('quotations/'.$data[0]->id)); ?>
                                                <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file=>$f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="<?php echo e(asset($f->getPathname())); ?>">Quotation</a><br>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <?php if(count($data[0]->agreement)): ?>
                            <?php if($data[0]->agreement[0]->is_approved): ?>
                                <?php if($data[0]->agreement[0]->is_supplier_accepted): ?>
                                    <a href="<?php echo e(asset('materialinquiry/showAgreement/'.$data[0]->id)); ?>" class="btn btn-success pull-right">Show Agreement</a>
                                    <a href="<?php echo e(asset('materialrequisition/requisitionReports/'.$data[0]->boq_id)); ?>" class="btn btn-info pull-right" style="margin-right: 10px">Requisition Reports</a>
                                <?php else: ?>
                                <button class="alert alert-danger">Please wait for supplier to accept the agreement</button>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="<?php echo e(asset('materialinquiry/approveAgreement/'.$data[0]->id)); ?>" style="margin-left:10px;" class="btn btn-success pull-right">Approve Agreement</a>
                            <?php endif; ?>
                        <?php else: ?>
                            <a href="<?php echo e(asset('materialinquiry/createAgreement/'.request()->id)); ?>" style="margin-left:10px;" class="btn btn-success pull-right">Create Agreement</a>
                        <?php endif; ?>
                    </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>