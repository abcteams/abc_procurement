@extends('layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Materials Requisition</li>
        <li class="active">Pending Maerials</li>
    </ul>

    <div class="page-title">
        <h2>Pending Materials</h2>
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
                                            <th>Work Zone</th>
                                            <th>Material</th>
                                            <th>Site in Charge</th>
                                            <th>Order date</th>
                                            <th>Delivery date</th>
                                            <th>Complete date</th>
                                            <th width="120">Details</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $k => $val)
                                            <tr>
                                                <td>{{$val->workzone}}</td>
                                                <td>{{$val->gml}}</td>
                                                <td>{{$val->user_name}}</td>
                                                <td>{{$val->order_date}}</td>
                                                <td>{{$val->delivery_date}}</td>
                                                <td>{{$val->complete_date}}</td>
                                                <td><a href="{{asset('materialrequisition/financeDetails/'.$val->req_id)}}" class="btn btn-info">Details</a></td>
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
