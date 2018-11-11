<?php $__env->startSection('content'); ?>
<?php   $inquiryIsCreated   =   0; ?>
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">SCR</a></li>
        <li class="active">SCR Sub Category</li>
    </ul>
    <div class="page-title">
        <h2>SCR Sub Category</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php if(isset($data[0]->request_is_created) && $data[0]->request_is_created ==1): ?>
                            <!-- do nothing here -->
                            <?php else: ?>
                                <?php if($auth->can_edit): ?>
                                <a href="<?php echo e(asset('scr/addscrsub/'.$id)); ?>">
                                    <button class="btn btn-primary btn-condensed  pull-left">
                                        <span class="fa fa-plus"></span>
                                        Add Itmes
                                    </button>
                                </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <br />
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">SCR Items List</h3>
                                        </div>
                                        <div class="panel-body panel-body-table">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-actions" id="workzoneList" style="border:10px solid whitesmoke">
                                                    <tr>
                                                        <th class="listHeader" width="200px">
                                                            Quantity
                                                        </th>
                                                        <th class="listHeader" style="width: 200px">
                                                            Budgetory Price
                                                        </th>
                                                        <th class="listHeader">
                                                            Description
                                                        </th>
                                                        <th class="listHeader">
                                                            Scope of Work
                                                        </th>
                                                        <th class="listHeader">
                                                            Clips
                                                        </th>
                                                        <th class="listHeader" width="120">Actions</th>
                                                    </tr>
                                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php $requestIsCreated = intval($val->request_is_created) ?>
                                                        <tr class="subMatItems">
                                                            <td>
                                                                <strong>
                                                                    <?php echo e($val->quantity); ?>

                                                                </strong>
                                                            </td>
                                                            <td>
                                                                <?php echo e($val->budgetory_price); ?>

                                                            </td>
                                                            <td>
                                                                <?php echo e($val->description); ?>

                                                            </td>
                                                            <td>
                                                                <?php echo e($val->work_scope); ?>

                                                            </td>
                                                            <td>

                                                            </td>
                                                            <td>
                                                                <?php if($requestIsCreated == 0): ?>
                                                                    <a href="<?php echo e(asset('scr/addscrsub/'.$val->scr_id.'/'.$val->id)); ?>" class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></a>
                                                                    <button class="btn btn-danger btn-rounded btn-condensed btn-sm" onclick="delete_sub('<?php echo e($val->id); ?>');"><span class="fa fa-times"></span></button>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <?php if(count($data) > 0): ?>
                                                <?php if($requestIsCreated == 0): ?>
                                                    <a href="<?php echo e(asset('subcontractorrequest/add/'.$id)); ?>"class="btn btn-success  pull-right" style="width: 150px;padding:10px;">Create Request</a>
                                                 <?php else: ?>
                                                    <div class="alert alert-danger" style="text-align: center">The Subcontractor Request Currently under procurement </div>
                                                 <?php endif; ?>
                                            <?php else: ?>
                                                <div class="alert alert-danger" style="text-align: center">If You Want to Create Request You Should add Subcontractor Gategory Items First</div>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="<?php echo e(asset('js/SCR/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>