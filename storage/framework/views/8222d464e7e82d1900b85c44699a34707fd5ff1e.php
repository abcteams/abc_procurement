<!DOCTYPE html>
<html>
<head>

    <style>
        page { margin: 100px 25px; }
        header { position: fixed; top: -60px; left: 0px; right: 0px; background-color: lightblue; height: 50px; }
        footer { position: fixed; bottom: -60px; left: 0px; right: 0px; background-color: lightblue; height: 50px; }
        p { page-break-after: always; }
        p:last-child { page-break-after: never;}
        .materialTable{
            border: 1px solid black;
        }
        .materialTable tr{
            border: 1px solid black;

        }
        .materialTable tr td{
            border: 1px solid black;
            padding: 3px;
        }
        .materialTable tr th{
            border: 1px solid black;
            padding: 6px;
        }
        .pragraf{font-size: 14px;text-align: justify}
        .page_break { page-break-before: always; }
    </style>
</head>
<body>

<div class="page-container">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <img src="<?php echo e(asset('img/abclogo.png')); ?>">
                            <h3 class="panel-title" style="text-align: center;width:100%">
                                <div>ADVANCE BUILDING CONSTRUCTION COMPANY L.L.C.</div>
                                <div>PURCHASE ORDER-SUBCONTRACT</div>
                                <div><?php echo e($data['main'][0]->workzone); ?></div>
                            </h3>
                           <div style="width: 100%;">
                                <table style="font-size: 13px;">
                                    <tr><td style="font-size: 13px;width: 100px">Order No.</td><td><?php echo e($data['main'][0]->order_number); ?></td></tr>
                                    <tr><td width="100px">Oreder To</td><td><?php echo e($userinfo[0]->company_name); ?></td></tr>
                                    <tr><td width="100px">Tel</td><td><?php echo e($userinfo[0]->phone_number); ?></td></tr>
                                    <tr><td width="100px">Location</td><td><?php echo e($userinfo[0]->address); ?></td></tr>
                                    <tr><td width="100px">Attention</td><td><?php echo e($userinfo[0]->name); ?></td></tr>
                                </table>
                                <table style="font-size: 13px;position: absolute;right: 250px;top: 180px">
                                    <tr><td width="100px">Date</td><td><?php echo e($data['main'][0]->order_date); ?></td></tr>
                                    <tr><td width="100px">Job No.</td><td><?php echo e($data['main'][0]->job_no); ?></td></tr>
                                    <tr><td width="100px">Quotation Ref</td><td><?php echo e($data['main'][0]->quotation_ref); ?></td></tr>
                                    <tr><td width="100px">Site In Charge</td><td>Engr. <?php echo e($data['main'][0]->name); ?></td></tr>
                                    <tr><td width="100px">Mob</td><td><?php echo e($data['main'][0]->phone_number); ?></td></tr>
                                </table>
                           </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <table class="table table-bordered table-striped table-actions materialTable"  style="font-size: 14px;">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th width="230px">Description</th>
                                                <th width="60px">Quantity</th>
                                                <th width="60px">Size</th>
                                                <th width="80px">Model</th>
                                                <th width="50px">Rate</th>
                                                <th width="70px">Amount</th>
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
                                                        <td><?php echo e(number_format($val->rate,2)); ?> </td>
                                                        <td><?php echo e(number_format(($val->rate * $val->orderQuantity),2)); ?> </td>
                                                        <?php $totalAmount  += ($val->rate * $val->orderQuantity);  ?>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            <tr class="detailsTr">
                                                <td colspan="2"><div style="width: 200px;color: black;float: right">Total Quantity</div></td>
                                                <td style="color: black"><?php echo e($totalQut); ?></td>
                                                <td colspan="3"><div style="width: 200px;color: black;float: right">Subtotal</div></td>
                                                <td style="color: black"><?php echo e(number_format($totalAmount,2)); ?> </td>
                                            </tr>
                                            <tr class="detailsTr">
                                                <td colspan="6"><div style="width: 200px;color: black;float: right">Freight</div></td>
                                                <td style="color: black"><?php echo e(number_format(($data['main'][0]->freight),2)); ?></td>
                                            </tr>
                                            <tr class="detailsTr">
                                                <td colspan="6"><div style="width: 200px;color: black;float: right" >Discount</div></td>
                                                <td style="color: black"><?php echo e(number_format(($data['main'][0]->discount),2)); ?></td>
                                            </tr>
                                            <tr class="detailsTr">
                                                <td colspan="6"><div style="width: 200px;color: black;float: right" >Taxable Value</div></td>
                                                <td style="color: black"><?php echo e(number_format((($total = $totalAmount + $data['main'][0]->freight) - $data['main'][0]->discount),2)); ?></td>
                                            </tr>
                                            <tr class="detailsTr">
                                                <td colspan="6"><div style="width: 200px;color: black;float: right" >Tax Amount</div></td>
                                                <td style="color: black"><?php echo e(number_format(($total * 0.05),2)); ?></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <img src="<?php echo e(asset('img/Stamp.png')); ?>" style="position: absolute;top: 800px;left: 205px;width: 120px">
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div class="page_break"></div>

