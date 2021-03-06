<?php $__env->startSection('content'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <ul class="breadcrumb">
        <li><a href="<?php echo e(asset('home')); ?>">Home</a></li>
        <li><a href="<?php echo e(asset('users/showUsers')); ?>">Users</a></li>
        <li class="active">Rules</li>
    </ul>
    <div class="page-title">
        <h2><?php echo e($user[0]->name); ?></h2>
    </div>

    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12" style="padding-top: 10px">
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong><?php echo e($data[0]->name); ?>

                                        <input type="hidden"  class="screen_id"  value="<?php echo e($data[0]->screen); ?>" ></strong>
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
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[0]->screen)); ?>" <?php echo e(intval($data[0]->can_show) == 1 ? 'checked':''); ?>>
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
                                                        <input type="checkbox" id="can_edit<?php echo e(intval($data[0]->screen)); ?>"  <?php echo e(intval($data[0]->can_edit) == 1 ? 'checked':''); ?> >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Procurement Approve</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox"  id="can_approve<?php echo e(intval($data[0]->screen)); ?>"  <?php echo e(intval($data[0]->can_approve) == 1 ? 'checked':''); ?>    >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Technical Approve</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox"  id="can_approve2<?php echo e(intval($data[0]->screen)); ?>"  <?php echo e(intval($data[0]->can_approve2) == 1 ? 'checked':''); ?>    >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Project Manger Approve</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox"  id="can_approve3<?php echo e(intval($data[0]->screen)); ?>"  <?php echo e(intval($data[0]->can_approve3) == 1 ? 'checked':''); ?>    >
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
                                <h3 class="panel-title"><strong><?php echo e($data[1]->name); ?><input type="hidden"  class="screen_id"  value="<?php echo e($data[1]->screen); ?>" ></strong></h3>
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
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[1]->screen)); ?>"<?php echo e(intval($data[1]->can_show) == 1 ? 'checked':''); ?>   >
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
                                                        <input type="checkbox" id="can_edit<?php echo e(intval($data[1]->screen)); ?>"  <?php echo e(intval($data[1]->can_edit) == 1 ? 'checked':''); ?>    >
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
                                                        <input type="checkbox"  id="can_approve<?php echo e(intval($data[1]->screen)); ?>"  <?php echo e(intval($data[1]->can_approve) == 1 ? 'checked':''); ?>    >
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
                                <h3 class="panel-title"><strong><?php echo e($data[2]->name); ?><input type="hidden"  class="screen_id"  value="<?php echo e($data[2]->screen); ?>" ></strong></h3>
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
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[2]->screen)); ?>"<?php echo e(intval($data[2]->can_show) == 1 ? 'checked':''); ?>   >
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
                                                        <input type="checkbox" id="can_edit<?php echo e(intval($data[2]->screen)); ?>"  <?php echo e(intval($data[2]->can_edit) == 1 ? 'checked':''); ?>    >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Procurement Approve</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox"  id="can_approve<?php echo e(intval($data[0]->screen)); ?>"  <?php echo e(intval($data[0]->can_approve) == 1 ? 'checked':''); ?>    >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Technical Approve</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox"  id="can_approve2<?php echo e(intval($data[0]->screen)); ?>"  <?php echo e(intval($data[0]->can_approve2) == 1 ? 'checked':''); ?>    >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Project Manger Approve</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox"  id="can_approve3<?php echo e(intval($data[0]->screen)); ?>"  <?php echo e(intval($data[0]->can_approve3) == 1 ? 'checked':''); ?>    >
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
                                <h3 class="panel-title"><strong><?php echo e($data[3]->name); ?><input type="hidden"  class="screen_id"  value="<?php echo e($data[3]->screen); ?>" ></strong></h3>
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
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[3]->screen)); ?>"<?php echo e(intval($data[3]->can_show) == 1 ? 'checked':''); ?>   >
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
                                                        <input type="checkbox" id="can_edit<?php echo e(intval($data[3]->screen)); ?>"  <?php echo e(intval($data[3]->can_edit) == 1 ? 'checked':''); ?>    >
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
                                                        <input type="checkbox"  id="can_approve<?php echo e(intval($data[3]->screen)); ?>"  <?php echo e(intval($data[3]->can_approve) == 1 ? 'checked':''); ?>    >
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
                                <h3 class="panel-title"><strong><?php echo e($data[4]->name); ?><input type="hidden"  class="screen_id"  value="<?php echo e($data[4]->screen); ?>" ></strong></h3>
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
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[4]->screen)); ?>"<?php echo e(intval($data[4]->can_show) == 1 ? 'checked':''); ?>   >
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
                                                        <input type="checkbox" id="can_edit<?php echo e(intval($data[4]->screen)); ?>"  <?php echo e(intval($data[4]->can_edit) == 1 ? 'checked':''); ?>    >
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
                                                        <input type="checkbox"  id="can_approve<?php echo e(intval($data[4]->screen)); ?>"  <?php echo e(intval($data[4]->can_approve) == 1 ? 'checked':''); ?>    >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Commercial Approve</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox"  id="can_approve2<?php echo e(intval($data[4]->screen)); ?>"  <?php echo e(intval($data[4]->can_approve2) == 1 ? 'checked':''); ?>    >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Operations Manger Approve</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox"  id="can_approve3<?php echo e(intval($data[4]->screen)); ?>"  <?php echo e(intval($data[4]->can_approve3) == 1 ? 'checked':''); ?>    >
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
                                <h3 class="panel-title"><strong><?php echo e($data[5]->name); ?><input type="hidden"  class="screen_id"  value="<?php echo e($data[5]->screen); ?>" ></strong></h3>
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
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[5]->screen)); ?>"<?php echo e(intval($data[5]->can_show) == 1 ? 'checked':''); ?>   >
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
                                                        <input type="checkbox" id="can_edit<?php echo e(intval($data[5]->screen)); ?>"  <?php echo e(intval($data[5]->can_edit) == 1 ? 'checked':''); ?>    >
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
                                                        <input type="checkbox"  id="can_approve<?php echo e(intval($data[5]->screen)); ?>"  <?php echo e(intval($data[5]->can_approve) == 1 ? 'checked':''); ?>    >
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
                                <h3 class="panel-title">
                                    <strong><?php echo e($data[9]->name); ?></strong>
                                    <input type="hidden"  class="screen_id"  value="<?php echo e($data[8]->screen); ?>" >
                                    <input type="hidden"  class="screen_id"  value="<?php echo e($data[9]->screen); ?>" >
                                    <input type="hidden"  class="screen_id"  value="<?php echo e($data[10]->screen); ?>" >
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
                                                        <input type="checkbox" id="can_edit<?php echo e(intval($data[8]->screen)); ?>"  <?php echo e(intval($data[8]->can_edit) == 1 ? 'checked':''); ?>    >
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
                                                        <input type="checkbox"  id="can_approve<?php echo e(intval($data[8]->screen)); ?>"  <?php echo e(intval($data[8]->can_approve) == 1 ? 'checked':''); ?>>
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
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[8]->screen)); ?>"<?php echo e(intval($data[8]->can_show) == 1 ? 'checked':''); ?>>
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Approve</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[9]->screen)); ?>" <?php echo e(intval($data[9]->can_show) == 1 ? 'checked':''); ?>>
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
                                                        <input type="checkbox" id="can_edit<?php echo e(intval($data[9]->screen)); ?>"  <?php echo e(intval($data[9]->can_edit) == 1 ? 'checked':''); ?>>
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
                                                        <input type="checkbox"  id="can_approve<?php echo e(intval($data[9]->screen)); ?>"  <?php echo e(intval($data[9]->can_approve) == 1 ? 'checked':''); ?> >
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
                                                        <input type="checkbox" id="can_approve2<?php echo e(intval($data[9]->screen)); ?>"<?php echo e(intval($data[9]->can_approve2) == 1 ? 'checked':''); ?>   >
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
                                <h3 class="panel-title"><strong><?php echo e($data[7]->name); ?><input type="hidden"  class="screen_id"  value="<?php echo e($data[7]->screen); ?>" ></strong></h3>
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
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[7]->screen)); ?>"<?php echo e(intval($data[7]->can_show) == 1 ? 'checked':''); ?>   >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Procurement Approve</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox"  id="can_approve<?php echo e(intval($data[7]->screen)); ?>"  <?php echo e(intval($data[7]->can_approve) == 1 ? 'checked':''); ?>    >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Commercial Approve</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox"  id="can_approve2<?php echo e(intval($data[7]->screen)); ?>"  <?php echo e(intval($data[7]->can_approve2) == 1 ? 'checked':''); ?>    >
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
                                <h3 class="panel-title"><strong><?php echo e($data[6]->name); ?><input type="hidden"  class="screen_id"  value="<?php echo e($data[6]->screen); ?>" ></strong></h3>
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
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[6]->screen)); ?>"<?php echo e(intval($data[6]->can_show) == 1 ? 'checked':''); ?>   >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Procurement Approve</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox"  id="can_approve<?php echo e(intval($data[6]->screen)); ?>"  <?php echo e(intval($data[6]->can_approve) == 1 ? 'checked':''); ?>    >
                                                        <span></span>
                                                    </label>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Commercial Approve</td>
                                            <td>
                                                <label class="switch switch-small">
                                                    <label class="switch switch-small">
                                                        <input type="checkbox"  id="can_approve2<?php echo e(intval($data[6]->screen)); ?>"  <?php echo e(intval($data[6]->can_approve2) == 1 ? 'checked':''); ?>    >
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
                                <h3 class="panel-title"><strong><?php echo e($data[11]->name); ?><input type="hidden"  class="screen_id"  value="<?php echo e($data[11]->screen); ?>" ></strong></h3>
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
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[11]->screen)); ?>"<?php echo e(intval($data[11]->can_show) == 1 ? 'checked':''); ?>   >
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
                                                        <input type="checkbox" id="can_edit<?php echo e(intval($data[11]->screen)); ?>"  <?php echo e(intval($data[11]->can_edit) == 1 ? 'checked':''); ?>    >
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
                                <h3 class="panel-title"><strong><?php echo e($data[12]->name); ?><input type="hidden"  class="screen_id"  value="<?php echo e($data[12]->screen); ?>" ></strong></h3>
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
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[12]->screen)); ?>"<?php echo e(intval($data[12]->can_show) == 1 ? 'checked':''); ?>   >
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
                                                        <input type="checkbox" id="can_edit<?php echo e(intval($data[12]->screen)); ?>"  <?php echo e(intval($data[12]->can_edit) == 1 ? 'checked':''); ?>    >
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
                                <h3 class="panel-title"><strong><?php echo e($data[13]->name); ?><input type="hidden"  class="screen_id"  value="<?php echo e($data[13]->screen); ?>" ></strong></h3>
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
                                                        <input type="checkbox" id="can_show<?php echo e(intval($data[13]->screen)); ?>"<?php echo e(intval($data[13]->can_show) == 1 ? 'checked':''); ?>   >
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
                                                        <input type="checkbox" id="can_edit<?php echo e(intval($data[13]->screen)); ?>"  <?php echo e(intval($data[13]->can_edit) == 1 ? 'checked':''); ?>    >
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
                            <button onclick="saveTheRules()" class="btn btn-success pull-right" style="width:120px;padding:10px">Save</button>
                            <a href="<?php echo e(asset('users/showUsers')); ?>" style="width:120px;padding:10px;margin-right: 10px" class="btn btn-danger pull-right">Cancel</a>
                        </div>
                    </div>
                    <div style="height:200px">
                        <input type="hidden" value="<?php echo e($user[0]->id); ?>" id="screen">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo e(asset('js/User/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>