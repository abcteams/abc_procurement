<?php $__env->startSection('content'); ?>
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Positions </li>
        <li class="active">Add Position</li>
    </ul>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <div class="page-title">
        <h2>New Position</h2>
    </div>
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default" style="margin-top: 20px">
                            <input type="text" value="<?php echo e(isset($data[0]->title)?$data[0]->title:''); ?>" PLACEHOLDER="Position Name"  class="form-control" style="height: 40px;" id="position_name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <strong><?php echo e($data[0]->name); ?><input type="hidden"  class="screen_id"  value="<?php echo e(isset($data[0])?$data[0]->id:''); ?>" ></strong></h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Can Show</td>
                                            <td>

                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[0]->id)); ?>" <?php echo e(isset($data[0]->can_show)?intval($data[0]->can_show)==1 ? 'checked':'':''); ?>>
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Can Add / Edit</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_edit<?php echo e(intval($data[0]->id)); ?>" <?php echo e(isset($data[0]->can_show)?intval($data[0]->can_edit)==1 ? 'checked':'':''); ?>>
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Can Approve</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_approve<?php echo e(intval($data[0]->id)); ?>" <?php echo e(isset($data[0]->can_show)?intval($data[0]->can_approve)==1 ? 'checked':'':''); ?> >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong><?php echo e($data[1]->name); ?><input type="hidden"  class="screen_id"  value="<?php echo e($data[1]->id); ?>" ></strong></h3>
                            </div>
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Can Show</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[1]->id)); ?>" <?php echo e(isset($data[1]->can_show)?intval($data[1]->can_show)==1 ? 'checked':'':''); ?> >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Can Add / Edit</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_edit<?php echo e(intval($data[1]->id)); ?>" <?php echo e(isset($data[1]->can_edit)?intval($data[1]->can_edit)==1 ? 'checked':'':''); ?>>
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Can Approve</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_approve<?php echo e(intval($data[1]->id)); ?>" <?php echo e(isset($data[1]->can_approve)?intval($data[1]->can_approve)==1 ? 'checked':'':''); ?>>
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong><?php echo e($data[2]->name); ?><input type="hidden"  class="screen_id"  value="<?php echo e($data[2]->id); ?>" ></strong></h3>
                            </div>
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Can Show</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[2]->id)); ?>" <?php echo e(isset($data[2]->can_show)?intval($data[2]->can_show)==1 ? 'checked':'':''); ?> >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Can Add / Edit</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_edit<?php echo e(intval($data[2]->id)); ?>" <?php echo e(isset($data[2]->can_show)?intval($data[2]->can_edit)==1 ? 'checked':'':''); ?>>
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Can Approve</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_approve<?php echo e(intval($data[2]->id)); ?>" <?php echo e(isset($data[2]->can_show)?intval($data[2]->can_approve)==1 ? 'checked':'':''); ?>>
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong><?php echo e($data[3]->name); ?><input type="hidden"  class="screen_id"  value="<?php echo e($data[3]->id); ?>" ></strong></h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Can Show</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[3]->id)); ?>" <?php echo e(isset($data[3]->can_show)?intval($data[3]->can_show)==1 ? 'checked':'':''); ?> >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Can Add / Edit</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_edit<?php echo e(intval($data[3]->id)); ?>" <?php echo e(isset($data[3]->can_show)?intval($data[3]->can_edit)==1 ? 'checked':'':''); ?>>
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Can Approve</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_approve<?php echo e(intval($data[3]->id)); ?>" <?php echo e(isset($data[3]->can_show)?intval($data[3]->can_approve)==1 ? 'checked':'':''); ?> >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong><?php echo e($data[4]->name); ?><input type="hidden"  class="screen_id"  value="<?php echo e($data[4]->id); ?>" ></strong></h3>
                            </div>
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Can Show</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[4]->id)); ?>" <?php echo e(isset($data[4]->can_show)?intval($data[4]->can_show)==1 ? 'checked':'':''); ?> >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Can Add / Edit</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_edit<?php echo e(intval($data[4]->id)); ?>" <?php echo e(isset($data[4]->can_show)?intval($data[4]->can_edit)==1 ? 'checked':'':''); ?> value="<?php echo e(isset($data[4]->can_show)?intval($data[4]->can_edit):0); ?>">
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Can Approve</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_approve<?php echo e(intval($data[4]->id)); ?>" <?php echo e(isset($data[4]->can_show)?intval($data[4]->can_approve)==1 ? 'checked':'':''); ?> >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong><?php echo e($data[5]->name); ?><input type="hidden"  class="screen_id"  value="<?php echo e($data[5]->id); ?>" ></strong></h3>
                            </div>
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Can Show</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[5]->id)); ?>" <?php echo e(isset($data[5]->can_show)?intval($data[5]->can_show)==1 ? 'checked':'':''); ?> >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Can Add / Edit</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_edit<?php echo e(intval($data[5]->id)); ?>" <?php echo e(isset($data[5]->can_show)?intval($data[5]->can_edit)==1 ? 'checked':'':''); ?> >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Can Approve</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_approve<?php echo e(intval($data[5]->id)); ?>" <?php echo e(isset($data[5]->can_show)?intval($data[5]->can_approve)==1 ? 'checked':'':''); ?>>
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong><?php echo e($data[6]->name); ?><input type="hidden"  class="screen_id"  value="<?php echo e($data[6]->id); ?>" ></strong></h3>
                            </div>
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Can Show</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[6]->id)); ?>" <?php echo e(isset($data[6]->can_show)?intval($data[6]->can_show)==1 ? 'checked':'':''); ?> >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Can Approve</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_approve<?php echo e(intval($data[6]->id)); ?>" <?php echo e(isset($data[6]->can_show)?intval($data[6]->can_approve)==1 ? 'checked':'':''); ?>>
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <strong>
                                        <?php echo e($data[7]->name); ?><input type="hidden"  class="screen_id"  value="<?php echo e($data[7]->id); ?>" >
                                    </strong>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Can Show</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[7]->id)); ?>" <?php echo e(isset($data[7]->can_show)?intval($data[7]->can_show)==1 ? 'checked':'':''); ?> >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Can Approve</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_approve<?php echo e(intval($data[7]->id)); ?>" <?php echo e(isset($data[7]->can_show)?intval($data[7]->can_approve)==1 ? 'checked':'':''); ?> >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <strong><?php echo e($data[8]->name); ?></strong><input type="hidden"  class="screen_id"  value="<?php echo e($data[8]->id); ?>" >
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Can Add / Edit</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_edit<?php echo e(intval($data[8]->id)); ?>" <?php echo e(isset($data[8]->can_edit)?intval($data[8]->can_edit)==1 ? 'checked':'':''); ?>>
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Approve Checkout</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_approve<?php echo e(intval($data[8]->id)); ?>" <?php echo e(isset($data[8]->can_approve)?intval($data[8]->can_approve)==1 ? 'checked':'':''); ?>  >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Can Checkout</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[8]->id)); ?>" <?php echo e(isset($data[8]->can_show)?intval($data[8]->can_show)==1 ? 'checked':'':''); ?> >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Approve<input type="hidden"  class="screen_id"  value="<?php echo e($data[9]->id); ?>" ></td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[9]->id)); ?>" <?php echo e(isset($data[9]->can_show)?intval($data[9]->can_show)==1 ? 'checked':'':''); ?> >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Approve LPO</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_edit<?php echo e(intval($data[9]->id)); ?>" <?php echo e(isset($data[9]->can_edit)?intval($data[9]->can_edit)==1 ? 'checked':'':''); ?>>
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Approve Awaiting</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_approve<?php echo e(intval($data[9]->id)); ?>" <?php echo e(isset($data[9]->can_approve)?intval($data[9]->can_approve)==1 ? 'checked':'':''); ?>  >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Approve Deliverey</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_approve2<?php echo e(intval($data[9]->id)); ?>" <?php echo e(isset($data[9]->can_show)?intval($data[9]->can_approve2)==1 ? 'checked':'':''); ?> >
                                                        <span></span>
                                                    </label>
                                                </label>
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
            <div class="panel-footer">
                <div class="row" style="padding:20px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-8 col-sm-8 col-xs-8"></div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <input type="hidden" value="<?php echo e(isset($data[0]->position_id)?$data[0]->position_id:0); ?>" id="position_id">
                            <button onclick="saveThePosition()" class="btn btn-success pull-right" style="width:120px;padding:10px">Save</button>
                            <a href="<?php echo e(asset('users/showPositions')); ?>" style="width:120px;padding:10px;margin-right: 10px" class="btn btn-danger pull-right">Cancel</a>
                        </div>
                    </div>
                    <div style="height:200px"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo e(asset('js/User/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>