@extends('layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Cart</li>
    </ul>
    <div class="page-title">
        <h2>Cart</h2>
    </div>
    <div class="page-content-wrap">
        <div class="row">
            <form class="form-horizontal" id="orderForm">
                {{ csrf_field() }}
                <div class="col-md-8">
                    <div style="padding:10px">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Cart</h3>
                            </div>
                            <input type="hidden" id="sub_boq_id" value="" >
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="panel-title">Materials Cart</h3>
                                            <table class="table table-bordered table-striped table-actions" id="materials_order_table">
                                                <tr>
                                                    <th>Description</th>
                                                    <th>Size</th>
                                                    <th>Quantity</th>
                                                    <th>Model</th>
                                                    <th>Your Quantity</th>
                                                    <th width="70px">Actions</th>
                                                </tr>
                                                @if(count($data['materials']) > 0)
                                                    @foreach($data['materials'] as $k => $val)
                                                        <tr>
                                                            <td>
                                                                {{$val->description}}
                                                                <input type="hidden" class="cart_id" value="{{$val->cart_id}}">
                                                                <input type="hidden" class="sub_boq_id" value="{{$val->boq_id}}">
                                                                <input type="hidden" class="item_type" value="{{$val->item_type}}">
                                                                <input type="hidden" class="sub_material_id" value="{{$val->id}}">
                                                            </td>
                                                            <td>{{$val->size.' '.$val->size_unit }}</td>
                                                            <td>
                                                                {{$val->quantity - $val->rest_quantity.' '.$val->quantity_unit }}
                                                                <input type="hidden" class="real_qu" value="{{$val->quantity - $val->rest_quantity}}">
                                                            </td>
                                                            <td>{{$val->model}}</td>
                                                            <td>
                                                                <input type = "number" id="quantity" name="item_qty" class="materials_quantity form-control" step="0.01" style="text-align:center" value="{{$val->quantity - $val->rest_quantity}}">
                                                            </td>
                                                            <td><a href="{{asset('materialrequisition/removeItemFromCart/'.$val->cart_id)}}" class="btn btn-danger">Remove</a></td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr id="materialCartEmpty">
                                                        <td colspan="6">Cart Empty</td>
                                                    </tr>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="panel-title">Accessories & Fittings Cart</h3>
                                            <table class="table table-bordered table-striped table-actions" id="accessories_order_table">
                                                <tr>
                                                    <th>Description</th>
                                                    <th>Quantity</th>
                                                    <th>Model</th>
                                                    <th>Your Quantity</th>
                                                    <th width="70px">Actions</th>
                                                </tr>
                                                @if(count($data['accessories']) > 0)
                                                    @foreach($data['accessories'] as $k => $val)
                                                        <tr>
                                                            <td>
                                                                {{$val->description}}
                                                                <input type="hidden" class="cart_id" value="{{$val->cart_id}}">
                                                                <input type="hidden" class="item_type" value="{{$val->item_type}}">
                                                                <input type="hidden" class="accessory_id" value="{{$val->id}}">
                                                                <input type="hidden" class="sub_material_id" value="{{$val->id}}">
                                                            </td>
                                                            <td>{{$val->quantity}} <input type="hidden" class="real_qu" value="{{$val->quantity - $val->rest_quantity}}"></td>
                                                            <td>{{$val->model}}</td>
                                                            <td>
                                                                <input type = "number" id="quantity" name="item_qty" class="materials_quantity" step="0.01" style="text-align:center" value="{{$val->quantity - $val->rest_quantity}}">
                                                            </td>
                                                            <td></td>
                                                            @endforeach
                                                        </tr>
                                                        @else
                                                            <tr id="accessoryCartEmpty">
                                                                <td colspan="5">Cart Empty</td>
                                                            </tr>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" style="margin-top: 10px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Delivery Details</h3>
                        </div>
                        <div class="row" style="padding: 70px 20px 10px 20px">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Delivery Date</label>
                                    <input type="text" class="form-control datepicker"  id="delivery_date" required>
                                </div>
                            </div>
                        </div>
                        <div class="row"  style="padding: 0px 20px">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Installation Complete Date</label>
                                    <input id="complete_date" type="text" class="form-control datepicker"  id="complete_date" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="panel-footer">
                            <input style="margin-left:10px;padding: 10px 20px" type="button" onclick="submitOrderForm()" value="Check Out" class="btn btn-primary pull-right" />
                            <a href="{{ URL::previous() }}" style="padding:10px 20px" class="btn btn-danger pull-right" >Cancel</a>
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
