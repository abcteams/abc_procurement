@extends('layouts.master')
@section('content')

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Decline</li>
</ul>

<div class="page-title">
    <h2>Decline</h2>
</div>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
                <div class="panel panel-default">
                    <form class="form-horizontal" method="POST" action="{{ url('supplier/addDecline') }}">
                        {{ csrf_field() }}
                        <div class="panel-heading">
                            <h3 class="panel-title">Decline</h3>
                        </div>
                        <div class="panel-body">
                            <br>
                            <div class="row">
                                <div class="col-md-1">
                                    <input type="hidden" value="{{$id}}" name="id">
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="name" class="col-md-2 control-label">Decline Reason</label>
                                        <div class="col-md-10">
                                            <div class="input-group" style="width: 100%">
                                                <textarea class="form-control" rows="4"  name="decline" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <br>
                            <br>
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
