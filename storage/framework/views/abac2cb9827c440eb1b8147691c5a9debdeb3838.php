<?php $__env->startSection('content'); ?>
    <ul class="breadcrumb">
        <li><a href="<?php echo e(asset('home')); ?>">Home</a></li>
        <li><a href="<?php echo e(asset('users/myProfile/'.request()->id)); ?>">CC Emails</a></li>
    </ul>
    <div class="page-title">
        <h2>CC Emails</h2>
    </div>
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <br />
                        <div class="panel-body">
                        <br />
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" method="POST" action="<?php echo e(url('users/addccemails')); ?>">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" value="<?php echo e(request()->id); ?>" name="user_id">
                                    <div class="">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">CC Emails List</h3>
                                        </div>
                                        <div class="panel-body panel-body-table">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-actions" id="ccEmailsList" style="border:10px solid whitesmoke">
                                                    <tr>
                                                        <th class="listHeader" width="90%">
                                                            Email
                                                        </th>
                                                        <th class="listHeader" width="100px">
                                                            <button class="btn btn-info" style="font-size: 25px;padding: 7px;width: 50px" onclick="addEmail()">+</button>
                                                        </th>
                                                    </tr>
                                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k =>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><input type="email" class="form-control" name="ccemails[]" value="<?php echo e($val->email); ?>"></td>
                                                            <td><a class="btn btn-danger btn-condensed" onclick="removeRow(this)"><i class="fa fa-remove"></i> </a></td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="pull-right">
                                                <input type="submit" class="btn btn-success"  style="padding: 15px 50px" value="Save"></input>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('js/Supplier/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>