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
                                <div class="pull-right">
                                    <table>
                                        <tr>
                                            <td width="100px">Site in charge</td>
                                            <td>{{$data['materials'][0]->name}}</td>
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
                                                    <th>Required Quantity</th>
                                                    <th>Warehouse Quantity</th>
                                                </tr>
                                                @foreach($data['materials'] as $k => $val)
                                                    <tr>
                                                        <td>{{$val->description}}</td>
                                                        <td>{{$val->size.' '.$val->size_unit }}</td>
                                                        <td>{{$val->quantity.' '.$val->quantity_unit}}</td>
                                                        <td>{{$val->model}}</td>
                                                        <td>{{$val->qty_required.' '.$val->quantity_unit}}</td>

                                                        <td><input type="hidden" name="qty_required" class="qty_required" value="{{$val->qty_required}}">
                                                            <input type="hidden" name="req_id" class="req_id" value="{{$val->req_id}}">
                                                            <input type="hidden" name="sub_material_id" class="sub_material_id" value="{{$val->sub_material_id}}">
                                                            <input type="hidden" name="mat_id" class="mat_id" value="{{$val->mat_id}}">
                                                            <input type="number" step="0.01" name="store_qty" class="materials_quantity" id="store_qty" class="form-control" value="{{$val->rest_quantity}}"></td>
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
                                                        <th>Required Quantity</th>
                                                        <th>Warehouse Quantity</th>
                                                    </tr>
                                                    @foreach($data['accessories'] as $k => $val)
                                                        <tr>
                                                            <td>{{$val->description}}</td>
                                                            <td>{{$val->quantity.' '.$val->quantity_unit}}</td>
                                                            <td>{{$val->model}}</td>
                                                            <td>{{$val->qty_required.' '.$val->quantity_unit}}</td>

                                                            <td>
                                                                <input type="hidden" name="qty_required" class="qty_required" value="{{$val->qty_required}}">
                                                                <input type="hidden" name="req_id" class="req_id" value="{{$val->req_id}}">
                                                                <input type="hidden" name="accessory" class="accessory" value="{{$val->acessory_id}}">
                                                                <input type="hidden" name="acc_id" class="acc_id" value="{{$val->acc_id}}">
                                                                <input type="number" step="0.01" name="store_qty" class="accessories_quantity" id="store_qty" class="form-control" value="{{$val->rest_quantity}}"></td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <input style="margin-left:10px;padding: 10px 20px" type="button" onclick="updateQuantity()" value="Save" class="btn btn-primary pull-right" />
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
