<form class="form-horizontal" method="POST" action="<?php echo e(url('forms/supplierDecline')); ?>">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" value="<?php echo e($data[0]->main_id); ?>" name="material_inquiry">
    <input type="hidden" value="<?php echo e($supplier->id); ?>" name="id">
    <div class="row">
        <div class="panel panel-default" style="padding-bottom: 10px">
            <div class="panel-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Decline Reason</label>
                    <textarea class="form-control" cols="10" rows="5" name="declineReason"></textarea>
                </div>
            </div>
            <div style="padding: 10px">
                <button class="btn btn-danger pull-right" style="width:120px;">Send</button>
            </div>
        </div>
    </div>
</form>