@extends('layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Sub Subcontractor Request </li>
        <li class="active">Add Sub Request</li>
    </ul>
    <div class="page-title">
        <h2>Add Sub Subcontractor Request</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <form class="form-horizontal" method="POST" action="{{ url('scr/addscrsubcategory') }}">
                             {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{isset($theRecord[0])?$theRecord[0]->id:'0'}}" >
                            <input type="hidden" name="scr_id" value="{{$scr_id}}" >

                            <div class="panel-heading">
                                <h3 class="panel-title">Add</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Quantity</label>
                                            <div class="col-md-10">
                                                <div class="input-group" style="width: 100%">
                                                    <input id="quantity" type="number" value="{{isset($theRecord[0])?$theRecord[0]->quantity:old('quantity')}}" class="form-control" name="quantity" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Budgetory Price</label>
                                            <div class="col-md-10">
                                                <div class="input-group" style="width: 100%">
                                                    <input id="budgetory" type="number" step="0.01" value="{{isset($theRecord[0])?$theRecord[0]->budgetory_price:old('budgetory')}}" class="form-control" name="budgetory" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Description</label>
                                            <div class="col-md-10">
                                                <div class="input-group" style="width: 100%">
                                                    <input type="text" id="description" class="form-control" name="description"  value="{{isset($theRecord[0])?$theRecord[0]->description:old('description')}}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Scope of Work</label>
                                            <div class="col-md-10">
                                                <div class="input-group" style="width: 100%">
                                                    <textarea id="description" class="form-control" name="work_scope" >{{isset($theRecord[0])?$theRecord[0]->work_scope:old('work_scope')}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br />
                                @if(isset($theRecord[0]))
                                    @php
                                        $path  =  'clips';
                                        if(!is_dir($path)){
                                            $path   =   '../clips';
                                        }
                                    @endphp
                                    @if(file_exists($path.'/'.$theRecord[0]->id))
                                        <div class="row">
                                            <div class="col-md-2">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="old_material_specs" class="col-md-2 control-label" style="line-height: 15px;">Currently Specs File</label>
                                                    <div class="col-md-10">
                                                        <div class="input-group" style="width: 100%">
                                                            @php($files = File::allFiles($path.'/'.$theRecord[0]->id))
                                                            @foreach($files as $file=>$f)
                                                                <a href="{{asset($f->getPathname())}}">View Clip</a>
                                                                .....................................
                                                                <a href="#" onclick='removeClip("{{$theRecord[0]->id}}","{{$f->getFilename()}}")' class="glyphicon glyphicon-remove" style="color:#b13f3f;cursor: pointer;"></a><br>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                    @endif
                                @endif
                                <br/>
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="material_specs" class="col-md-2 control-label" style="line-height: 15px;">Clip (Optional)</label>
                                            <div class="col-md-10">
                                                <div class="input-group" style="width: 100%">
                                                    <input type="file" name="clip[]" multiple  />
                                                </div>
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
                                <br />
                                <div class="panel-footer">

                                <input style="margin-left:10px;width:70px" type="submit" value="{{isset($theRecord[0])?'update':'add'}}" class="btn btn-primary pull-right" />
                                <a href="{{asset('scr/showsubscr/'.$scr_id)}}" style="width:70px" class="btn btn-danger pull-right" >Cancel</a>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT -->
    </div>
    <script src="{{ asset('js/SCR/main.js') }}"></script>
@endsection
