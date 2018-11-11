<div class="page-sidebar">
    <ul class="x-navigation">
        <li class="x-navigation">
        <li class="xn-logo">
            <a href="index-2.html">ABC-GCC</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="<?php echo e(asset('users/myProfile')); ?>" class="profile-mini">
                <img src="<?php echo e(asset('img/emptyProfilePic.jpg' )); ?>"/>
            </a>
            <div class="profile">
                <a href="<?php echo e(asset('users/myProfile/'.auth()->user()->id)); ?>">
                    <div class="profile-image">
                        <img  src="<?php echo e(asset('img/emptyProfilePic.jpg' )); ?>" />
                    </div>
                </a>
                <div class="profile-data">
                    <div class="profile-data-name"><?php echo e(auth()->user()->name); ?></div>
                    <div class="profile-data-title"><?php echo e(auth()->user()->email); ?></div>
                </div>
            </div>
        </li>
        <li class="xn-title">Menu</li>
        <li class="">
            <a href="<?php echo e(asset('home')); ?>">
                <span class="fa fa-home"></span>
                Home
            </a>
        </li>
        <?php if(isset($menu)): ?>
        <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k =>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(count($val)): ?>
            <li class="xn-openable <?php echo e($val['Active']); ?>" title="<?php echo e($val['title']); ?>" >
                <a href="#">
                    <span class="<?php echo e($val['icon']); ?>" ></span>
                    <span class="xn-text"><?php echo e($val['text']); ?></span>
                </a>
                <?php if(isset($val['details']) && count($val['details'])): ?>
                    <ul>
                        <?php $__currentLoopData = $val['details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k2 => $val2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="<?php echo e($val2['Active']); ?>" >
                                <a href="<?php echo e($val2['link']); ?>"><span class="<?php echo e($val2['icon']); ?>"></span><?php echo e($val2['text']); ?></a>
                                <?php if(count($val2['details'])): ?>
                                    <ul>
                                        <?php $__currentLoopData = $val2['details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k3 => $val3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="<?php echo e($val3['Active']); ?>">
                                                <a href="<?php echo e($val3['link']); ?>">
                                                    <span class="<?php echo e($val3['icon']); ?>"></span>
                                                    <?php echo e($val3['text']); ?>

                                                </a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
            </li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </ul>
</div>