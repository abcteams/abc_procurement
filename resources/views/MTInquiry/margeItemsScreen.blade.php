@extends('layouts.master')
@section('content')


    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li> <a href="{{asset('materialinquiry/readytoinquirylist/'.request()->work_zone_id.'/'.request()->id)}}" >ready to inquiry list</a></li>
        <li class="active">Marge Items</li>
    </ul>

    <div class="page-title">
        <h2>Marge Items</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h8 style="color: red">
                            ** Note : To Marge To Items should have the same size , size unit and quantity Unit
                        </h8>
                        <br />
                        <br />
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">List</h3>
                                <div onclick="margeboqitmes()" style="margin-left:10px;padding: 10px 40px" class="btn btn-info pull-right">Marge</div>
                            </div>
                            <div class="panel-body panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-actions" id="margeTable">
                                        <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Size</th>
                                            <th>Budgetory Price</th>
                                            <th width="100">Merge</th>
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
                            <div class="panel-footer">
                                <a href="{{asset('materialinquiry/add/'.request()->work_zone_id.'/'.request()->id)}}" style="margin-left:10px;padding: 15px 60px" class="btn btn-success pull-right">Next</a>
                                <a href="{{asset('materialinquiry/readytoinquirylist/'.request()->work_zone_id.'/'.request()->id)}}" style="margin-left:10px;padding: 15px 60px" class="btn btn-danger pull-right">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
