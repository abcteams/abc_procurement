@extends('layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Inquiry Details</li>
    </ul>

    <div class="page-title">
        <h2>Inquiry Details</h2>
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
                                <h3 class="panel-title">{{$data[0]->sub_gml}}</h3>
                            </div>
                            <div class="panel-body panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-actions">
                                        <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Size</th>
                                            <th>Budgetory Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $k => $val)
                                            <tr class="subMatItems" >
                                                <td class="{{$val->size == 0 ?"changeBackground":'' }}">
                                                    {{$val->quantity_unit == '' ?'**'.$val->description:$val->description}}
                                                    <input type="hidden" class="description" value="{{$val->description}} "/>
                                                    <input type="hidden" class="id" value="{{$val->id}}" />
                                                </td>
                                                <td class="{{$val->size == 0 ?"changeBackground":'' }}">
                                                    {{$val->quantity .' '.$val->quantity_unit}}
                                                    <input type="hidden" class="quantity" value="{{$val->quantity}} "/>
                                                    <input type="hidden" class="quantity_unit" value="{{$val->quantity_unit}} "/>
                                                </td>
                                                <td class="{{$val->size == 0 ?"changeBackground":'' }}">
                                                    <input type="hidden" class="size" value="{{$val->size}} " />
                                                    {{$val->size == 0 ? '-':$val->size.' '.$val->size_unit }}
                                                    <input type="hidden" class="size_unit" value="{{$val->size_unit}} "/>
                                                </td>
                                                <td class="{{$val->size == 0 ?"changeBackground":'' }}">
                                                    {{$val->size == 0 ? '-':number_format(($val->budgetory_price),2).' AED' }}
                                                </td>
                                                <td  class="{{$val->size == 0 ?"changeBackground":'' }}"><input type="checkbox" class="margethis"  ></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Suppliers</h3>
                            </div>
                            <div class="panel-body panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-actions">
                                        <thead>
                                        <tr>
                                            <th width="150">Company Name</th>
                                            <th>Supplier Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($suppliers as $k => $val)
                                            <tr>
                                                <td>{{$val->company_name}}</td>
                                                <td>{{$val->name}}</td>
                                                <td>{{$val->email}}</td>
                                                <td>{{$val->phone_number}}</td>
                                                <td>{{$val->address}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <a href="{{ url()->previous() }}" style="margin-left:10px;padding: 15px 60px" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
