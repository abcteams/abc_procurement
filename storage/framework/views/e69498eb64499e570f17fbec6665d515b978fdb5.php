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
<div class="page-container" style="height: 1000px;">
    <div class="page-sidebar" style="padding: 1px;float: left;">
        <div style="text-align: center;background: #33414e;padding: 50px 0px">
            <img style="width: 130px;padding-bottom: 14%" src="<?php echo e(asset('img/abclogo.png')); ?>">


        <div style="padding: 15px;border-left: 2px solid #faee05;margin: 10px;text-align: center">
            <span style="color: white;font-size: 20px;font-family: Andalus"><?php echo e(strtoupper('Project Name ')); ?></span><br />
            <span  style="color:#faee05;font-size: 20px;font-family: Andalus"><?php echo e(strtoupper($data->workzone)); ?></span>
        </div>
        <div style="padding: 15px;border-left: 2px solid #faee05;margin: 10px;;text-align: center">
            <span style="color: white;font-size: 20px;font-family: Andalus"><?php echo e(strtoupper('Project Status ')); ?></span><br />
            <span  style="color: #faee05;font-size: 20px;font-family: Andalus"><?php echo e(strtoupper('Job In hand')); ?></span>
        </div>
        </div>
    </div>

    <div class="page-content" style="padding-top: 30px">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Agreement</h3>
                        </div>
                        <div class="panel-body" style="padding: 30px">
                            <h1 style="text-align: center">Supplier Agreement</h1><br/><br/>
                            <h5>This to confirm ABC Acceptance for your Quotation Ref ( <?php echo e($data->quotation_ref); ?> ) .</h5><br/>
                            <p><h3 style=" text-decoration: underline;">Terms and Conditions : </h3></p>
                            <h5 style="padding:20px ">
                                1- &nbsp;&nbsp;Payment trems : &nbsp;<?php echo e($data->payment_terms); ?> .<br/><br/>
                                2- &nbsp;&nbsp;Supplier To Provied material submittal <?php echo e($data->submital_requisted); ?> ( <?php echo e($data->copies_number); ?> Copies ) within 2 days .<br/><br/>
                                3- &nbsp;&nbsp;This Agreement is Subject to consultant Approval .<br/><br/>
                            </h5>
                        </div>
                        <div class="panel-footer">
                            <a href="<?php echo e(asset('forms/acceptAgreement/'.$data->id.'/'.$data->work_zone_id.'/'.$data->sub_gml_id)); ?>" style="margin-left:10px;padding: 10px;width: 100px"class="btn btn-success pull-right" >Accept</a>
                            <button style=" padding: 10px;width: 100px" class="btn btn-danger pull-right" onclick="showAgreementDecline()">Decline</button>
                            <br>
                            <div class="row" style="display:none;" id="agreementDecline">
                                <form class="form-horizontal" method="POST" action="<?php echo e(url('forms/agreementDecline')); ?>">
                                    <?php echo e(csrf_field()); ?>

                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Decline Reason</label>
                                        <textarea class="form-control" cols="10" rows="5" name="declineReason"></textarea>
                                        <input type="hidden" value="<?php echo e($data->id); ?>" name="agreement_id">
                                    </div>
                                </div>
                                <div style="padding: 10px">
                                    <button class="btn btn-danger pull-right" style="width:120px;">Send</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
    </div>
</div>
    </div>
</div>
<!-- Scripts -->
<!-- END PLUGINS -->

<script type="text/javascript" src="<?php echo e(asset('js/plugins.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/actions.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/plugins/bootstrap/bootstrap-datepicker.js')); ?>"></script>


</body>
</html>
