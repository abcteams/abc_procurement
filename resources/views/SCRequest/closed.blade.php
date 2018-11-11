@extends('layouts.master')
@section('content')

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Closed Request </li>
</ul>

<div class="page-title">
    <h2>Closed Subcontractor Request</h2>
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
                                        <th>Proposals</th>
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
                                                <td width="170px">
                                                    <a  href="{{asset('subcontractorrequest/showAccepted/'.$val->id)}}" class="btn btn-success" style="width: 130px">Show Accepted</a>
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
