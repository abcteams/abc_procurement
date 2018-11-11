<?php $__env->startSection('content'); ?>

    <ul class="breadcrumb">
        <li><a href="<?php echo e(asset('home')); ?>">Home</a></li>
        <li ><a href="<?php echo e(asset('gml/show')); ?>">Materials</a></li>
        <li class="active">Pending Sub Materials</li>
    </ul>

    <div class="page-title">
        <h2>Pending Sub Material</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                        <?php endif; ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">List</h3>
                            </div>
                            <div class="panel-body panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-actions">
                                        <thead>
                                        <tr>
                                            <th>Added</th>
                                            <th width="300">Items Name</th>
                                            <th>General Material</th>
                                            <th>Description</th>
                                            <th width="400">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(\Carbon\Carbon::parse($val->created_at,'Asia/Dubai')->diffForHumans()); ?></td>
                                                <td><?php echo e($val->title); ?></td>
                                                <td><?php echo e($val->gml_title); ?></td>
                                                <td><?php echo e($val->description); ?></td>
                                                <?php if($val->is_approved == 0): ?>
                                                    <?php if($auth->can_approve == 1): ?>
                                                        <td>
                                                            <a href="<?php echo e(asset('gml/approvePending/'.$val->id)); ?>" class="btn btn-success">Procurement Approve</a>
                                                            <button class="btn btn-danger" id="deleteUser" onclick="showDeleteModel(<?php echo e($val->id); ?>)">Procurement Reject</button>
                                                        </td>
                                                    <?php else: ?>
                                                        <td>Wait For Procurement Approve</td>
                                                    <?php endif; ?>
                                                <?php elseif($val->is_approved2 == 0): ?>
                                                    <?php if($auth->can_approve2 == 1): ?>
                                                        <td>
                                                            <a href="<?php echo e(asset('gml/approve2Pending/'.$val->id)); ?>" class="btn btn-success">Technical Approve</a>
                                                            <button class="btn btn-danger" id="deleteUser" onclick="showDeleteModel(<?php echo e($val->id); ?>)">Project Manager Reject</button>
                                                        </td>
                                                    <?php else: ?>
                                                        <td>Wait For Technical Approve</td>
                                                    <?php endif; ?>

                                                <?php elseif($val->is_approved3 == 0): ?>
                                                    <?php if($auth->can_approve3 == 1): ?>
                                                        <td>
                                                            <a href="<?php echo e(asset('gml/approve3Pending/'.$val->id)); ?>" class="btn btn-success">Project Manger Approval</a>
                                                            <button class="btn btn-danger" id="deleteUser" onclick="showDeleteModel(<?php echo e($val->id); ?>)">Project Manager Reject</button>
                                                        </td>
                                                    <?php else: ?>
                                                        <td>Wait For Project Manger Approve</td>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </tr>

                                            
                                            <div class="modal" id="modal_reject" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <input type="hidden"  value="" name="gml_title">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" onclick="closeModel()"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            <h4 class="modal-title" id="defModalHead">Reason for Rejection</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label id="hidden" style="display: none">sdf</label>
                                                                    <textarea class="form-control" rows="5" style="resize: none" name="reason" id="reason" autofocus></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a  class="btn btn-danger" id="reject" value="Reject" onclick="rejectSubGML()" >Reject </a>
                                                            <a class="btn btn-default" data-dismiss="modal" onclick="closeModel()">Cancel</a>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(count($data)==""): ?>
                                            <tr class="text-center">
                                                <td colspan="5" style="color: dimgray;">No Pending Requests Found !</td>
                                            </tr>
                                        <?php endif; ?>
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
    <script src="<?php echo e(asset('js/Gml/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>