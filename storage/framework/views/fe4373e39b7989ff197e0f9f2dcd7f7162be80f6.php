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
        </div>
    </div>
    <div class="page-content" style="padding-top: 30px">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <br /><br /><br /><br /><br /><br />
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div style="border: 30px solid red;border-radius: 10px">
                            <div style="padding: 50px;border-radius: 10px"><?php echo e($msg); ?></div>
                        </div>
                    </div>
                    <div class="col-md-4"></div>

                </div>

                </div>
            </div>
        </div>
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
