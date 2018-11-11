@extends('layouts.master')
@section('content')

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Subcontractor Proposal</li>
</ul>

<div class="page-title">
    <h2>Subcontractor Proposal</h2>
</div>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
                <div class="panel panel-default">
                    <form class="form-horizontal" method="POST" action="{{ url('subcontractor/addProposal') }}">
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
                                                <th>Category</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Description ( Optional ) </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $k => $val)
                                                <tr>
                                                    <input type="hidden" value="{{$val->main_id}}" name="subcontractor_request[]">
                                                    <input type="hidden" value="{{$val->scr_id}}" name="scr[]">
                                                    <input type="hidden" value="{{$val->id}}" name="id[]">
                                                    <td>{{$val->title}}</td>
                                                    <td>{{$val->quantity}}</td>
                                                    <td><input type="number" name="price[]" step="0.01" value="0.00"> </td>
                                                    <td><input type="text" name="description[]" style="width: 100%"> </td>
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
                            <a href="{{asset('subcontractor/pendinginquiry')}}" style="width:70px" class="btn btn-danger pull-right" >Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>
@endsection
