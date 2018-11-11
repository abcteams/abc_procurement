@extends('layouts.master')
@section('content')
    <ul class="breadcrumb" xmlns="http://www.w3.org/1999/html">
        <li><a href="{{asset('home')}}">Home</a></li>
    </ul>
    <div class="page-title">
        <h2>Add Agreement</h2><h4 style="padding-top:10px">&nbsp -> Add Boq Sub Materials</h4>
    </div>
    <div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div style="padding:10px">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Form</h3>
                    </div>
                    <br />
                    <form class="form-horizontal" method="POST" action="{{ url('boq/agreementsDitals') }}"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="panel panel-default" style="padding-bottom: 10px">
                                        <div class="panel-body ">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="col-md-4 col-xs-4 control-label">Inquiry Start </label>
                                                    <div class="col-md-8 col-xs-8">
                                                        <div class='input-group'>
                                                            <input type="hidden" value="{{$data->sub_gml_id}}" name="sub_gml_id">
                                                            <input type="text" class="form-control datepicker" name="date" required>
                                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-md-4 col-xs-4 control-label">Inquiry Closed</label>
                                                    <div class="col-md-8 col-xs-8">
                                                        <div class='input-group'>
                                                            <input type="text" class="form-control datepicker" name="close_date" required>
                                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-md-4 col-xs-4 control-label">Supplier </label>
                                                    <div class="col-md-8 col-xs-8">
                                                        <select class="select2 form-control"  name="supplier_id">
                                                            <option value="">Choose Supplier</option>
                                                            @foreach($suppliers as $supplier)
                                                                <option value="{{$supplier->id}}">{{$supplier->company_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-md-4 col-xs-4 control-label">Supplier Price (AED)</label>
                                                    <div class="col-md-8 col-xs-8">
                                                        <div class='input-group'>
                                                            <input id="totalPrice" type="float" value="0.0"  class="form-control" name="total_price" required>
                                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label class="col-md-4 col-xs-4 control-label">Delivery Period</label>
                                                    <div class="col-md-8 col-xs-8">
                                                        <div class='input-group'>
                                                            <input type="text" class="form-control" name="deliveryPeriod" required>
                                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group  col-md-6" >
                                                    <label class="col-md-4 col-xs-4 control-label">Compliance</label>
                                                    <div class="col-md-8 col-xs-8">
                                                        <div class="col-md-4 col-xs-4"><input type="radio" name="compliance" value="Full" checked> Full</div>
                                                        <div class="col-md-4 col-xs-4"><input type="radio" name="compliance" value="Partial"> Partial</div>
                                                        <div class="col-md-4 col-xs-4"><input type="radio" name="compliance" value="N/A"> N/A</div>
                                                    </div>
                                                </div>
                                                <div class="form-group  col-md-6" >
                                                    <label class="col-md-4 col-xs-5 control-label">Contact Email</label>
                                                    <div class="col-md-8 col-xs-7">
                                                        <div class='input-group'>
                                                            <input class="form-control" type="supplier_email" name="email" >
                                                            <span class="input-group-addon">
                                                                    <span class="fa fa-envelope"></span>
                                                                </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group  col-md-6" >
                                                    <label class="col-md-4 col-xs-4 control-label">Contact Person</label>
                                                    <div class="col-md-8 col-xs-8">
                                                        <div class='input-group'>
                                                            <input type="text" class="form-control" name="supplier_name"  >
                                                            <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label class="col-md-4 col-xs-4 control-label">Supplier Datasheet</label>
                                                    <div class="col-md-8 col-xs-8">
                                                        <div class='input-group'>
                                                            <input type="file" name="datasheet" onchange="uploadFile(this)" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-md-4 col-xs-4 control-label">Supplier Quotation</label>
                                                    <div class="col-md-8 col-xs-8">
                                                        <div class='input-group'>
                                                            <input type="hidden" name="boq" value="{{request('id')}}">
                                                            <input type="file"  name="quotation" onchange="uploadFile(this)"  required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12 col-xs-5"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="panel panel-default" style="padding-bottom: 10px">
                                        <div class="panel-body ">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="col-md-4 col-xs-4 control-label">Quotation Ref </label>
                                                    <div class="col-md-8 col-xs-8">
                                                        <div class='input-group'>
                                                            <input type="text" class="form-control" name="quotation_ref" required>
                                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-md-4 col-xs-4 control-label">Payment Terms</label>
                                                    <div class="col-md-8 col-xs-8">
                                                        <div class='input-group'>
                                                            <input type="text" class="form-control" name="payment_terms" required>
                                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-md-4 col-xs-4 control-label">Supplier Code </label>
                                                    <div class="col-md-8 col-xs-8">
                                                        <div class='input-group'>
                                                            <input type="text" class="form-control" name="supplier_code" required>
                                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-md-4 col-xs-4 control-label">All Materials Included</label>
                                                    <div class="col-md-8 col-xs-8">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="0" name="allMaterial" style="margin-top: 10px" checked>
                                                            <label class="form-check-label" for="defaultCheck1">

                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group  col-md-12">
                                                    <label class="col-md-2 col-xs-2 control-label">Submital Requisted</label>
                                                    <div class="col-md-8 col-xs-8">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="submital_requisted" value="Softcopy" checked>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Soft Copy
                                                            </label>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input class="form-check-input" type="radio" name="submital_requisted" value="hardcopy">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Hard Copy
                                                            </label>

                                                            <label class="form-check-label" for="exampleRadios1" style="padding:0px 20px">
                                                                Copies Number
                                                            </label>
                                                            <input type="number" name="copies_number" value="0">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-12 col-xs-5">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-9">
                                    @foreach ($errors->all() as $error)
                                        <li class="alert alert-danger">{{ $error }}</li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="panel-footer">
                            <input style="margin-left:10px;padding: 10px;width: 100px" type="submit" value="Add" class="btn btn-success pull-right" />
                            <a href="{{asset('boq/showsubboq/'.request('id'))}}" style=" padding: 10px;width: 100px" class="btn btn-danger pull-right" >Cancel</a>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                        </div>

                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/BOQ/main.js') }}"></script>
@endsection
