@extends('layouts.master')

@section('content')
    <ul class="breadcrumb">
        <li><a href="{{asset('home')}}">Home</a></li>
        <li class="active">Subcontractor Category </li>
    </ul>
    <div class="page-title">
        <h2>Subcontractor Category</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            @if($auth->can_edit)
                                <a href="{{asset('scl/add')}}">
                                    <button class="btn btn-primary btn-condensed">
                                        <span class="fa fa-plus"></span>
                                        Add Items
                                    </button>
                                </a>
                            @endif
                        </div>
                        <br />
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <br />
                                            <form method="GET" action="{{asset('scl/show')}}" class="input-group" style="height:35px;">
                                                <div class="input-group-btn"  style="width:11%">
                                                    <select class="btn btn-default dropdown-toggle searchselect selectpicker" name="type" >
                                                        <option value="all" >All</option>
                                                        <option value="title" {{request('type') == 'title' ? 'selected': ''}}>Item Name</option>
                                                        <option value="desc"  {{request('type') == 'desc' ? 'selected': ''}}>Description</option>
                                                    </select>
                                                </div><!-- /btn-group -->
                                                <input type="text" value="{{request('value')}}" class="form-control" style="height:35px;width: 85%" aria-label="..."  name="value">
                                                <button type="submit" class="input-group-addon" style="width:15%;line-height: 33px;cursor: pointer;">Search</button>
                                            </form>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                            </div>
                            <br /><br />

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Subcontractor Category List</h3>
                                        </div>
                                        <div class="panel-body panel-body-table">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-actions" id="sclList" style="border:10px solid whitesmoke">
                                                    <tr>
                                                        <th class="listHeader" width="300">
                                                            Item Name
                                                        </th>
                                                        <th class="listHeader">
                                                            Description
                                                        </th>
                                                        @if($auth->can_edit)
                                                            <th class="listHeader" width="120">Actions</th>
                                                        @endif
                                                    </tr>
                                                    @foreach($data as $k => $val)
                                                        <tr class="subMatItems">
                                                            <td title="Sub Items" onclick="subMaterials('{{$val->id}}')">
                                                                <strong>
                                                                    {{$val->title}}
                                                                </strong>
                                                            </td>
                                                            <td onclick="subMaterials('{{$val->id}}')">
                                                                {{$val->description}}
                                                            </td>
                                                            @if($auth->can_edit)
                                                                <td>
                                                                    <a href="add/{{$val->id}}" class="btn btn-default btn-rounded btn-condensed btn-sm"  title="delete"><span class="fa fa-pencil"></span></a>
                                                                    <button class="btn btn-danger btn-rounded btn-condensed btn-sm" onclick="delete_row('{{$val->id}}')"  title="edit"><span class="fa fa-times"></span></button>
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                    @if(count($data)=="")
                                                        <tr class="text-center">
                                                            <td colspan="3" style="color: dimgray;">Sorry, No Subcontractor Category List Found !</td>
                                                        </tr>
                                                    @endif
                                                </table>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="pull-right"><?php echo $data->appends(['type'=>request('type') , 'value'=>request('value')]) ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/Scl/main.js') }}"></script>
@endsection
