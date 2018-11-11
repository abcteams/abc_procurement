@extends('layouts.master')
@section('content')

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">pending Agreement</li>
</ul>

<div class="page-title">
    <h2>pending Agreement</h2>
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
                                        <th>Company</th>
                                        <th>Approve Date</th>
                                        <th>Final Price</th>
                                        <th>Payment Terms</th>
                                        <th>Delivery Agreement</th>
                                        <th>Approve</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $k => $val)
                                            <tr>
                                                <td>{{$val->title}}</td>
                                                <td>ABC</td>
                                                <td>{{$val->approve_date}}</td>
                                                <td style="background: #5d8da0;color: white">{{$val->final_price}}</td>
                                                <td>{{$val->payment_terms}}</td>
                                                <td>{{$val->delivery_agreement}}</td>
                                                <td style="width: 200px">
                                                    <a href="{{asset('supplier/accepetAgreement/'.$val->id)}}" class="btn btn-success" style="width: 150px">Accept</a><br />
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

<script src="{{ asset('js/Supplier/main.js') }}"></script>
@endsection
