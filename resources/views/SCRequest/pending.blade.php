@extends('layouts.master')
@section('content')

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Subcontractor Request </li>
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
                                        <th width="150">Sub Work Zone</th>
                                        <th width="150">Sub SCL</th>
                                        <th>Date</th>
                                        <th>Close Date</th>
                                        <th>Description</th>
                                        <th width="120">Approve</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $k => $val)
                                            <tr>
                                                <td>{{$val->wztitle}}</td>
                                                <td>{{$val->scltitle}}</td>
                                                <td>{{$val->date}}</td>
                                                <td>{{$val->close_date}}</td>
                                                <td>{{$val->description}}</td>
                                                <td><a href="{{asset('subcontractorrequest/approve/'.$val->id)}}" class="btn btn-success">Approve</a></td>
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
