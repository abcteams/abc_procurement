@extends('layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Create Material Requisition</li>
    </ul>
    <div class="page-title">
        <h2>Create Material Requisition</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$data[0]->title}}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped table-actions" style="border:10px solid whitesmoke">
                                        <tr>
                                            <th style="width: 150px">Add To Cart</th>
                                            <th>Description</th>
                                            <th>Size</th>
                                            <th>Quantity</th>
                                            <th>Model</th>
                                            <th style="text-align: center">Accessories & Fittings</th>
                                        </tr>
                                        @foreach($data as $k => $val)
                                            <tr>
                                                <td>
                                                    <button onclick="addToOrder(this,1,{{$val->id}})" class="btn btn-success" id="material{{$val->id}}">Add To Cart</button>
                                                </td>
                                                <td>
                                                    {{$val->description}}
                                                    <input type="hidden" class="sub_material_id" value="{{$val->id}}">
                                                </td>
                                                <td>{{$val->size.' '.$val->size_unit }}</td>
                                                <td>
                                                    {{$val->quantity.' '.$val->quantity_unit }}
                                                    <input type="hidden" class="real_qu" value="{{$val->quantity - $val->rest_quantity}}">
                                                </td>
                                                <td>
                                                    {{$val->model}}
                                                </td>
                                                <td>
                                                    @if(count($val->accessories) > 0)
                                                        <table class="table table-bordered table-striped table-actions">
                                                            <tr class="tr_clone">
                                                                <th>Add</th>
                                                                <th>Description</th>
                                                                <th>Quantity</th>
                                                                <th>Model</th>
                                                            </tr>
                                                            @foreach($val->accessories as $k2 => $val2)
                                                                <tr class="tr_clone">
                                                                    <td><button onclick="addToOrder(this,2,{{$val2->id}})" class="btn btn-success" id="accessory{{$val2->id}}">Add To Cart</button></td>
                                                                    <td>
                                                                        {{$val2->description}}
                                                                        <input type="hidden" class="accessory_id" value="{{$val2->id}}">
                                                                        <input type="hidden" class="sub_material_id" value="{{$val->id}}">
                                                                    </td>
                                                                    <td>{{$val2->quantity.' '.$val->quantity_unit}} <input type="hidden" class="real_qu" value="{{$val2->quantity - $val2->rest_quantity}}"></td>
                                                                    <td>
                                                                        {{$val2->model}}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    @else
                                                        No Accessories
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/MTInquiry/main.js') }}"></script>
@endsection
