@extends('layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Materials Requisition</li>
        <li class="active">Delivered </li>
    </ul>

    <div class="page-title">
        <h2>Delivered</h2>
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
                                            <th width="300">Work Zone</th>
                                            <th>Material</th>
                                            <th>delivery date</th>
                                            <th>complete date</th>
                                            <th width="120">Details</th>
                                            <th width="120">Approve</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $k => $val)
                                            <tr>
                                                <td>{{$val->workzone}}</td>
                                                <td>{{$val->gml}}</td>
                                                <td>{{$val->delivery_date}}</td>
                                                <td>{{$val->complete_date}}</td>
                                                <td><a href="{{asset('materialrequisition/deliveredDetails/'.$val->req_id)}}" class="btn btn-info">Details</a></td>
                                                <td><a href="{{asset('materialrequisition/markaspaid/'.$val->req_id)}}" class="btn btn-success">Mark As Paid</a></td>
                                            </tr>
                                        @endforeach
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
