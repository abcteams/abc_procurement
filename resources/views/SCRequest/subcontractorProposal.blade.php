@extends('layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Pending Request</li>
        <li class="active">Subcontractor Proposal</li>
    </ul>

    <div class="page-title">
        <h2>Subcontractor Proposal</h2>
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
                                            <th>SubContractor Price</th>
                                            <th>Consider</th>
                                            <th>Details</th>
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
                                                    @if($val['consider'])
                                                        <span>Considered</span>
                                                    @else
                                                        <a style="width: 100px" href="{{asset('subcontractorrequest/considerItem/'.$val['id'])}}" class="btn btn-success">Consider</a>
                                                    @endif

                                                </td>
                                                <td>
                                                    <a style="width: 100px" href="{{asset('subcontractorrequest/proposalDetails/'.$val['id'])}}" class="btn btn-primary ">Details</a>
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
