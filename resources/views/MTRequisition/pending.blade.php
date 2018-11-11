@extends('layouts.master')
@section('content')

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="#">Requisition </li>
    <li class="active">Pending </li>
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
                                        <th>Work Zone</th>
                                        <th>Material</th>
                                        <th>Order Date</th>
                                        <th>Delivery date</th>
                                        <th>Complete date</th>
                                        <th width="120">Details</th>
                                        <th width="120">Approve</th>
                                        <th width="120">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $k => $val)
                                            <tr>
                                                <td>{{$val->workzone}}</td>
                                                <td>{{$val->gml}}</td>
                                                <td>{{$val->order_date}}</td>
                                                <td>{{$val->delivery_date}}</td>
                                                <td>{{$val->complete_date}}</td>
                                                <td><a href="{{asset('materialrequisition/requisitionDetails/'.$val->id)}}" class="btn btn-info">Details</a></td>
                                                <td><a href="{{asset('materialrequisition/requisitionMoreInfo/'.$val->id)}}" class="btn btn-success">Approve</a></td>
                                                <td><button class="btn btn-danger btn-rounded btn-condensed btn-sm" onclick="delete_record('{{$val->id}}')"  title="delete"><span class="fa fa-times"></span></button></td>
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
<script src="{{ asset('js/MTInquiry/main.js') }}"></script>
@endsection
