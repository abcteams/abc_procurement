
<?php $__env->startSection('content'); ?>

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Date Extend</li>
    </ul>

    <div class="page-title">
        <h2>Inquiry Date Extend</h2>
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
                                <h3 class="panel-title">List</h3>
                                <?php    $today = date('Y-m-d'); ?>
                            </div>
                            <div class="panel-body panel-body-table">
                                <table class="table table-bordered table-striped table-actions">
                                    <thead>
                                    <tr>
                                        <th width="150">Work Zone</th>
                                        <th width="150">Sub Gml</th>
                                        <th>Date</th>
                                        <th>Close Date</th>
                                        <th>Description</th>
                                        <th>Extend</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo e($data->wztitle); ?></td>
                                            <td><?php echo e($data->gmltitle); ?></td>
                                            <td><?php echo e($data->date); ?></td>
                                            <td><span style="color:brown; font-weight:bold;"><?php echo e($data->close_date); ?></span></td>
                                            <td><?php echo e($data->description); ?></td>
                                            <td>
                                               <form action="<?php echo e(asset('materialinquiry/extendupdate')); ?>" method="post">
                                                   <?php echo csrf_field(); ?>

                                                   <input id="datefield" name="new_date" class="h4" type='date' min=<?php echo e($today); ?> required>
                                                   <input type="hidden" name="inq_id" value="<?php echo e($data->id); ?>">
                                                   <input type="submit" class="btn btn-success" value="Extend">
                                               </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>