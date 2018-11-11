<?php $__env->startSection('content'); ?>
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Materials Inquiry </li>
        <li class="active">Create Material Inquiry</li>
    </ul>
    <div class="page-title">
        <h2>Create Material Inquiry</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <form class="form-horizontal" method="POST" action="<?php echo e(url('materialinquiry/addMTInquiry')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="panel panel-default">
                            <input type="hidden" name="work_zone_id" value="<?php echo e($keys['work_zone']); ?>" >
                            <input type="hidden" name="sub_gml_id" value="<?php echo e($keys['sub_gml']); ?>" >
                            <div class="panel-heading">
                                <h3 class="panel-title">Add</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Date</label>
                                            <div class="col-md-10">
                                                <div class="input-group" style="width: 100%">
                                                    <input id="date" type="text"  value="<?php echo e(date('Y-m-d')); ?>" class="form-control" name="date" readonly required style="color: black">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Close Date</label>
                                            <div class="col-md-10">
                                                <div class="input-group" style="width: 100%">
                                                    <input id="closeDate" type="text"  value="<?php echo e(old('closeDate')); ?>"  class="form-control datepicker" name="closeDate" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Description</label>
                                            <div class="col-md-10">
                                                <div class="input-group"  style="width: 100%">
                                                    <textarea class="form-control" id="description"   name="description"><?php echo e(old('description')); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Suppliers</label>
                                            <div class="col-md-10">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Company</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th width="10%">Select All <input type="checkbox" id="checkAll" onclick="checkAllSuppliers(this)"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($val->company_name); ?></td>
                                                            <td><?php echo e($val->name); ?></td>
                                                            <td><?php echo e($val->email); ?></td>
                                                            <td><input type="checkbox" value="<?php echo e($val->id); ?>" class="checkSupplier" name="supplierlist[]"></td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="form-group">
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
                            <div class="panel-footer">
                                <input style="margin-left:10px;padding: 15px 60px" type="submit" value="Add" class="btn btn-primary pull-right" />
                                <a href="<?php echo e(asset('boq/materialinquiry/'.$keys['work_zone'].'/'.$keys['sub_gml'])); ?>" style=";padding: 15px 50px" class="btn btn-danger pull-right" >Cancel</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT -->
    </div>

    <script src="<?php echo e(asset('js/MTInquiry/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>