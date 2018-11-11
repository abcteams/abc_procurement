@extends('layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li><a href="{{asset('home')}}">Home</a></li>
        <li ><a href="{{asset('scl/show')}}">Subcontractor Category</a></li>
        <li class="active">Pending SCL </li>
    </ul>

    <div class="page-title">
        <h2>Pending</h2>
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
                                            <th>Added at</th>
                                            <th width="300">Items Name</th>
                                            <th>Description</th>
                                            <th width="300">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $k => $val)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($val->created_at,'Asia/Dubai')->diffForHumans() }}</td>
                                                <td>{{$val->title}}</td>
                                                <td>{{$val->description}}</td>
                                                @if($val->is_approved == 0)
                                                    @if($auth->can_approve == 1)
                                                        <td>
                                                            <a href="{{asset('scl/approveSclPending/'.$val->id)}}" class="btn btn-success">Procurement Approve</a>
                                                            <button class="btn btn-danger" id="deleteUser" onclick="delete_row('{{$val->id}}');">Reject</button>
                                                        </td>
                                                    @else
                                                        <td>Wait For Procurement Approval</td>
                                                    @endif
                                                @elseif($val->is_approved2 == 0)
                                                    @if($auth->can_approve2 == 1)
                                                        <td>
                                                            <a href="{{asset('scl/approve2SclPending/'.$val->id)}}" class="btn btn-success">Technical Approve</a>
                                                            <button class="btn btn-danger" id="deleteUser" onclick="delete_row('{{$val->id}}');">Reject</button>
                                                        </td>
                                                    @else
                                                        <td>Wait For Technical Approval</td>
                                                    @endif

                                                @elseif($val->is_approved3 == 0)
                                                    @if($auth->can_approve3 == 1)
                                                        <td>
                                                            <a href="{{asset('scl/approve3SclPending/'.$val->id)}}" class="btn btn-success">Project Manger Approve</a>
                                                            <button class="btn btn-danger" id="deleteUser" onclick="delete_row('{{$val->id}}');">Reject</button>
                                                        </td>
                                                    @else
                                                        <td>Wait For Project Manger Approval</td>
                                                    @endif
                                                @endif
                                            </tr>
                                        @endforeach
                                        @if(count($data)=="")
                                            <tr class="text-center">
                                                <td colspan="4" style="color: dimgray;">No Pending Requests Found !</td>
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
    <script src="{{ asset('js/Scl/main.js') }}"></script>
@endsection
