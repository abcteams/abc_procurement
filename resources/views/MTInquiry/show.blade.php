@extends('layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Inquiry Under Pricing</li>
    </ul>

    <div class="page-title">
        <h2>Inquiry Under Pricing</h2>
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
                                            <th width="150">Work Zone</th>
                                            <th width="150">Gml</th>
                                            <th width="150">Sub Gml</th>
                                            <th>Date</th>
                                            <th>Close Date</th>
                                            <th>Description</th>
                                            <th width="100">Details</th>
                                            <th>Proposals</th>
                                            <!--  <th>Considered</th> -->
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
                                                <td width="170px">
                                                    <a  href="{{asset('materialinquiry/suplierProposal/'.$val->id)}}" class="btn btn-success" style="width: 130px">Proposals</a>
                                                    <a  href="{{asset('materialinquiry/decline/'.$val->id)}}" class="btn btn-danger" style="width: 130px">Decline</a>
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
