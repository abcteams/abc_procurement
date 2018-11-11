@extends('layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Pending Request</li>
        <li class="active">Consider</li>
    </ul>

    <div class="page-title">
        <h2>Consider</h2>
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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Proposal</th>
                                            <th>Our Price</th>
                                            <th>Subcontractor Price</th>
                                            <th>Details</th>
                                            <th>Approve</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $k => $val)
                                            <tr>
                                                <td>{{$val['name']}}</td>
                                                <td>{{$val['email']}}</td>
                                                <td>{{$val['proposal']}}</td>
                                                <td style="color: white;background: #756d6d">{{$val['ourPrice']}}</td>
                                                <td style="color: white;background: #843939">{{$val['subcontractorPrice']}}</td>
                                                <td>
                                                    <a style="width: 100px" href="{{asset('subcontractorrequest/proposalDetails/'.$val['id'])}}" class="btn btn-primary ">Details</a>
                                                </td>
                                                <td>
                                                    <a style="width: 100px" href="{{asset('subcontractorrequest/approveProposal/'.$val['id'])}}" class="btn btn-success ">Approve</a>
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
