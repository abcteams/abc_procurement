@extends('layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">LPO Details</li>
    </ul>
    <div class="page-title">
        <h2>LPO Details</h2>
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
                                            <td width="100px">Site in Charge</td>
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
                                                    <th>Available Quantity</th>
                                                </tr>
                                                @foreach($data['materials'] as $k => $val)
                                                    <tr>
                                                        <td>{{$val->description}}</td>
                                                        <td>{{$val->size.' '.$val->size_unit }}</td>
                                                        <td>{{$val->quantity.' '.$val->quantity_unit}}</td>
                                                        <td>{{$val->model}}</td>
                                                        <td>{{$val->qty_required.' '.$val->quantity_unit}}</td>
                                                        <td>{{$val->rest_quantity.' '.$val->quantity_unit}}</td>
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
                                                        <th>Available Quantity</th>
                                                    </tr>
                                                    @foreach($data['accessories'] as $k => $val)
                                                        <tr>
                                                            <td>{{$val->description}}</td>
                                                            <td>{{$val->quantity.' '.$val->quantity_unit}}</td>
                                                            <td>{{$val->model}}</td>
                                                            <td>{{$val->qty_required.' '.$val->quantity_unit}}</td>
                                                            <td>{{$val->rest_quantity.' '.$val->quantity_unit}}</td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <a role="button"  data-toggle="modal" data-target="#modal_reject" class="btn btn-danger pull-right" href="#">Reject</a>

                                <a href="{{asset('/materialrequisition/managerApprove/'.$data['materials'][0]->req_id)}}" class="btn btn-success pull-right"  style="margin-right:10px;">Approve</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- END PAGE CONTENT -->
        <br/><br/><br/><br/><br/><br/><br/><br/>
    </div>


    <div class="modal" id="modal_reject" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
        <div class="modal-dialog modal-centered">
            <div class="modal-content">
                <form method="post" action="{{asset('/materialrequisition/managerReject')}}" id="reject-form">
                    {!! csrf_field() !!}
                    <div class="modal-header">
                        <h4 class="modal-title" id="defModalHead">Reason for Rejection</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="hidden" name="req_id" value="{{$data['materials'][0]->req_id}}">
                                <label id="hidden" style="display: none">sdf</label>
                                <textarea class="form-control" rows="5" style="resize: none" name="reason" form="reject-form" autofocus></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit"  class="btn btn-danger"  value="Reject">
                        <a class="btn btn-default" data-dismiss="modal" onclick="closeModel()">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/MTInquiry/main.js') }}"></script>
@endsection
