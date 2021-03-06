@extends('layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Subcontractor </li>
        <li>Category </li>
        <li class="active">Add Items From Category</li>
    </ul>
    <div class="page-title">
        <h2>Add Items From Category</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <form class="form-horizontal" method="POST" action="{{ url('subcontractor/addcategoryrec') }}">
                            {{ csrf_field() }}
                            <div class="panel-heading">
                                <h3 class="panel-title">Add</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">SCL</label>
                                            <div class="col-md-10">
                                                <div class="input-group" {{ $errors->default->has('title') ?  $errors->default->first('title') : '' }} style="width: 100%">
                                                    <select class="select2 form-control" onchange="getSubScl(this)" name="state">
                                                        <option value="0">Choose Category</option>
                                                        @foreach($scl as $k =>$val)
                                                            <option value="{{$val->id}}">{{$val->title}}</option>
                                                        @endforeach
                                                    </select>
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
                                            <label for="name" class="col-md-2 control-label">Sub SCL</label>
                                            <div class="col-md-10">
                                                <div class="input-group" {{ $errors->default->has('sub_Scl') ?  $errors->default->first('sub_scl') : '' }} style="width: 100%">
                                                    <select class="select2 form-control" name="sub_scl" id="subScl">
                                                        <option value="0">Choose Subcontractor Category</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
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
                                </div><br>
                                <div class="panel-footer">

                                    <input style="margin-left:10px;width:70px" type="submit" value="{{isset($theRecord[0])?'update':'add'}}" class="btn btn-primary pull-right" />
                                    <a href="{{asset('subcontractor/category')}}" style="width:70px" class="btn btn-danger pull-right" >Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT -->
    </div>

    <script src="{{ asset('js/Subcontractor/main.js') }}"></script>
@endsection
