<?php $__env->startSection('content'); ?>
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Users </li>
    </ul>
    <div class="page-title">
        <h2>Users List</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="<?php echo e(asset('users/add')); ?>">
                                <button class="btn btn-primary btn-condensed">
                                    <span class="fa fa-plus"></span>
                                    Add New User
                                </button>
                            </a>
                        </div>
                        <br />
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <br />
                                            <form method="GET" action="<?php echo e(asset('users/showUsers')); ?>" class="input-group" style="height:35px;">
                                                <div class="input-group-btn"  style="width:11%">
                                                    <select class="btn btn-default dropdown-toggle searchselect selectpicker" name="type" >
                                                        <option value="all" >All</option>
                                                        <option value="name" <?php echo e(request('type') == 'name' ? 'selected': ''); ?>>Name</option>
                                                        <option value="email"  <?php echo e(request('type') == 'email' ? 'selected': ''); ?>>Email</option>
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
                                            <h3 class="panel-title">Users List</h3>
                                        </div>
                                        <div class="panel-body panel-body-table">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-actions" id="gmlList" style="border:10px solid whitesmoke">
                                                    <tr>
                                                        <th class="listHeader" width="300">
                                                            Name
                                                        </th>
                                                        <th class="listHeader">
                                                            Email
                                                        </th>
                                                        <th class="listHeader" width="50">
                                                            Rules
                                                        </th>
                                                        <th class="listHeader" width="50">
                                                            Work Zone
                                                        </th>
                                                        <th class="listHeader" width="120">Status</th>
                                                    </tr>
                                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr class="subMatItems">
                                                            <td title="Sub Items" onclick="userProfile('<?php echo e($val->id); ?>')">
                                                                <strong>
                                                                    <?php echo e($val->name); ?>

                                                                </strong>
                                                            </td>
                                                            <td onclick="userProfile('<?php echo e($val->id); ?>')">
                                                                <?php echo e($val->email); ?>

                                                            </td>
                                                            <td>
                                                                <a href="<?php echo e(asset('users/usersrules/'.$val->id)); ?>" class="btn btn-info" style="width: 120px">Rules</a>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo e(asset('users/usersWorkzones/'.$val->id)); ?>" class="btn btn-danger" style="width: 120px">Work Zones</a>
                                                            </td>
                                                            <td>
                                                                <span class="fa fa-circle" style="color:#0dd20d;font-size: 16px;"></span>
                                                            </td>
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
    <script src="<?php echo e(asset('js/User/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>