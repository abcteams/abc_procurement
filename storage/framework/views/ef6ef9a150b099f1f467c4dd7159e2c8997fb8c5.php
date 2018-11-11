<?php $__env->startSection('content'); ?>
    <div class="login-container lightmode" style="position: initial;    padding-bottom: 100px;">
    <div class="login-box animated fadeInDown" style="width: 60%" >
        <div class="login-body">
            <div style="padding:20px">
                <div style="color:#ffffff;font-size:30px;font-family: 'Times New Roman', Times, serif;text-align: center">PROCUREMENT</div>
                <div style="color:#f1f4ec;text-align: center;margin-top:-5px;font-size:12px">Procurement System</div>
            </div>
            <form class="form-horizontal" method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo e(csrf_field()); ?>

            <br />
                <div class="row">
                    <div class="col-md-6">
                        <div class="login-title">Personal Info</div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                    <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="Full Name" required autofocus>
                                    <?php if($errors->has('name')): ?>
                                        <span class="help-block">
                                                <strong><?php echo e($errors->first('name')); ?></strong>
                                            </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-group<?php echo e($errors->has('user_type') ? ' has-error' : ''); ?>">
                                    <select class="form-control"  name="user_type"  required autofocus>
                                        <option value="1" >Select Register Type</option>
                                        <option value="2" <?php echo e(old('country') == '2' ?'selected':''); ?>>Supplier</option>
                                        <option value="3" <?php echo e(old('country') == '3' ?'selected':''); ?>>Subcontractor</option>
                                    </select>
                                    <?php if($errors->has('user_type')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('user_type')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-group<?php echo e($errors->has('company_name') ? ' has-error' : ''); ?>">
                                    <input id="company_name" type="text" class="form-control" name="company_name" value="<?php echo e(old('company_name')); ?>" placeholder="Company Name" required autofocus>
                                    <?php if($errors->has('company_name')): ?>
                                        <span class="help-block">
                                                <strong><?php echo e($errors->first('company_name')); ?></strong>
                                            </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                    <select class="select2 form-control"  name="country" style="background: rgb(213, 223, 207)">
                                        <option value="" >Select Country</option>
                                        <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(old('country') == $val->id ?'selected':''); ?> value="<?php echo e($val->id); ?>"><?php echo e($val->nicename); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                <?php if($errors->has('country')): ?>
                                    <span class="help-block">
                                            <strong style="color: #b64645"><?php echo e($errors->first('country')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                                    <input type="text" class="form-control" name="address" value="<?php echo e(old('address')); ?>" placeholder="Address" required>
                                    <?php if($errors->has('address')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('address')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-group<?php echo e($errors->has('phone_number') ? ' has-error' : ''); ?>">
                                    <input  type="number" class="form-control" name="phone_number" value="<?php echo e(old('phone_number')); ?>" placeholder="Phone Number" required autofocus>
                                    <?php if($errors->has('phone_number')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('phone_number')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-group<?php echo e($errors->has('phone2') ? ' has-error' : ''); ?>">
                                    <input id="phone2" type="number" class="form-control" name="phone2" value="<?php echo e(old('phone2')); ?>" placeholder="Phone Number 2 (optinal)">
                                    <?php if($errors->has('phone2')): ?>
                                        <span class="help-block">
                                                <strong><?php echo e($errors->first('phone2')); ?></strong>
                                            </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="login-title">Authentication</div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                    <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>" required>
                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group push-up-30">
                            <div class="col-md-6">
                                <a href="<?php echo e(asset('login')); ?>" style="color: #0a6aa1">Already have an account?</a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-danger btn-block"> Register</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <div class="login-footer">
            <div class="pull-left">
                &copy; 2017 Hit
            </div>
            <div class="pull-right">
                <a href="#">About</a> |
                <a href="#">Privacy</a> |
                <a href="#">Contact Us</a>
            </div>
        </div>
    </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>