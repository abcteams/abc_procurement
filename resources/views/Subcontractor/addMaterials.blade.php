@extends('layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Supplier </li>
        <li>Materials </li>
        <li class="active">Add Material</li>
    </ul>
    <div class="page-title">
        <h2>Add Sub Materials</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <form class="form-horizontal" method="POST" action="{{ url('subcontractor/addmaterialrec') }}">
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
                                            <div class="col-md-11">
                                                <div class="input-group" {{ $errors->default->has('title') ?  $errors->default->first('title') : '' }} style="width: 100%">
                                                    <input type="hidden" value="{{isset($id)?$id:'0'}}" id="user_id">
                                                    <select class="select2 form-control" onchange="showSubScl(this)" name="state">
                                                        <option value="0">Choose SCL</option>
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
                                            <div class="col-md-11">
                                                <table class="table table-bordered table-striped table-actions" id="material_table">
                                                    <thead>
                                                    <th>Sub Material</th>
                                                    <th>
                                                        Description
                                                    </th>
                                                    <th width="100px">Action</th>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="3">No Items</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
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
