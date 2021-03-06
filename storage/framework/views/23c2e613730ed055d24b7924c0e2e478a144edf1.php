<?php $__env->startSection('content'); ?>
    <ul class="breadcrumb">
        <li><a href="<?php echo e(asset('home')); ?>">Home</a></li>
        <li ><a href="<?php echo e(asset('scl/show')); ?>">SCL</a></li>
        <li class="active">Sub items</li>
    </ul>
    <div class="page-title">
        <h2><?php echo e($main_data->title); ?> </h2><h4 style="padding-top:10px">&nbsp <i class="fa fa-arrow-right" style="font-size: 15px;"></i> Subcontractor Sub Category List</h4>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php if($auth->can_edit): ?>
                                <a href="<?php echo e(asset('scl/addsub/'.$main_data->id )); ?>">
                                    <button class="btn btn-primary btn-condensed">
                                        <span class="fa fa-plus"></span>
                                        Add Sub items
                                    </button>
                                </a>
                            <?php endif; ?>
                        </div>
                        <br />
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <br />
                                            <form method="GET" action="<?php echo e(asset('scl/showsub/'.request('id'))); ?>" class="input-group" style="height:35px;">
                                                <div class="input-group-btn"  style="width:11%">
                                                    <select class="btn btn-default dropdown-toggle searchselect selectpicker" name="type" >
                                                        <option value="all" >All</option>
                                                        <option value="title" <?php echo e(request('type') == 'title' ? 'selected': ''); ?>>Item Name</option>
                                                        <option value="desc"  <?php echo e(request('type') == 'desc' ? 'selected': ''); ?>>Description</option>
                                                    </select>
                                                </div><!-- /btn-group -->
                                                <input type="text" value="<?php echo e(request('value')); ?>" class="form-control" style="height:35px;width: 85%" aria-label="..."  name="value">
                                                <button type="submit" class="input-group-addon" style="width:15%;line-height: 33px;cursor: pointer;">Search</button>
                                            </form>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                            </div>
                            <br /><br />
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Sub Category Items List</h3>
                                        </div>
                                        <div class="panel-body panel-body-table">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-actions" id="subSclList" style="border:10px solid whitesmoke">
                                                    <tr>
                                                        <th class="listHeader" width="300">
                                                            Item Name
                                                        </th>
                                                        <th class="listHeader">
                                                            Description
                                                        </th>
                                                        <?php if($auth->can_edit): ?>
                                                            <th class="listHeader" width="120">Actions</th>
                                                        <?php endif; ?>
                                                    </tr>
                                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td title="Sub Items" class="subMatItems" >
                                                                <strong>
                                                                    <?php echo e($val->title); ?>

                                                                </strong>
                                                            </td>
                                                            <td>
                                                                <?php echo e($val->description); ?>

                                                            </td>
                                                            <?php if($auth->can_edit): ?>
                                                                <td>
                                                                    <a href="<?php echo e(asset('scl/addsub/'.$main_data->id.'/'.$val->id )); ?>" class="btn btn-default btn-rounded btn-condensed btn-sm"  title="edit"><span class="fa fa-pencil"></span></a>
                                                                    <button class="btn btn-danger btn-rounded btn-condensed btn-sm" onclick="delete_sub('<?php echo e($val->id); ?>' , 1);"  title="delete"><span class="fa fa-times"></span></button>
                                                                </td>
                                                            <?php endif; ?>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="pull-right"><?php echo $data->appends(['type'=>request('type') , 'value'=>request('value')]) ?></div>
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
    <script src="<?php echo e(asset('js/Scl/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>