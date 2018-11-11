<?php $__env->startSection('content'); ?>
    <ul class="breadcrumb" xmlns="http://www.w3.org/1999/html">
        <li><a href="<?php echo e(asset('home')); ?>">Home</a></li>
        <li ><a href="<?php echo e(asset('boq/show/'.$main_boq->work_zone_id)); ?>">BOQ</a></li>
        <li ><a href="<?php echo e(asset('boq/showsubboq/'.$main_boq->id)); ?>">Boq Sub Materials</a></li>
        <li class="active">Add Boq Sub Materials</li>
    </ul>
    <?php
    $q_unit =   "";
    if(old('quantity_unit') == ""){
        if(isset($theRecord[0]->quantity_unit))$q_unit   = $theRecord[0]->quantity_unit;
    }else{
        $q_unit =   old('quantity_unit');
    }
    $s_unit =   "";
    if(old('size_unit') == ""){
        if(isset($theRecord[0]->size_unit))$s_unit   = $theRecord[0]->size_unit;
    }else{
        $s_unit =   old('size_unit');
    }
    $unitprice =   "";
    if(old('unitPrice') == ""){
        if(isset($theRecord[0]->budgetory_price))
        {
            $totalprice = $theRecord[0]->budgetory_price;
            $totalqty   = $theRecord[0]->quantity;
            $unitprice  = $totalprice/$totalqty;
        }
    }else{
        $unitprice =   old('unitPrice');
    }
    ?>
    <div class="page-title">
        <h2><?php echo e($main_boq->title); ?> </h2><h4 style="padding-top:10px">&nbsp -> Add Boq Sub Materials</h4>
    </div>

    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <form class="form-horizontal" method="POST" action="<?php echo e(url('boq/addboqsubmaterilas')); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e(isset($theRecord[0])?$theRecord[0]->id:'0'); ?>" >
                            <input type="hidden" name="boq_id" value="<?php echo e($main_boq->id); ?>" >

                            <div class="panel-heading">
                                <h3 class="panel-title">Add</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Quantity</label>
                                            <div class="col-md-5">
                                                <div class="input-group" style="width: 100%">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input id="quantity" type="number" onchange="getTotalPrice()" value="<?php echo e(isset($theRecord[0])?$theRecord[0]->quantity:old('quantity')); ?>" class="form-control" name="quantity" required>
                                                </div>
                                            </div>

                                            <label for="name" class="col-md-1 control-label">Unit</label>
                                            <div class="col-md-4">
                                                <div class="input-group"  style="width: 100%">
                                                    <select id="quantity_unit"  name="quantity_unit" class="select2 form-control">
                                                        <option value="" <?php echo e($q_unit == ""?'selected':''); ?>>Quantity Unit</option>
                                                        <option value="No's" <?php echo e($q_unit == "No's"?'selected':''); ?>>No's</option>
                                                        <option value="Meter" <?php echo e($q_unit == "Meter"?'selected':''); ?>>Meter</option>
                                                        <option value="Metersquare" <?php echo e($q_unit == "Metersquare"?'selected':''); ?>>Meter square</option>
                                                        <option value="Ls" <?php echo e($q_unit == "Ls"?'selected':''); ?>>L.S</option>
                                                        <option value="KW" <?php echo e($q_unit == "KW"?'selected':''); ?>>KW</option>
                                                        <option value="Set" <?php echo e($q_unit == "Set"?'selected':''); ?>>Set</option>
                                                        <option value="Days" <?php echo e($q_unit == "Days"?'selected':''); ?>>Days</option>
                                                        <option value="Box" <?php echo e($q_unit == "Box"?'selected':''); ?>>Box</option>
                                                        <option value="Kg" <?php echo e($q_unit == "Kg"?'selected':''); ?>>Kg</option>
                                                        <option value="Sqrft" <?php echo e($q_unit == "Sqrft"?'selected':''); ?>>Sqrft</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br />

                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Size</label>
                                            <div class="col-md-5">
                                                <div class="input-group" style="width: 100%">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input id="size" type="text" value="<?php echo e(isset($theRecord[0])?$theRecord[0]->size:old('size')); ?>" class="form-control" name="size">
                                                </div>
                                            </div>
                                            <label for="name" class="col-md-1 control-label">Unit</label>
                                            <div class="col-md-4">
                                                <div class="input-group" <?php echo e($errors->default->has('size_unit') ?  $errors->default->first('size_unit') : ''); ?> style="width: 100%">
                                                    <select class="form-control select2" name="size_unit">
                                                        <option value="" <?php echo e($s_unit == ""?'selected':''); ?>>Size Unit</option>
                                                        <option value="Inch" <?php echo e($s_unit == "Inch"?'selected':''); ?>>Inch</option>
                                                        <option value="mm" <?php echo e($s_unit == "mm"?'selected':''); ?>>mm</option>
                                                        <option value="Set" <?php echo e($s_unit == "Set"?'selected':''); ?>>Set</option>
                                                        <option value="Ls" <?php echo e($s_unit == "Ls"?'selected':''); ?>>L|s</option>
                                                        <option value="kg" <?php echo e($s_unit == "kg"?'selected':''); ?>>kg</option>
                                                        <option value="hr" <?php echo e($s_unit == "hr"?'selected':''); ?>>hr</option>
                                                        <option value="Meter Cube" <?php echo e($s_unit == "Meter Cube"?'selected':''); ?>>Meter Cube</option>
                                                        <option value="Meter Square" <?php echo e($q_unit == "Meter Square"?'selected':''); ?>>Meter square</option>
                                                        <option value="KW" <?php echo e($q_unit == "KW"?'selected':''); ?>>KW</option>
                                                        <option value="Set" <?php echo e($q_unit == "Set"?'selected':''); ?>>Set</option>
                                                        <option value="Days" <?php echo e($q_unit == "Days"?'selected':''); ?>>Days</option>
                                                        <option value="KVA" <?php echo e($q_unit == "KVA"?'selected':''); ?>>KVA</option>
                                                        <option value="A" <?php echo e($q_unit == "A"?'selected':''); ?>>A</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                                <br/>
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Unit Budgetary Price</label>
                                            <div class="col-md-5">
                                                <div class="input-group" style="width: 100%">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input id="unitPrice" name="unitPrice" type="number" value="<?php echo e($unitprice == ""?old('unitPrice'):$unitprice); ?>" step="0.01" class="form-control" onchange="getTotalPrice()" required>
                                                </div>
                                            </div>
                                            <label for="name" class="col-md-1 control-label">Total Price</label>
                                            <div class="col-md-4">
                                                <div class="input-group" style="width: 100%">
                                                    <input class="form-control" name="budgetory"  id="totalPrice" type="number"  value="<?php echo e(isset($theRecord[0])?$theRecord[0]->budgetory_price:old('budgetory')); ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="description" class="col-md-2 control-label" style="line-height: 15px;">Description</label>
                                            <div class="col-md-10">
                                                <div class="input-group" style="width: 100%">
                                                    <textarea class="form-control" name="description" required><?php echo e(isset($theRecord[0])?$theRecord[0]->description:old('description')); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br/>
                                <?php if(isset($theRecord[0])): ?>
                                    <?php if(file_exists('attachments/material_specs/'.$theRecord[0]->id)): ?>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label for="old_material_specs" class="col-md-2 control-label" style="line-height: 15px;">Currently Specs File</label>
                                                    <div class="col-md-10">
                                                        <div class="input-group" style="width: 100%">
                                                            <?php ($files = File::allFiles('attachments/material_specs/'.$theRecord[0]->id)); ?>
                                                            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file=>$f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <a href="<?php echo e(asset($f->getPathname())); ?>">View Specs</a>
                                                                .....................................
                                                                <a href="#" onclick='removeSpecs("<?php echo e($theRecord[0]->id); ?>","<?php echo e($f->getFilename()); ?>")' class="glyphicon glyphicon-remove" style="color:#b13f3f;cursor: pointer;"></a><br>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <br/>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="material_specs" class="col-md-2 control-label" style="line-height: 15px;">Custom Material Specs (Optional)</label>
                                            <div class="col-md-10">
                                                <div class="input-group" style="width: 100%">
                                                    <input type="file" name="attachments[]" multiple  />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br/><br/><br/>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="material_specs" class="col-md-2 control-label" style="line-height: 15px;color:red   ">Notes</label>
                                            <label for="material_specs" class="col-md-10 control-label " style="line-height: 15px;text-align: left;color:red">
                                                * Budgetary Price includes The Accessories Prices <br />
                                                * (fitting & accessories) which is included in price
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-10">
                                                <div class="errorMasseges" style="padding:10px 0px">
                                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="alert alert-danger"><?php echo e($error); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="panel-footer">

                                    <input style="margin-left:10px;width:70px" type="submit" value="<?php echo e(isset($theRecord[0])?'update':'add'); ?>" class="btn btn-primary pull-right" />
                                    <a href="<?php echo e(URL::previous()); ?>" style="width:70px" class="btn btn-danger pull-right" >Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT -->
    </div>

    <script src="<?php echo e(asset('js/BOQ/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>