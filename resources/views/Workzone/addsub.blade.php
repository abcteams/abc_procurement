@extends('layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li><a href="{{asset('home')}}">Home</a></li>
        <li><a href="{{asset('workzone/show')}}">Work Zone</a> </li>
        <li><a href="{{ URL::previous() }}">Sub Work Zone</a></li>
        <li class="active">Add Sub Work Zone</li>
    </ul>
    <div class="page-title">
        <h2>{{$workzone[0]->title}} </h2><h4 style="padding-top:10px">&nbsp -> Add Sub </h4>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <form class="form-horizontal" method="POST" action="{{ url('workzone/addsubworkzone') }}"  enctype="multipart/form-data">
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
                                            <label for="name" class="col-md-2 control-label">Title</label>
                                            <div class="col-md-10">
                                                <div class="input-group" {{ $errors->default->has('title') ?  $errors->default->first('title') : '' }} style="width: 100%">
                                                    <input id="title" type="text" value="{{isset($theRecord[0])?$theRecord[0]->title:''}}" class="form-control" name="title" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                @if(isset($theRecord[0]))
                                    @if(file_exists('boundary/'.$theRecord[0]->id))
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label for="old_boundary" class="col-md-2 control-label" style="line-height: 15px;">Currently Boundary</label>
                                                    <div class="col-md-10">
                                                        <div class="input-group" style="width: 100%">

                                                            @php($files = File::allFiles('boundary/'.$theRecord[0]->id))
                                                            @foreach($files as $file=>$f)
                                                                <a href="{{asset($f->getPathname())}}">View Boundary</a>
                                                                .....................................
                                                                <a href="#" onclick='removeBoundary("{{$theRecord[0]->id}}","{{$f->getFilename()}}")' class="glyphicon glyphicon-remove" style="color:#b13f3f;cursor: pointer;"></a><br>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                    @endif
                                @endif

                                <br>
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Add Boundary</label>
                                            <div class="col-md-10">
                                                <div class="input-group" style="width: 100%">
                                                    <input type="file" name="boundary" onchange="uploadBoundary(this)"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br><br>
                            <div class="panel-footer">
                                <input type="hidden" value="{{$workzone[0]->id}}" name="workzoneId" >
                                <input style="margin-left:10px;width:70px" type="submit" value="{{isset($theRecord[0])?'update':'add'}}" class="btn btn-primary pull-right" />
                                <a href="{{asset('workzone/showsub/'.$workzone[0]->id)}}" style="width:70px" class="btn btn-danger pull-right">Cancel</a>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/workzone/main.js') }}"></script>
@endsection
