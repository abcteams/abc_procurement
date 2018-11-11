@extends('layouts.master')

@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Subcontractors </li>
    </ul>
    <div class="page-title">
        <h2>Subcontractors</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            @if($auth->can_approve)
                                <a href="{{asset('users/addsubcontractor')}}">
                                    <button class="btn btn-primary btn-condensed">
                                        <span class="fa fa-plus"></span>
                                        Add New Subcontractor
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
                                            <form method="GET" action="{{asset('users/showSubcontractor')}}" class="input-group" style="height:35px;">
                                                <div class="input-group-btn"  style="width:11%">
                                                    <select class="btn btn-default dropdown-toggle searchselect selectpicker" name="type" >
                                                        <option value="all" >All</option>
                                                        <option value="name" {{request('type') == 'name' ? 'selected': ''}}>Name</option>
                                                        <option value="email"  {{request('type') == 'email' ? 'selected': ''}}>Email</option>
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
                                            <h3 class="panel-title">Suppliers List</h3>
                                        </div>
                                        <div class="panel-body panel-body-table">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-actions" id="gmlList" style="border:10px solid whitesmoke">
                                                    <tr>
                                                        <th class="listHeader">
                                                            Name
                                                        </th>
                                                        <th class="listHeader">
                                                            Email
                                                        </th>
                                                        <th class="listHeader">
                                                            Company Name
                                                        </th>
                                                        <th class="listHeader">
                                                            Country
                                                        </th>
                                                        <th class="listHeader">
                                                            Address
                                                        </th>
                                                    </tr>
                                                    @foreach($data as $k => $val)
                                                        <tr class="subMatItems">
                                                            <td title="Sub Items" onclick="subcontractorInfo('{{$val->id}}')">
                                                                <strong>
                                                                    {{$val->name}}
                                                                </strong>
                                                            </td>
                                                            <td onclick="subcontractorInfo('{{$val->id}}')">
                                                                {{$val->email}}
                                                            </td>
                                                            <td onclick="subcontractorInfo('{{$val->id}}')">
                                                                {{$val->company_name}}
                                                            </td>
                                                            <td onclick="subcontractorInfo('{{$val->id}}')">
                                                                {{$val->nicename}}
                                                            </td>
                                                            <td onclick="subcontractorInfo('{{$val->id}}')">
                                                                {{$val->address}}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    @if(count($data)=="")
                                                        <tr class="text-center">
                                                            <td colspan="5" style="color: dimgray;">Sorry, No Subcontractors Found !</td>
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
    <script src="{{ asset('js/User/main.js') }}"></script>
@endsection
