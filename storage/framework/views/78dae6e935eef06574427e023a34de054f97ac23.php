
<?php $__env->startSection('content'); ?>
<script type="text/javascript" >
    function readytoinquirylies(id) {
        window.location.href = "<?php echo e(asset('materialinquiry/readytoinquirylist/'.request()->id)); ?>/"+id;
    }
</script>
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="<?php echo e(asset('workzone/showsub/'.request()->id)); ?>">Sub Work Zone</a></li>
    <li class="active">Sub Contractors Ready to inquiry</li>
</ul>

<div class="page-title">
    <h2>Sub Contractors Ready to Inquiry</h2>
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
                            <h3 class="panel-title">Choose Sub Contractor to Inquiry</h3>
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