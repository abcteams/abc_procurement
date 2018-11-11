@extends('layouts.master')
@section('content')

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">
        My Material Proposals
    </li>
</ul>
<div class="page-title">
    <h2>
        My Material Proposals
    </h2>
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
                                        <th>Company</th>
                                        <th>My Proposal</th>
                                        <th>Close Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $k => $val)
                                            <tr class="subMatItems"  onclick="myProposalDetails('{{$val->boq_id}}')">
                                                <td>{{$val->title}}</td>
                                                <td>{{$val->description}}</td>
                                                <td>ABC</td>
                                                <td>{{$val->proposal}}</td>
                                                <td>{{$val->close_date}}</td>
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

<script src="{{ asset('js/Supplier/main.js') }}"></script>
@endsection
