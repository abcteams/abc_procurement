<?php $__env->startSection('content'); ?>
    <script type="text/javascript" >
        function readytoinquirylies(id) {
            window.location.href = "<?php echo e(asset('materialinquiry/readytoinquirylist/'.request()->id)); ?>/"+id;
        }
    </script>
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="<?php echo e(asset('workzone/showsub/'.request()->id)); ?>">Sub Work Zone</a></li> 
    <li class="active">Materials Ready to inquiry</li>
</ul>

<div class="page-title">
    <h2>Materials Ready to Inquiry</h2>
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
                            <h3 class="panel-title">Choose Material to Inquiry</h3>
                        </div>
                        <div class="panel-body panel-body-table">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-actions">
                                    <thead>
                                    <tr>
                                        <th width="100">Serial</th>
                                        <th width="250">GML</th>
                                        <th>Material</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="subMatItems">
                                                <td onclick="readytoinquirylies(<?php echo e($val->id); ?>)"><?php echo e($k+1); ?></td>
                                                <td onclick="readytoinquirylies(<?php echo e($val->id); ?>)"><?php echo e($val->gml); ?></td>
                                                <td onclick="readytoinquirylies(<?php echo e($val->id); ?>)">
                                                    <?php echo e($val->title); ?>

                                                    <span class="fa fa-chevron-circle-right pull-right" style="font-size: 40px;"></span>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>