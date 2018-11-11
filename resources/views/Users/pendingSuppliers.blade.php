@extends('layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Pending Suppliers</li>
    </ul>
    <div class="page-title">
        <h2>Pending Suppliers</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">List</h3>
                            </div>
                            <div class="panel-body panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-actions">
                                        <thead>
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
                                            @if($auth->can_approve || $auth->can_approve2)
                                                <th class="listHeader">
                                                    Action
                                                </th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $k => $val)
                                            <tr  class="subMatItems">
                                                <td title="Sub Items" onclick="supplierInfo('{{$val->id}}')">
                                                    <strong>
                                                        {{$val->name}}
                                                    </strong>
                                                </td>
                                                <td  onclick="supplierInfo('{{$val->id}}')">
                                                    {{$val->email}}
                                                </td>
                                                <td onclick="supplierInfo('{{$val->id}}')">
                                                    {{$val->company_name}}
                                                </td>
                                                <td onclick="supplierInfo('{{$val->id}}')">
                                                    {{$val->nicename}}
                                                </td>
                                                <td onclick="supplierInfo('{{$val->id}}')">
                                                    {{$val->address}}
                                                </td>
                                                @if($val->is_approved == 0)
                                                    @if($auth->can_approve)
                                                        <td>
                                                            <a href="{{asset('users/approveSupplier/'.$val->id)}}" class="btn btn-success">Procurement Approval</a>
                                                            <button onclick="reject_User('{{$val->id}}');" class="btn btn-danger">Reject</button>
                                                        </td>
                                                    @else
                                                        <td>Wait for Procurement approve</td>
                                                    @endif
                                                @elseif($val->is_approved2 == 0)
                                                    @if($auth->can_approve2)
                                                        <td>
                                                            <a href="{{asset('users/approve2Supplier/'.$val->id)}}" class="btn btn-success">Commercial Approval</a>
                                                            <button onclick="reject_User('{{$val->id}}');" class="btn btn-danger">Reject</button>
                                                        </td>
                                                    @else
                                                        <td>Wait for Commercial approve</td>
                                                    @endif
                                                @endif
                                            </tr>
                                        @endforeach
                                        @if(count($data)=="")
                                            <tr class="text-center">
                                                <td colspan="6" style="color: dimgray;">No Pending Suppliers !</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
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