<div class="page-container">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <img src="<?php echo e(asset('img/abclogo.png')); ?>">
                            <h3 class="panel-title" style="text-align: center;width:100%">
                                <div>ADVANCE BUILDING CONSTRUCTION COMPANY L.L.C.</div>
                                <div>PURCHASE ORDER-SUBCONTRACT</div>
                                <div><?php echo e($data['main'][0]->workzone); ?></div>
                            </h3>
                            <div style="width: 100%;">
                                <table style="font-size: 13px;">
                                    <tr><td style="font-size: 13px;width: 100px">Order No.</td><td><?php echo e($data['main'][0]->id); ?></td></tr>
                                    <tr><td width="100px">Oreder To</td><td><?php echo e($userinfo[0]->name); ?></td></tr>
                                    <tr><td width="100px">Tel</td><td><?php echo e($userinfo[0]->phone_number); ?></td></tr>
                                    <tr><td width="100px">Location</td><td><?php echo e($userinfo[0]->address); ?></td></tr>
                                </table>
                                <table style="font-size: 13px;position: absolute;right: 250px;top: 180px">
                                    <tr><td width="100px">Job No.</td><td><?php echo e($data['main'][0]->job_no); ?></td></tr>
                                    <tr><td width="100px">Quotation Ref</td><td><?php echo e($data['main'][0]->quotation_ref); ?></td></tr>
                                    <tr><td width="100px">Site In Charge</td><td><?php echo e($data['main'][0]->name); ?></td></tr>
                                    <tr><td width="100px">Mob</td><td><?php echo e($data['main'][0]->phone_number); ?></td></tr>
                                </table>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12" style="margin-top: 20px">
                                    <table class="materialTable"  style="font-size: 13px;" >
                                        <thead></thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td style="border: 0px;width: 210px">Procurement Engineer</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border: 0px;height: 40px;text-align: center">
                                                            <img src="<?php echo e(asset('img/Asim-Signature.jpg')); ?>" width="50px">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td style="border: 0px;width: 210px">Commercial Officer</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border: 0px;height: 40px"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td style="border: 0px;width: 210px;">Net Amount</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border: 0px;height: 40px"><?php echo e(number_format(($total + ($total * 0.05)),2)); ?> AED </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td style="border: 0px;width: 210px">Procurement Manger</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border: 0px;height: 40px"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td style="border: 0px;width: 210px">Authorized Signatory</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border: 0px;height: 40px;text-align: center">
                                                        <img src="<?php echo e(asset('img/Asim-Signature.jpg')); ?>" width="50px">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
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
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="<?php echo e(asset('img/Stamp.png')); ?>" style="position: absolute;top: 800px;left: 205px;width: 120px">
            </div>
        </div>
    </div>
</div>


<div class="page_break"></div>
<?php echo $__env->make('Pdf.conditionAndTirms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>





<script type="text/javascript" src="<?php echo e(asset('js/plugins.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/actions.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/plugins/bootstrap/bootstrap-datepicker.js')); ?>"></script>


</body>
</html>
