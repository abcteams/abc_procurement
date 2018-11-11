@extends('layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Requisition Details </li>
    </ul>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding: 20px">
                        <h3 class="panel-title" style="text-align: center;width:100%">
                            <div>ADVANCE BUILDING CONSTRUCTION COMPANY L.L.C.</div>
                            <div>PURCHASE ORDER-SUBCONTRACT</div>
                            <div>{{$data['main'][0]->workzone}}</div>
                        </h3>
                        <table class="pull-left">
                            <tr><td width="100px">Order No.</td><td>{{$data['main'][0]->order_number}}</td></tr>
                            <tr><td width="100px">Oreder To</td><td>{{$userinfo[0]->company_name}}</td></tr>
                            <tr><td width="100px">Tel</td><td>{{$userinfo[0]->phone_number}}</td></tr>
                            <tr><td width="100px">Location</td><td>{{$userinfo[0]->address}}</td></tr>
                            <tr><td width="100px">Attention</td><td>{{$userinfo[0]->name}}</td></tr>
                        </table>
                        <table class="pull-right">
                            <tr><td width="100px">Date</td><td>{{$data['main'][0]->order_date}}</td></tr>
                            <tr><td width="100px">Job No.</td><td>{{$data['main'][0]->job_no}}</td></tr>
                            <tr><td width="100px">Quotation Ref</td><td>{{$data['main'][0]->quotation_ref}}</td></tr>
                            <tr><td width="100px">Site In Charge</td><td>Engr. {{$data['main'][0]->name}}</td></tr>
                            <tr><td width="100px">Mob</td><td>{{$data['main'][0]->phone_number}}</td></tr>
                        </table>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">{{$data['main'][0]->sub_gml}}</h3>
                                        <a href="{{asset('pdf/pdfLpo/'.request()->id.'/'.$userinfo[0]->id)}}" class="btn btn-primary  pull-right" style="width: 140px">
                                            <div class="pull-left">Download LPO </div>
                                            <span class="fa fa-download pull-right" style="margin-top:3px;color:#ffffff"></span>
                                        </a>
                                    </div>
                                    <table class="table table-bordered table-striped table-actions">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Size</th>
                                            <th>Model</th>
                                            <th>Rate</th>
                                            <th>Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $totalAmount  = 0;$totalQut  = 0;  @endphp
                                        @if(count($data['materials']) > 0)
                                            @foreach($data['materials'] as $k => $val)
                                                <tr>
                                                    <td>{{$k +  1}}</td>
                                                    <td>{{$val->description}}</td>
                                                    <td>
                                                        {{$val->orderQuantity.' '.$val->quantity_unit}}
                                                        @php $totalQut  += $val->orderQuantity;  @endphp
                                                    </td>
                                                    <td>{{$val->size.' '.$val->size_unit}}</td>
                                                    <td>{{$val->model}}</td>
                                                    <td>{{number_format($val->rate,2) }}</td>
                                                    <td>
                                                        {{number_format(($val->rate * $val->orderQuantity),2) }}
                                                        @php $totalAmount  += ($val->rate * $val->orderQuantity);  @endphp
                                                    </td>
                                                </tr>

                                            @endforeach
                                        @endif
                                        @if(count($data['accessories']) > 0)
                                            @foreach($data['accessories'] as $k => $val)
                                                <tr>
                                                    <td>**{{$k +  1}}</td>
                                                    <td>{{$val->description}}</td>
                                                    <td>
                                                        {{$val->orderQuantity}}
                                                        @php $totalQut  += $val->orderQuantity;  @endphp
                                                    </td>
                                                    <td>-</td>
                                                    <td>{{$val->model}}</td>
                                                    <td>{{number_format($val->rate,2) }}</td>
                                                    <td>{{number_format(($val->rate * $val->orderQuantity),2) }} </td>
                                                    @php $totalAmount  += ($val->rate * $val->orderQuantity);  @endphp
                                                </tr>
                                            @endforeach
                                        @endif
                                        <tr class="detailsTr">
                                            <td colspan="2"><div style="width: 200px;color: black" class="pull-right">Total Quantity</div></td>
                                            <td style="color: black">{{$totalQut}}</td>
                                            <td colspan="3"><div style="width: 200px;color: black" class="pull-right">Subtotal</div></td>
                                            <td style="color: black">{{number_format($totalAmount,2) }}</td>
                                        </tr>
                                        <tr class="detailsTr">
                                            <td colspan="6"><div style="width: 200px;color: black" class="pull-right">Freight</div></td>
                                            <td style="color: black">{{number_format(($data['main'][0]->freight),2) }}</td>
                                        </tr>
                                        <tr class="detailsTr">
                                            <td colspan="6"><div style="width: 200px;color: black" class="pull-right">Discount</div></td>
                                            <td style="color: black">{{number_format(($data['main'][0]->discount),2) }}</td>
                                        </tr>
                                        <tr class="detailsTr">
                                            <td colspan="6"><div style="width: 200px;color: black" class="pull-right">Taxable Value</div></td>
                                            <td style="color: black">{{number_format((($total = $totalAmount + $data['main'][0]->freight) - $data['main'][0]->discount ),2) }}</td>
                                        </tr>
                                        <tr class="detailsTr">
                                            <td colspan="6"><div style="width: 200px;color: black" class="pull-right">Tax Amount</div></td>
                                            <td style="color: black">{{number_format(($total * 0.05),2) }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped table-actions">
                                    <thead></thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="3" style="color:black;font-size: 18px;text-align: center"> Net Amount</td>
                                        <td style="color:black;font-size: 16px;text-align: center">{{number_format(($total + ($total * 0.05)),2) }} AED </td>
                                    </tr>
                                    <tr class="detailsTr">
                                        <td>Special Conditions </td>
                                        <td colspan="3">All as per General Conditions of Purchase in Annexure A (attached).</td>
                                    </tr>
                                    <tr class="detailsTr">
                                        <td>Payment terms </td>
                                        <td colspan="3">{{$data['main'][0]->payment_terms}}</td>
                                    </tr>
                                    <tr class="detailsTr">
                                        <td>Delivery Date </td>
                                        <td colspan="3">{{$data['main'][0]->delivery_date}}</td>
                                    </tr>
                                    <tr class="detailsTr">
                                        <td>Delivery Location </td>
                                        <td colspan="3">{{$data['main'][0]->location}}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer" style="padding: 50px">
                        <a role="button"  data-toggle="modal" data-target="#modal_reject" class="btn btn-danger pull-right" href="#">Reject</a>
                        <a role="button"  data-toggle="modal" data-target="#modal_accept" class="btn btn-success pull-right" href="#">Approve</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal" id="modal_reject" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
        <div class="modal-dialog modal-centered">
            <div class="modal-content">
                <form method="post" action="{{asset('/materialrequisition/procurementReject')}}" id="reject-form">
                    {!! csrf_field() !!}
                    <div class="modal-header">
                        <h4 class="modal-title" id="defModalHead">Reason for Rejection</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="hidden" name="req_id" value="{{$data['main'][0]->req_id}}">
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

    <div class="modal" id="modal_accept" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
        <div class="modal-dialog modal-centered">
            <div class="modal-content">
                <form method="post" action="{{asset('/materialrequisition/procurementApprove')}}" id="accept-form">
                    {!! csrf_field() !!}
                    <div class="modal-header">
                        <h4 class="modal-title" id="defModalHead">Add Details</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="hidden" name="req_id" value="{{$data['main'][0]->req_id}}">
                                <div class="form-group">
                                    <label for="freight">Freight<span style="color:red">*</span></label>
                                    <input type="number" step="0.01" class="form-control" name="freight" id="freight" value="0.0" required>
                                </div>
                                <div class="form-group">
                                    <label for="discount">Discount<span style="color:red">*</span></label>
                                    <input type="number" step="0.01" class="form-control" name="discount" id="discount"  value="0.0" required>
                                </div>
                                <div class="form-group">
                                    <label for="job_no">Job No<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="job_no" id="job_no" required>
                                </div>
                                <div class="form-group">
                                    <label for="job_no">Order No<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="order_no" id="order_no" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit"  class="btn btn-success"  value="Approve">
                        <a class="btn btn-default" data-dismiss="modal" onclick="closeModel2()">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/MTInquiry/main.js') }}"></script>
@endsection