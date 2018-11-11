<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Procurement</title>

    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" id="theme"  href="<?php echo e(asset('css/theme-default.css')); ?>"/>
    <link rel="stylesheet" type="text/css" id="theme"  href="<?php echo e(asset('css/select2.css')); ?>"/>

    <script type="text/javascript" src="<?php echo e(asset('js/plugins/jquery/jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/plugins/bootstrap/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/sweetalert.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/select2.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/Forms/main.js')); ?>"></script>

</head>
<body>
<style>
    .detailsTr td {
        color :black;
        padding: 5px 20px !important;;
    }
</style>
<div class="page-container">
    <div class="page-sidebar" style="padding: 1px;float: left;">
        <div style="text-align: center;background: #33414e;padding: 50px 0px">
            <img style="width: 130px;padding-bottom: 14%" src="<?php echo e(asset('img/abclogo.png')); ?>">


            <div style="padding: 15px;border-left: 2px solid #faee05;margin: 10px;text-align: center">
                <span style="color: white;font-size: 20px;font-family: Andalus"><?php echo e(strtoupper('Project Name ')); ?></span><br />
                <span  style="color:#faee05;font-size: 20px;font-family: Andalus"><?php echo e(strtoupper($data['main'][0]->workzone)); ?></span>
            </div>
            <div style="padding: 15px;border-left: 2px solid #faee05;margin: 10px;;text-align: center">
                <span style="color: white;font-size: 20px;font-family: Andalus"><?php echo e(strtoupper('Project Status ')); ?></span><br />
                <span  style="color: #faee05;font-size: 20px;font-family: Andalus"><?php echo e(strtoupper('Job In hand')); ?></span>
            </div>
        </div>
    </div>
    <div class="page-content" style="padding-top: 30px">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="padding: 20px">
                            <h3 class="panel-title" style="text-align: center;width:100%">
                                <div>ADVANCE BUILDING CONSTRUCTION COMPANY L.L.C.</div>
                                <div>PURCHASE ORDER-SUBCONTRACT</div>
                                <div><?php echo e($data['main'][0]->workzone); ?></div>
                            </h3>
                            <table class="pull-left">
                                <tr><td width="100px">Order No.</td><td><?php echo e($data['main'][0]->order_number); ?></td></tr>
                                <tr><td width="100px">Oreder To</td><td><?php echo e($userinfo[0]->company_name); ?></td></tr>
                                <tr><td width="100px">Tel</td><td><?php echo e($userinfo[0]->phone_number); ?></td></tr>
                                <tr><td width="100px">Location</td><td><?php echo e($userinfo[0]->address); ?></td></tr>
                                <tr><td width="100px">Attention</td><td><?php echo e($userinfo[0]->name); ?></td></tr>
                            </table>
                            <table class="pull-right">
                                <tr><td width="100px">Date</td><td><?php echo e($data['main'][0]->order_date); ?></td></tr>
                                <tr><td width="100px">Job No.</td><td><?php echo e($data['main'][0]->job_no); ?></td></tr>
                                <tr><td width="100px">Quotation Ref</td><td><?php echo e($data['main'][0]->quotation_ref); ?></td></tr>
                                <tr><td width="100px">Site In Charge</td><td>Engr. <?php echo e($data['main'][0]->name); ?></td></tr>
                                <tr><td width="100px">Mob</td><td><?php echo e($data['main'][0]->phone_number); ?></td></tr>
                            </table>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                     <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><?php echo e($data['main'][0]->sub_gml); ?></h3>
                                            <a href="<?php echo e(asset('pdf/pdfLpo/'.request()->id.'/'.request()->supplier_id)); ?>" class="btn btn-primary  pull-right" style="width: 140px">
                                                <div class="pull-left">Download LPO </div>
                                                <span class="fa fa-download pull-right" style="margin-top:3px;color:#ffffff"></span>
                                            </a>
                                        </div>
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Description</th>
                                                <th>Quantity</th>
                                                <th>Size</th>
                                                <th>Model</th>
                                                <th>Rate</th>
                                                <th>Amount</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $totalAmount  = 0;$totalQut  = 0;  ?>
                                            <?php if(count($data['materials']) > 0): ?>
                                                <?php $__currentLoopData = $data['materials']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                    <td><?php echo e($k +  1); ?></td>
                                                    <td><?php echo e($val->description); ?></td>
                                                    <td>
                                                        <?php echo e($val->orderQuantity.' '.$val->quantity_unit); ?>

                                                        <?php $totalQut  += $val->orderQuantity;  ?>
                                                    </td>
                                                    <td><?php echo e($val->size.' '.$val->size_unit); ?></td>
                                                    <td><?php echo e($val->model); ?></td>
                                                    <td><?php echo e(number_format($val->rate,2)); ?></td>
                                                    <td>
                                                        <?php echo e(number_format(($val->rate * $val->orderQuantity),2)); ?>

                                                        <?php $totalAmount  += ($val->rate * $val->orderQuantity);  ?>
                                                    </td>
                                                </tr>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            <?php if(count($data['accessories']) > 0): ?>
                                                <?php $__currentLoopData = $data['accessories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td>**<?php echo e($k +  1); ?></td>
                                                        <td><?php echo e($val->description); ?></td>
                                                        <td>
                                                            <?php echo e($val->orderQuantity); ?>

                                                            <?php $totalQut  += $val->orderQuantity;  ?>
                                                        </td>
                                                        <td>-</td>
                                                        <td><?php echo e($val->model); ?></td>
                                                        <td><?php echo e(number_format($val->rate,2)); ?></td>
                                                        <td><?php echo e(number_format(($val->rate * $val->orderQuantity),2)); ?> </td>
                                                        <?php $totalAmount  += ($val->rate * $val->orderQuantity);  ?>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           <?php endif; ?>
                                            <tr class="detailsTr">
                                                <td colspan="2"><div style="width: 200px;color: black" class="pull-right">Total Quantity</div></td>
                                                <td style="color: black"><?php echo e($totalQut); ?></td>
                                                <td colspan="3"><div style="width: 200px;color: black" class="pull-right">Subtotal</div></td>
                                                <td style="color: black"><?php echo e(number_format($totalAmount,2)); ?></td>
                                            </tr>
                                            <tr class="detailsTr">
                                                <td colspan="6"><div style="width: 200px;color: black" class="pull-right">Freight</div></td>
                                                <td style="color: black"><?php echo e(number_format(($data['main'][0]->freight),2)); ?></td>
                                            </tr>
                                            <tr class="detailsTr">
                                                <td colspan="6"><div style="width: 200px;color: black" class="pull-right">Discount</div></td>
                                                <td style="color: black"><?php echo e(number_format(($data['main'][0]->discount),2)); ?></td>
                                            </tr>
                                            <tr class="detailsTr">
                                                <td colspan="6"><div style="width: 200px;color: black" class="pull-right">Taxable Value</div></td>
                                                <td style="color: black"><?php echo e(number_format((($total = $totalAmount + $data['main'][0]->freight) - $data['main'][0]->discount ),2)); ?></td>
                                            </tr>
                                            <tr class="detailsTr">
                                                <td colspan="6"><div style="width: 200px;color: black" class="pull-right">Tax Amount</div></td>
                                                <td style="color: black"><?php echo e(number_format(($total * 0.05),2)); ?></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped table-actions">
                                        <thead></thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="3" style="color:black;font-size: 18px;text-align: center"> Net Amount</td>
                                                <td style="color:black;font-size: 16px;text-align: center"><?php echo e(number_format(($total + ($total * 0.05)),2)); ?> AED </td>
                                            </tr>
                                            <tr class="detailsTr">
                                                <td>Special Conditions </td>
                                                <td colspan="3">All as per General Conditions of Purchase in Annexure A (attached).</td>
                                            </tr>
                                            <tr class="detailsTr">
                                                <td>Payment terms </td>
                                                <td colspan="3"><?php echo e($data['main'][0]->payment_terms); ?></td>
                                            </tr>
                                            <tr class="detailsTr">
                                                <td>Delivery Date </td>
                                                <td colspan="3"><?php echo e($data['main'][0]->delivery_date); ?></td>
                                            </tr>
                                            <tr class="detailsTr">
                                                <td>Delivery Location </td>
                                                <td colspan="3"><?php echo e($data['main'][0]->location); ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer" style="padding: 50px">
                            <a href="<?php echo e(asset('forms/acceptRequisition/'.$data['main'][0]->id)); ?>" style="margin-left:10px;padding: 10px 20px" class="btn btn-success pull-right" >Acknowledge</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">

        <br />
    </div>
</div>
</div>
<br /><br /><br />
<!-- Scripts -->
<!-- END PLUGINS -->

<script type="text/javascript" src="<?php echo e(asset('js/plugins.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/actions.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/plugins/bootstrap/bootstrap-datepicker.js')); ?>"></script>


</body>
</html>
