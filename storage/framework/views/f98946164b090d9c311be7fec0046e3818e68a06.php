<?php $__env->startSection('content'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Suppliers </li>
    </ul>
    <div class="page-title">
        <h2>Suppliers</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php if($auth->can_approve): ?>
                                <a href="<?php echo e(asset('users/addsupplier')); ?>">
                                    <button class="btn btn-primary btn-condensed">
                                        <span class="fa fa-plus"></span>
                                        Add New Supplier
                                    </button>
                                </a>
                            <?php endif; ?>
                        </div>
                        <br />
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-1 col-sm-0"></div>
                                        <div class="col-md-10 col-sm-12">
                                            <br />
                                            <form method="GET" action="<?php echo e(asset('users/showSuppliers')); ?>" class="input-group" style="height:35px;">
                                                <div class="input-group-btn"  >
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
                                        <div class="col-md-1 col-sm-0"></div>
                                    </div>
                                </div>
                            </div>
                            <br /><br />

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Suppliers List</h3>
                                        </div>
                                        <div class="panel-body panel-body-table">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-actions" id="gmlList" style="border:10px solid whitesmoke">
                                                    <tr>
                                                        <th class="listHeader">
                                                            Name
                                                        </th>
                                                        <th class="listHeader">
                                                            Email
                                                        </th>
                                                        <th class="listHeader">
                                                            Company Name
                                                        </th>
                                                        <th class="listHeader">
                                                            Country
                                                        </th>
                                                        <th class="listHeader">
                                                            Address
                                                        </th>
                                                    </tr>
                                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr class="subMatItems">
                                                            <td title="Sub Items" onclick="supplierInfo('<?php echo e($val->id); ?>')">
                                                                <strong>
                                                                    <?php echo e($val->name); ?>

                                                                </strong>
                                                            </td>
                                                            <td  onclick="supplierInfo('<?php echo e($val->id); ?>')">
                                                                <?php echo e($val->email); ?>

                                                            </td>
                                                            <td onclick="supplierInfo('<?php echo e($val->id); ?>')">
                                                                <?php echo e($val->company_name); ?>

                                                            </td>
                                                            <td onclick="supplierInfo('<?php echo e($val->id); ?>')">
                                                                <?php echo e($val->nicename); ?>

                                                            </td>
                                                            <td onclick="supplierInfo('<?php echo e($val->id); ?>')">
                                                                <?php echo e($val->address); ?>

                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(count($data)==""): ?>
                                                        <tr class="text-center">
                                                            <td colspan="5" style="color: dimgray;">Sorry, No Suppliers Found !</td>
                                                        </tr>
                                                    <?php endif; ?>
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