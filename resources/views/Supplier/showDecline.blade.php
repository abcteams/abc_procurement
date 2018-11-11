@extends('layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Supplier</a></li>
        <li class="active"> Decline </li>
    </ul>

    <div class="page-title">
        <h2>Decline</h2>
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
                                            <th>Supplier Name</th>
                                            <th>Email</th>
                                            <th>Decline Reason</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($data) && count($data) > 0)
                                            @foreach($data as $k => $val)
                                                <tr>
                                                    <td>{{$val->name}}</td>
                                                    <td>{{$val->email}}</td>
                                                    <td>{{$val->reason}}</td>
                                                    <td><a href="{{asset('supplier/declinereplay/'.$val->id)}}" class="btn btn-info">Reply</a></td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3"> No Decline</td>
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
@endsection
