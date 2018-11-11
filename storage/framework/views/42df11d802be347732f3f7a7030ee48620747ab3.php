<?php $__env->startSection('content'); ?>
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Supplier </li>
        <li>Materials </li>
        <li class="active">Add Material</li>
    </ul>
    <div class="page-title">
        <h2>Add Sub Materials</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <form class="form-horizontal" method="POST" action="<?php echo e(url('supplier/addmaterialrec')); ?>">
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
                                            <div class="col-md-11">
                                                <div class="input-group" <?php echo e($errors->default->has('title') ?  $errors->default->first('title') : ''); ?> style="width: 100%">
                                                    <input type="hidden" value="<?php echo e(isset($id)?$id:'0'); ?>" id="user_id">
                                                    <select class="select2 form-control" onchange="getSubGml(this)" name="state">
                                                        <option value="0">Choose GML</option>
                                                        <?php $__currentLoopData = $gml; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k =>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($val->id); ?>"><?php echo e($val->title); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
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
                                            <div class="col-md-11">
                                                <table class="table table-bordered table-striped table-actions" id="material_table">
                                                    <thead>
                                                        <th>Sub Material</th>
                                                        <th>
                                                            Description
                                                        </th>
                                                        <th width="100px">Action</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3">No Items</td>
                                                        </tr>
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
                                </div><br>
                                <div class="panel-footer">
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT -->
    </div>

    <script src="<?php echo e(asset('js/Supplier/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>