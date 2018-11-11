@extends('layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li><a href="{{asset('home')}}">Home</a></li>
        <li ><a href="{{asset('workzone/show')}}">Work Zone</a></li>
        <li class="active">Add Work Zone</li>
    </ul>
    <div class="page-title">
        <h2>Add Work Zone </h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <form class="form-horizontal" method="POST" action="{{ url('workzone/addWorkzone') }}">
                             {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{isset($theRecord[0])?$theRecord[0]->id:'0'}}" >
                            <div class="panel-heading">
                                <h3 class="panel-title">Add</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Name</label>
                                            <div class="col-md-10">
                                                <div class="input-group"  style="width: 100%">
                                                    <input id="title" type="text" value="{{isset($theRecord[0])?$theRecord[0]->title:''}}" class="form-control" name="title" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Location</label>
                                            <div class="col-md-10">
                                                <div class="input-group"  style="width: 100%">
                                                    <textarea class="form-control" name="location" required>
                                                        {{isset($theRecord[0])?$theRecord[0]->location:''}}
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br>
                            <div class="panel-footer">

                                <input style="margin-left:10px;width:70px" type="submit" value="{{isset($theRecord[0])?'update':'add'}}" class="btn btn-primary pull-right" />
                                <a href="{{asset('workzone/show')}}" style="width:70px" class="btn btn-danger pull-right" >Cancel</a>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT -->
    </div>

    <script src="{{ asset('js/Gml/main.js') }}"></script>
@endsection
