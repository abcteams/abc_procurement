<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Procurement</title>
    <link rel="stylesheet" type="text/css" id="theme"  href="<?php echo e(asset('css/theme-default.css')); ?>"/>
    <link rel="stylesheet" type="text/css" id="theme"  href="<?php echo e(asset('css/select2.css')); ?>"/>

    <script type="text/javascript" src="<?php echo e(asset('js/plugins/jquery/jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/select2.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/auth/register.js')); ?>"></script>
</head>

<body>

    <?php echo $__env->yieldContent('content'); ?>
</body>
</html>
