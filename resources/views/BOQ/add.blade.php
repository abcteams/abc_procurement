@extends('layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li><a href="{{asset('home')}}">Home</a></li>
        <li><a href="{{asset('workzone/show')}}">Work Zone</a></li>
        <li><a href="{{asset('workzone/showsub/'.$sub_zone->work_zone_id)}}">Sub Work Zone</a></li>
        <li><a href="{{ URL::previous() }}">BOQ</a></li>
        <li class="active">Add BOQ</li>
    </ul>
    <div class="page-title">
        <h2>{{$sub_zone->title}} </h2><h4 style="padding-top:10px">&nbsp -> Add BOQ</h4>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <form class="form-horizontal" method="POST" action="{{ url('boq/addboq') }}">
                             {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{isset($theRecord[0])?$theRecord[0]->id:'0'}}" >
                            <input type="hidden" name="sub_work_zone_id" value="{{$sub_zone->id}}" >
                            <input type="hidden" name="work_zone_id" value="{{$sub_zone->work_zone_id}}" >
                            <div class="panel-heading">
                                <h3 class="panel-title">Add</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">GML</label>
                                            <div class="col-md-10">
                                                <div class="input-group" {{ $errors->default->has('title') ?  $errors->default->first('title') : '' }} style="width: 100%">
                                                    <select class="select2 form-control" onchange="getSubGml(this)" name="state">
                                                        <option value="0">Choose GML</option>
                                                        @foreach($gml as $k =>$val)
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
                                            <label for="name" class="col-md-2 control-label">Sub Gml</label>
                                            <div class="col-md-10">
                                                <div class="input-group" {{ $errors->default->has('sub_gml') ?  $errors->default->first('sub_gml') : '' }} style="width: 100%">
                                                    <select class="select2 form-control" name="sub_gml" id="subGml">
                                                        <option value="0">Choose Sub GML</option>
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
                                <a href="{{ URL::previous() }}" style="width:70px" class="btn btn-danger pull-right" >Cancel</a>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT -->
    </div>

    <script src="{{ asset('js/BOQ/main.js') }}"></script>
@endsection
