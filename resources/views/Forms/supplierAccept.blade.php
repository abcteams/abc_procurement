<form class="form-horizontal" method="POST" action="{{ url('forms/supplierAccepted') }}"  enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" value="{{$data[0]->main_id}}" name="material_inquiry">

    <input type="hidden" value="{{$supplier->id}}" name="id">
    <div class="row">
        <div class="panel panel-default" style="padding-bottom: 10px">
            <div class="panel-body form-group-separated">
                <div class="form-group">
                    <label class="col-md-4 col-xs-5 control-label">Total Price (AED)</label>
                    <div class="col-md-8 col-xs-7">
                        <div class='input-group'>
                            <input id="totalPrice" type="float"   value="{{old('total_price')}}" class="form-control" name="total_price" required>
                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 col-xs-5 control-label">Upload Quotation</label>
                    <div class="col-md-8 col-xs-7">
                        <div class='input-group'>
                            <input type="file" value="{{old('quotation')}}" name="quotation"  onchange="uploadFile(this)"  >
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 col-xs-5 control-label">Upload Datasheet</label>
                    <div class="col-md-8 col-xs-7">
                        <div class='input-group'>
                            <input type="file"  value="{{old('datasheet')}}" name="datasheet"  onchange="uploadFile(this)"  >
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-md-4 col-xs-4 control-label">Compliance</label>
                    <div class="col-md-8 col-xs-8">
                        <div class="col-md-4 col-xs-4"><input type="radio" name="compliance" {{old('compliance') == 'Full' ? 'checked':''}} value="Full" checked> Full</div>
                        <div class="col-md-4 col-xs-4"><input type="radio" name="compliance" {{old('compliance') == 'Partial' ? 'checked':''}} value="Partial"> Partial</div>
                        <div class="col-md-4 col-xs-4"><input type="radio" name="compliance" {{old('compliance') == 'N/A' ? 'checked':''}} value="N/A"> N/A</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 col-xs-5 control-label">Delivery Period</label>
                    <div class="col-md-8 col-xs-7">
                        <div class='input-group'>
                            <input type="text" class="form-control" value="{{old('deliveryPeriod')}}"  name="deliveryPeriod" required>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-md-4 col-xs-5 control-label">Contact Person</label>
                    <div class="col-md-8 col-xs-7">
                        <div class='input-group'>
                            <input type="text" class="form-control" value="{{old('supplier_name')}}"  name="supplier_name"  >
                            <span class="input-group-addon"><span class="fa fa-user"></span></span>
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-md-4 col-xs-5 control-label">Email</label>
                    <div class="col-md-8 col-xs-7">
                        <div class='input-group'>
                            <input class="form-control" type="supplier_email"  value="{{old('email')}}" name="email" >
                            <span class="input-group-addon">
                                <span class="fa fa-envelope"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 col-xs-5"></div>
                </div>
            </div>
            <div style="padding: 10px">
                <button class="btn btn-success pull-right" style="width:120px;">Send</button>
            </div>
        </div>
    </div>
</form>