@extends('layouts.master')
@section('content')

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Pending Inquiry</li>
</ul>

<div class="page-title">
    <h2>Pending Inquiry</h2>
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
                                        <th>Material</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Close Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $k => $val)
                                            <tr>
                                                <td>{{$val->scl}}</td>
                                                <td>{{$val->description}}</td>
                                                <td>{{$val->date}}</td>
                                                <td>{{$val->close_date}}</td>
                                                <td style="width: 200px">
                                                    <a href="{{asset('subcontractor/proposal/'.$val->id)}}" class="btn btn-success" style="width: 150px">Accept</a><br />
                                                    <a href="{{asset('subcontractor/decline/'.$val->id)}}" class="btn btn-info"  style="width: 150px">Decline</a>
                                                </td>
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
