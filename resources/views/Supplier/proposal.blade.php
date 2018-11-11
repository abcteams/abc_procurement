@extends('layouts.master')
@section('content')

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Supplier Proposal</li>
</ul>

<div class="page-title">
    <h2>Supplier Proposal</h2>
</div>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
                <div class="panel panel-default">
                    <form class="form-horizontal" method="POST" action="{{ url('supplier/addProposal') }}">
                        {{ csrf_field() }}
                        <div class="panel-heading">
                            <h3 class="panel-title">Proposal</h3>
                        </div>
                        <div class="panel-body">
                            <br>
                            <div class="row">
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="name" class="col-md-2 control-label">Proposal</label>
                                        <div class="col-md-10">
                                            <div class="input-group" style="width: 100%">
                                               <input type="text" class="form-control" name="proposal" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <br>
                            <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                            <tr>
                                                <th>Material</th>
                                                <th>Quantity</th>
                                                <th>Size</th>
                                                <th>Description</th>
                                                <th width="130px">Material Specs</th>
                                                <th width="130px">Your Price (ADE)</th>
                                                <th width="130px">Model Number</th>
                                                <th>Your Notes ( Optional ) </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $k => $val)
                                                <tr>
                                                    <input type="hidden" value="{{$val->main_id}}" name="material_inquiry[]">
                                                    <input type="hidden" value="{{$val->boq_id}}" name="boq[]">
                                                    <input type="hidden" value="{{$val->id}}" name="id[]">
                                                    <td>{{$val->title}}</td>
                                                    <td>{{$val->quantity.' '.$val->quantity_unit}}</td>
                                                    <td>{{$val->size.' '.$val->size_unit}}</td>
                                                    <td>{{$val->description}}</td>
                                                    <td>
                                                        @if(file_exists('attachments/material_specs/'.$val->id))
                                                            @php($files = File::allFiles('attachments/material_specs/'.$val->id))
                                                            @foreach($files as $file=>$f)
                                                                <a href="{{asset($f->getPathname())}}">View Specs</a><br>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td><input type="number" class="form-control" name="price[]" step="0.01" value="0.00"> </td>
                                                    <td><input type="text" class="form-control" name="model_number[]"> </td>
                                                    <td><input type="text" class="form-control" name="description[]" style="width: 100%"> </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-10">
                                            <div class="errorMasseges" style="padding:10px 0px">
                                                @foreach ($errors->all() as $error)
                                                    <li class="alert alert-danger">{{ $error }}</li>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        <div class="panel-footer">
                            <input style="margin-left:10px;width:70px" type="submit" value="{{isset($theRecord[0])?'update':'add'}}" class="btn btn-primary pull-right" />
                            <a href="{{asset('supplier/pendinginquiry')}}" style="width:70px" class="btn btn-danger pull-right" >Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>
@endsection
