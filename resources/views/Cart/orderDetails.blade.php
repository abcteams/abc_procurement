@extends('layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Order Details</li>
    </ul>
    <div class="page-title">
        <h2>Order Details</h2>
    </div>
    <div class="page-content-wrap">
        <div class="row">
            <form class="form-horizontal" id="orderForm">
                {{ csrf_field() }}
                <div class="col-md-12">
                    <div style="padding:10px">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <table>
                                        <tr>
                                            <td width="100px">Order Date</td>
                                            <td>{{$data['materials'][0]->order_date}}</td>
                                        </tr>
                                        <tr>
                                            <td>Delivery Date</td>
                                            <td>{{$data['materials'][0]->delivery_date}}</td>
                                        </tr>
                                        <tr>
                                            <td>Complete Date</td>
                                            <td>{{$data['materials'][0]->complete_date}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <input type="hidden" id="sub_boq_id" value="" >
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="panel-title">Materials</h3>
                                            <table class="table table-bordered table-striped table-actions" id="materials_order_table">
                                                <tr>
                                                    <th>Description</th>
                                                    <th>Size</th>
                                                    <th>Quantity</th>
                                                    <th>Model</th>
                                                    <th>Your Quantity</th>
                                                </tr>
                                                @foreach($data['materials'] as $k => $val)
                                                    <tr>
                                                        <td>{{$val->description}}</td>
                                                        <td>{{$val->size.' '.$val->size_unit }}</td>
                                                        <td>{{$val->quantity.' '.$val->quantity_unit}}</td>
                                                        <td>{{$val->model}}</td>
                                                        <td>{{$val->our_qty.' '.$val->quantity_unit}}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    @if(count($data['accessories']) > 0)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="panel-title">Accessories & Fittings</h3>
                                                <table class="table table-bordered table-striped table-actions" id="accessories_order_table">
                                                    <tr>
                                                        <th>Description</th>
                                                        <th>Quantity</th>
                                                        <th>Model</th>
                                                        <th>Your Quantity</th>
                                                    </tr>
                                                    @foreach($data['accessories'] as $k => $val)
                                                        <tr>
                                                            <td>{{$val->description}}</td>
                                                            <td>{{$val->quantity.' '.$val->quantity_unit}}</td>
                                                            <td>{{$val->model}}</td>
                                                            <td>{{$val->our_qty.' '.$val->quantity_unit}}</td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- END PAGE CONTENT -->
        <br/><br/><br/><br/><br/><br/><br/><br/>
    </div>
    <script src="{{ asset('js/MTInquiry/main.js') }}"></script>
@endsection
