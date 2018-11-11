@extends('layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="#">Requisition </li>
        <li class="active">Pending </li>
    </ul>
    <div class="page-title">
        <h2>Approve LPO</h2>
    </div>


    <div class="page-content-wrap">
        <div class="row">
            <form  class="form-horizontal" method="POST" action="{{ url('materialrequisition/addrequisitionMoreDetails') }}">
                {{ csrf_field() }}
            <div class="col-md-12" style="margin-top: 10px">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Amount Details</h3>
                    </div>
                    <div class="row" style="padding: 70px 20px 10px 20px">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Freight</label>
                                <input type="hidden" name="id" value="{{request()->id}}">
                                <input type="number" class="form-control"  name="freight" value="0.0" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Discount</label>
                                <input type="number" class="form-control"  name="discount" value="0.0" required>
                                <input type="hidden" name="proposal_id" value="{{$agreementDts[0]->proposal_id}}">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding: 10px 20px 10px 20px">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Site In Charge</label>
                                <select class="select2 form-control" name="siteInCharge">
                                    <option value="">Choose Eng</option>
                                    @foreach($users as $k => $val)
                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Job NO</label>
                                <input type="text" class="form-control"  name="job_number">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding: 10px 20px 10px 20px">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Oreder Number</label>
                                <input type="text" class="form-control"  name="order_number">
                            </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                    <div class="panel-footer">
                        <input style="margin-left:10px;padding: 10px 20px" type="submit" value="Approve" class="btn btn-success pull-right" />
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
