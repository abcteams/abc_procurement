<?php $__env->startSection('content'); ?>
    <ul class="breadcrumb">
        <li><a href="<?php echo e(asset('home')); ?>">Home</a></li>
        <li class="active">Models And Rates</li>
    </ul>
    <div class="page-title">
        <h2>Models And Rates </h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <form class="form-horizontal" method="POST" action="<?php echo e(url('boq/addmodelsandRates')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="boq_id" value="<?php echo e(request('id')); ?>">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped table-actions" style="border:10px solid whitesmoke">
                                        <tr>
                                            <th>ID</th>
                                            <th>Description</th>
                                            <th>Size</th>
                                            <th>Quantity</th>
                                            <th>Model</th>
                                            <th>Rate</th>
                                        </tr>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($k+1); ?></td>
                                                <td>
                                                    <?php echo e($val->description); ?>

                                                </td>
                                                <td><?php echo e($val->size.' '.$val->size_unit); ?></td>
                                                <td>
                                                    <?php echo e($val->quantity - $val->rest_quantity.' '.$val->quantity_unit); ?>

                                                </td>
                                                <td>
                                                    <input type="hidden" value="<?php echo e($val->id); ?>" name="id[]"  class="form-control">
                                                    <input type="text" value="<?php echo e($val->model); ?>" name="model[]"  class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" value="<?php echo e($val->rate); ?>" name="rate[]"  class="form-control">
                                                </td>
                                            </tr>

                                                    <?php if(count($val->acc) > 0): ?>
                                                            <?php $__currentLoopData = $val->acc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k2 => $val2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td style="background: #aecaec">** <?php echo e($k+1); ?> . <?php echo e($k2+1); ?></td>
                                                                    <td style="background: #aecaec">
                                                                        <?php echo e($val2->description); ?>

                                                                        <input type="hidden" name="id2[]" value="<?php echo e($val2->id); ?>">
                                                                        <input type="hidden" name="sub_materials_id2[]" value="<?php echo e($val->id); ?>">
                                                                    </td>
                                                                    <td style="background: #aecaec">-</td>
                                                                    <td style="background: #aecaec"><?php echo e($val2->quantity); ?> <input type="hidden" class="real_qu" value="<?php echo e($val2->quantity - $val2->rest_quantity); ?>"></td>
                                                                    <td style="background: #aecaec">
                                                                        <input type="text" value="<?php echo e($val2->model); ?>" name="model2[]" class="form-control">
                                                                    </td>
                                                                    <td style="background: #aecaec">
                                                                        <input type="text" value="<?php echo e($val2->rate); ?>" name="rate2[]"  class="form-control">
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <input style="margin-left:10px;padding:10px 30px" type="submit" value="Save" class="btn btn-success pull-right" />
                            <a href="<?php echo e(URL::previous()); ?>"  style="padding:10px 25px" class="btn btn-danger pull-right" >Cancel</a>
                        </div>
                        <br/><br/><br/><br/><br/>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('js/BOQ/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>