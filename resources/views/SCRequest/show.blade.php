@extends('layouts.master')
@section('content')

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Subcontractor Request</li>
</ul>

<div class="page-title">
    <h2>Subcontractor Request</h2>
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
                                        <th>Considered</th>
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
                                                    <a  href="{{asset('subcontractorrequest/subcontractorProposal/'.$val->id)}}" class="btn btn-success" style="width: 130px">Proposals</a>
                                                    <a  href="{{asset('subcontractorrequest/decline/'.$val->id)}}" class="btn btn-danger" style="width: 130px">Decline</a>
                                                </td>
                                                <td><a  href="{{asset('subcontractorrequest/consideredItems/'.$val->id)}}" class="btn btn-info"  style="width: 130px;padding:20px">Considered</a></td>
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
