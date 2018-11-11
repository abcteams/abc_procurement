<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Procurement</title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" id="theme"  href="<?php echo e(asset('css/theme-default.css')); ?>"/>
    <link rel="stylesheet" type="text/css" id="theme"  href="<?php echo e(asset('css/select2.css')); ?>"/>

    <script type="text/javascript" src="<?php echo e(asset('js/plugins/jquery/jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/plugins/bootstrap/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/sweetalert.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/select2.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/MTInquiry/main.js')); ?>"></script>
</head>
<body>
    <?php
        $notfy      =   new \App\Notifications\GetNotification();
        $check      =   new \App\MaterialInquiry();
        $allnoti    =   new \App\Notifications();
        $notifydata =   $notfy->getNotificationByRuls();
        $cart       =   $notfy->getCart();
        $count      =   $allnoti->unreadCount(Auth::user()->id);
        $check->checkClosedate();
    ?>
     <div class="page-container">
        <?php echo $__env->make('layouts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="page-content">
            <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                <!-- TOGGLE NAVIGATION -->
                <li class="xn-icon-button">
                    <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                </li>
                <!-- END TOGGLE NAVIGATION -->
                <!-- POWER OFF -->
                <li class="xn-icon-button pull-right last">
                    <a href="#"><span class="fa fa-power-off"></span></a>
                    <ul class="xn-drop-left animated zoomIn">
                        <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Sign Out</a></li>
                    </ul>
                </li>
                <li class="xn-icon-button pull-right">
                    <a href="#" title="Notificaton"><span class="fa fa-globe" style="font-size: 20px"></span></a>
                    <?php if($count != 0): ?>
                        <div class="informer informer-warning"><?php echo e($count); ?></div>
                    <?php endif; ?>    
                    <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                        <div class="panel-heading" style="background-color: #33414e;">
                            <h3 class="panel-title" style="color:white;"><span class="fa fa-globe"></span> Notificatons</h3>
                            <div class="pull-right">
                                <span class="label label-warning"><?php echo e($count); ?></span>
                            </div>
                        </div>
                        <div class="panel-body list-group list-group-contacts  mCustomScrollbar _mCS_2 mCS-autoHide mCS_no_scrollbar" style="height: 300px; ">
                            <div id="mCSB_2" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" style="max-height: 300px;overflow-y: scroll;" tabindex="0">
                                <div id="mCSB_2_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position: relative; top: 0px; left: 0px;" dir="ltr">
                                    <?php $__currentLoopData = $notifydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <form action="<?php echo e(asset('notification/update')); ?>" method="post" id="my_form<?php echo e($val->not_id); ?>" style="margin-bottom:0px">
                                            <?php echo csrf_field(); ?>

                                            <a  href="javascript:{}" onclick="document.getElementById('my_form<?php echo e($val->not_id); ?>').submit();" class="list-group-item" <?php echo e($val->is_read ==0 ?'style=background:#fff2e1;':''); ?>>
                                                <span style="font-weight: bold;"><?php echo e($val->title); ?></span>
                                                <span style="float:right;">
                                                    <span class="fa fa-clock-o" style="color: #e34724;"></span>
                                                    <?php echo e(\Carbon\Carbon::parse($val->created_at,'Asia/Dubai')->diffForHumans()); ?>

                                                </span>
                                                <br>
                                                <span style="padding-left:10px;"><?php echo e(substr($val->description, -100, 55)); ?>...</span>
                                            </a>
                                            <input type="hidden" name="not_id" value="<?php echo e($val->not_id); ?>">
                                            <input type="hidden" name="link" value="<?php echo e($val->link); ?>">
                                        </form>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body list-group list-group-contacts " style="height: 40px; padding-top:10px; text-align:center; background-color:#f5f5f5;">
                           <a href="<?php echo e(asset('notification/viewall')); ?>" style="color:black;font-weight: bold;"> View All Notifications
                           </a>
                        </div>
                    </div>
                </li>
                <li class="xn-icon-button pull-right">
                    <a href="#"><span style="font-size: 20px;" class="fa fa-shopping-cart"></span></a>
                    <div class="informer informer-danger"><?php echo e(count($cart['materials']) + count($cart['accessories'])); ?></div>
                    <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                        <div class="panel-heading">
                            <h3 class="panel-title"><span class="fa fa-shopping-cart"></span> Cart</h3>
                            <div class="pull-right">
                                <span class="label label-danger"><?php echo e(count($cart['materials']) + count($cart['accessories'])); ?></span>
                            </div>
                        </div>
                        <div class="panel-body list-group list-group-contacts  mCustomScrollbar _mCS_2 mCS-autoHide mCS_no_scrollbar" style="height: 200px;">
                            <div id="mCSB_2" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" style="max-height: 200px;overflow-y: scroll;" tabindex="0">
                                <div id="mCSB_2_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position: relative; top: 0px; left: 0px;" dir="ltr" >
                                    <table id="myCart" class="table-striped">
                                        <tr>
                                            <th width="60%">Description</th>
                                            <th width="30%">Size</th>
                                            <th width="10%" >Action</th>
                                        </tr>
                                        <?php $__currentLoopData = $cart['materials']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($val->description); ?></td>
                                                <td><?php echo e($val->size.' '.$val->size_unit); ?></td>
                                                <td><div onclick="removeItem(this,<?php echo e($val->id); ?>)" style="color: red;cursor: pointer">remove</div></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $cart['accessories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($val->description); ?></td>
                                                <td>-</td>
                                                <td><div onclick="removeItem(this,<?php echo e($val->id); ?>)" style="color: red;cursor: pointer">remove</div></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
                                <div id="mCSB_2_scrollbar_vertical" class="mCSB_scrollTools mCSB_2_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: none;">
                                    <div class="mCSB_draggerContainer">
                                        <div id="mCSB_2_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; top: 0px; display: block; height: 162px; max-height: 190px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
                                        </div><div class="mCSB_draggerRail"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-center">
                            <a href="pages-messages.html" class="btn btn-success pull-right">View Cart</a>
                            <a href="pages-messages.html" class="btn btn-info pull-left">My Orders</a>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="ajaxProgress">
                <h3>Please wait</h3>
                <img src="<?php echo e(asset('img/ajax-loader.gif')); ?>">
            </div>
            <?php echo $__env->yieldContent('content'); ?>
            </div>

            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo e(csrf_field()); ?>

            </form>
            <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
                <div class="mb-container">
                    <div class="mb-middle">
                        <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                        <div class="mb-content">
                            <p>Are you sure you want to log out?</p>
                            <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                        </div>
                        <div class="mb-footer">
                            <div class="pull-right">
                                <a href="<?php echo e(route('logout')); ?>"  class="btn btn-success btn-lg" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Yes
                                </a>
                                <button class="btn btn-default btn-lg mb-control-close">No</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    <script type="text/javascript" src="<?php echo e(asset('js/plugins.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/actions.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/plugins/bootstrap/bootstrap-datepicker.js')); ?>"></script>
</body>
</html>
