@extends('layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Accepted </li>
        <li class="active">Create Agreement</li>
    </ul>
    <div class="page-title">
        <h2>Create Agreement</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <form class="form-horizontal" method="POST" action="{{ url('subcontractorrequest/addAgreement') }}">
                             {{ csrf_field() }}
                            <input type="hidden" value="{{$id}}" name="proposal_id">
                            <div class="panel-heading">
                                <h3 class="panel-title">Add</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">Final Price</label>
                                            <div class="col-md-9">
                                                <div class="input-group" {{ $errors->default->has('final_price') ?  $errors->default->first('final_price') : '' }} style="width: 100%">
                                                    <input id="final_price" type="number" step="0.01" value="0.00" class="form-control" name="final_price" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">Payment Terms</label>
                                            <div class="col-md-9">
                                                <div class="input-group" {{ $errors->default->has('payment_terms') ?  $errors->default->first('payment_terms') : '' }} style="width: 100%">
                                                    <input id="payment_terms" type="text"  class="form-control" name="payment_terms" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">Delivery Agreement</label>
                                            <div class="col-md-9">
                                                <div class="input-group" {{ $errors->default->has('delivery_agreement') ?  $errors->default->first('delivery_agreement') : '' }} style="width: 100%">
                                                    <input id="delivery_agreement" type="text" value="{{isset($theRecord[0])?$theRecord[0]->title:''}}" class="form-control" name="delivery_agreement" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label"></label>
                                            <div class="col-md-9" style="padding-top:20px;">
                                                @foreach ($errors->all() as $error)
                                                    <li class="alert alert-danger">{{ $error }}</li>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br>
                            <div class="panel-footer">
                                <input style="margin-left:10px;width:70px" type="submit" value="Add" class="btn btn-primary pull-right" />
                                <a href="{{asset('subcontractorrequest/showAccepted/'.$id)}}" style="width:70px" class="btn btn-danger pull-right" >Cancel</a>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT -->
    </div>
@endsection
