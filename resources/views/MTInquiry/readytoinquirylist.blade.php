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
                                        <th width="150">Sub Work Zone</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Size</th>
                                        <th>Budgetory Price</th>
                                        <th width="100">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $k => $val)
                                            <tr>
                                                <td>{{$val->sub_work_zone}}</td>
                                                <td>{{$val->description}}</td>
                                                <td>{{$val->quantity .' '.$val->quantity_unit}}</td>
                                                <td>{{$val->size.' '.$val->size_unit}}</td>
                                                <td>{{number_format(($val->budgetory_price),2)}} AED</td>
                                                <td><a href="{{asset('boq/addboqsub/'.$val->boq_id.'/'.$val->id)}}" class="btn btn-danger">Edit</a> </td>
                                            </tr>
                                            @if(count($val->acc))
                                                @foreach($val->acc as $k2 => $val2)
                                                    <tr>
                                                        <td style="background: #dee7f2">-</td>
                                                        <td style="background: #dee7f2">{{$val2->description}}</td>
                                                        <td style="background: #dee7f2">{{$val2->quantity}}</td>
                                                        <td style="background: #dee7f2">-</td>
                                                        <td style="background: #dee7f2">-</td>
                                                        <td style="background: #dee7f2">-</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="{{asset('materialinquiry/margeboqs/'.request()->work_zone_id.'/'.request()->id)}}" style="margin-left:10px;padding: 15px 60px" class="btn btn-success pull-right">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
