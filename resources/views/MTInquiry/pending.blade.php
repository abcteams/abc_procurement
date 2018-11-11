@extends('layouts.master')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Materials </li>
        <li class="active">Pending </li>
    </ul>

    <div class="page-title">
        <h2>Pending</h2>
    </div>
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
                                            <th width="150">Gml</th>
                                            <th width="150">Sub Gml</th>
                                            <th width="150">Date</th>
                                            <th width="150">Close Date</th>
                                            <th>Description</th>
                                            <th width="120">Details</th>
                                            <th width="120">Approve</th>
                                            <th width="100">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $k => $val)
                                            <tr>
                                                <td>{{$val->wztitle}}</td>
                                                <td>{{$val->gml_title}}</td>
                                                <td>{{$val->sub_gml_title}}</td>
                                                <td>{{$val->date}}</td>
                                                <td>{{$val->close_date}}</td>
                                                <td>{{$val->description}}</td>
                                                <td><a href="{{asset('materialinquiry/showInquirydetails/'.$val->work_zone_id.'/'.$val->sub_gml_id.'/'.$val->id)}}" class="btn btn-info">Details</a></td>
                                                <td><a href="{{asset('materialinquiry/approve/'.$val->id)}}" class="btn btn-success">Send to Suppliers</a></td>
                                                <td><div class="btn btn-danger" onclick="removeinquiry('{{$val->work_zone_id}}','{{$val->sub_gml_id}}','{{$val->id}}')">Delete</div></td>
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
    <script src="{{ asset('js/BOQ/main.js') }}"></script>
@endsection
