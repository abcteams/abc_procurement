@extends('layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">My Orders </li>
    </ul>
    <div class="page-title">
        <h2>My Orders</h2>
    </div>
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                @foreach($data as $k => $val)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <div class="pull-left">
                                                        <table>
                                                            <tr>
                                                                <td width="100px">Order Date</td>
                                                                <td>{{$val->order_date}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Delivery Date</td>
                                                                <td>{{$val->delivery_date}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Complete Date</td>
                                                                <td>{{$val->complete_date}}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="pull-right"><table>
                                                            <tr>
                                                                <td width="120px">Order Number</td>
                                                                <td>{{$val->order_number}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Job No</td>
                                                                <td>{{$val->job_no}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Site in Charge</td>
                                                                <td></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <h3>LPO Status</h3>
                                                    <div class="wizard">
                                                        <ul class="steps_4 anchor">
                                                            <li>
                                                                <a href="#step-1" class="{{$val->manager_approved == 1 ? 'done ':'disabled '}}{{$val->manager_approved == 2 ? 'error':'disabled'}}" isdone="1" rel="1">
                                                                    <span class="stepNumber">1</span>
                                                                    <span class="stepDesc">Step 1<br><small>Project Manager</small></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#step-2" class="{{$val->proc_approved == 1 ? 'done ':'disabled '}}{{$val->proc_approved == 2 ? 'error':'disabled'}}" isdone="1" rel="1">
                                                                    <span class="stepNumber">2</span>
                                                                    <span class="stepDesc">Step 2<br><small>Procurement</small></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#step-3" class="{{$val->com_approved == 1 ? 'done ':'disabled '}}{{$val->com_approved == 2 ? 'error':'disabled'}}" isdone="1" rel="1">
                                                                    <span class="stepNumber">3</span>
                                                                    <span class="stepDesc">Step 3<br><small>Commercial</small></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#step-4" class="{{$val->fin_approved == 1 ? 'done ':'disabled '}}{{$val->fin_approved == 2 ? 'error':'disabled'}}"  isdone="1" rel="1">
                                                                    <span class="stepNumber">4</span>
                                                                    <span class="stepDesc">Step 4<br><small>Finance Manager</small></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#step-5" class="{{$val->supplier_approved == 1 ? 'done ':'disabled '}}{{$val->supplier_approved == 2 ? 'error':'disabled'}}" isdone="1" rel="1">
                                                                    <span class="stepNumber">5</span>
                                                                    <span class="stepDesc">Step 5<br><small>Supplier</small></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#step-6" class="{{$val->is_awaiting == 1 ? 'done ':'disabled '}}{{$val->is_awaiting == 2 ? 'error':'disabled'}}" isdone="1" rel="1">
                                                                    <span class="stepNumber">6</span>
                                                                    <span class="stepDesc">Step 6<br><small>Awaiting</small></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#step-7" class="{{$val->is_delivered == 1 ? 'done ':'disabled '}}{{$val->is_delivered == 2 ? 'error':'disabled'}}" isdone="0" rel="0">
                                                                    <span class="stepNumber">7</span>
                                                                    <span class="stepDesc">Step 7<br><small>Delivered</small></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="panel-footer">
                                                    <a href="{{asset('materialrequisition/orderDetails/'.$val->id)}}" class="btn btn-info pull-right" style="padding: 10px 25px">Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
