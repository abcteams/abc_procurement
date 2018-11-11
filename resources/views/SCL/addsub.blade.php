@extends('layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li><a href="{{asset('home')}}">Home</a></li>
        <li ><a href="{{asset('scl/show')}}">Subcontractor Category</a></li>
        <li><a href="{{ URL::previous() }}"> Sub Subcontractor Category  </a></li>
        <li class="active">Add Sub Category</li>
    </ul>
    <div class="page-title">
        <h2>{{$main_data->title}} </h2><h4 style="padding-top:10px">&nbsp <i class="fa fa-arrow-right" style="font-size: 15px;"></i> Add Sub </h4>
    </div>

    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <form class="form-horizontal" method="POST" action="{{ url('scl/addsubscl') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{isset($theRecord[0])?$theRecord[0]->id:'0'}}" >
                            <div class="panel-heading">
                                <h3 class="panel-title">Add</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Title</label>
                                            <div class="col-md-10">
                                                <div class="input-group"  style="width: 100%">
                                                    <input id="title" type="text" value="{{isset($theRecord[0])?$theRecord[0]->title:old('title')}}" class="form-control" name="title" required>
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
                                            <label for="name" class="col-md-2 control-label">Description</label>
                                            <div class="col-md-10">
                                                <div class="input-group"  style="width: 100%">
                                                    <textarea class="form-control" id="description" name="description">{{isset($theRecord[0])?$theRecord[0]->description:old('description')}}</textarea>
                                                </div>
                                                <div class="errorMasseges" style="padding:10px 0px">
                                                    @foreach ($errors->all() as $error)
                                                        <li class="alert alert-danger">{{ $error }}</li>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <input type="hidden" value="{{$main_data->id}}" name="sclId" >
                                    <input style="margin-left:10px;width:70px" type="submit" value="{{isset($theRecord[0])?'update':'add'}}" class="btn btn-primary pull-right" />
                                    <a href="{{ URL::previous() }}" style="width:70px" class="btn btn-danger pull-right">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT -->
    </div>

    <script src="{{ asset('js/Scl/main.js') }}"></script>
@endsection
