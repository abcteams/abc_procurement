@extends('layouts.master')

@section('content')
    <ul class="breadcrumb">
        <li><a href="{{asset('home')}}">Home</a></li>
        <li ><a href="{{asset('workzone/show')}}">Work Zone</a></li>
        <li class="active">Sub Work Zone</li>
    </ul>
    <div class="page-title">
        <h2>{{$workzone[0]->title}}</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            @if($auth['wz'])
                            <a href="{{asset('workzone/addsub/'.$workzone[0]->id )}}" >
                            <button class="btn btn-primary btn-condensed">
                                <span class="fa fa-plus"></span>
                                Add Sub Zone
                            </button>
                            </a>
                            @endif
                                <a class="btn btn-danger pull-right" href="{{asset('materialinquiry/chooseSubContractorMaterialToInquiry/'.request()->id)}}" >Subcontractor Inquiries</a>
                                <a class="btn btn-success pull-right" href={{asset('materialinquiry/chooseMaterial/'.request()->id)}} style="margin-right: 10px">BOQ Inquiries</a>
                        </div>
                        <br />
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <br />
                                            <form method="GET" action="{{asset('workzone/showsub/'.$workzone[0]->id )}}" >
                                            <div class="input-group" style="height:35px">
                                                <div class="input-group-btn">
                                                    <select class="btn btn-default dropdown-toggle searchselect selectpicker">
                                                        <option value="all">All</option>
                                                        <option value="title">Item Name</option>
                                                    </select>
                                                </div><!-- /btn-group -->
                                                <input type="text" value="{{request('value')}}" class="form-control" style="height:35px;width: 85%" aria-label="..."  name="value">
                                                <button type="submit" class="input-group-addon" style="width:15%;line-height: 33px;cursor: pointer;">Search</button>
                                            </div>
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
                                            <h3 class="panel-title">Sub Work Zone List</h3>
                                        </div>
                                        <div class="panel-body panel-body-table">
                                            <td class="table-responsive">
                                                <table class="table table-bordered table-striped table-actions" id="subWZList" style="border:10px solid whitesmoke">
                                                    <tr>
                                                        <th class="listHeader" >
                                                            Sub Zone Name
                                                        </th>

                                                        <th class="listHeader" width="150px">
                                                            Boundary
                                                        </th>
                                                        @if($auth['sbr'])
                                                            <th class="listHeader" width="200px">
                                                                Subcontractor Category
                                                            </th>
                                                        @endif
                                                        @if($auth['BOQ'])
                                                            <th class="listHeader" width="150px">
                                                                BOQ Materials
                                                            </th>
                                                        @endif
                                                        @if($auth['wz'])
                                                        <th class="listHeader" width="120">Actions</th>
                                                        @endif

                                                    </tr>
                                                    @foreach($data as $k => $val)
                                                        <tr>
                                                            <td title="Sub Items" class="subMatItems" >
                                                                <strong>
                                                                    {{$val->title}}
                                                                </strong>
                                                            </td>
                                                            <td width="150px">
                                                                @if(file_exists('boundary/'.$val->id))
                                                                    @php($files = File::allFiles('boundary/'.$val->id))
                                                                    @foreach($files as $file=>$f)
                                                                        <a href="{{asset($f->getPathname())}}">View Boundary</a><br>
                                                                    @endforeach
                                                                @endif
                                                            </td>
                                                            @if($auth['BOQ'])
                                                                <td>
                                                                    <a class="btn btn-danger" href="{{asset('scr/show/'.$val->id)}}" >Subcontractor Category</a>
                                                                </td>
                                                            @endif
                                                            @if($auth['sbr'])
                                                                <td>
                                                                    <a class="btn btn-success" href="{{asset('boq/show/'.$val->id)}}" style="margin-right: 10px">BOQ Materials</a>
                                                                </td>
                                                            @endif
                                                            @if($auth['wz'])
                                                            <td>
                                                                <a href="{{asset('workzone/addsub/'.$workzone[0]->id.'/'.$val->id )}}" class="btn btn-default btn-rounded btn-condensed btn-sm" title="edit"><span class="fa fa-pencil"></span></a>
                                                                <button class="btn btn-danger btn-rounded btn-condensed btn-sm" onclick="delete_sub('{{$val->id}}');"  title="delete"><span class="fa fa-times"></span></button>
                                                            </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="pull-right"><?php echo $data->appends([ 'value'=>request('value')]) ?></div>
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
    <script src="{{ asset('js/workzone/main.js') }}"></script>
@endsection
