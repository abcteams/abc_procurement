@extends('layouts.master')
@section('content')

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">show Agreement</li>
</ul>

<div class="page-title">
    <h2>show Agreement</h2>
</div>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div style="padding:10px">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">list</h3>

                    </div>
                    <div style="padding: 70px 0px 20px 0px; ">
                        <div class="row" >
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="FullName">Material</label>
                                    <div class="col-md-9" style="background:#f5f5f5;height:30px;margin-top:-5px;padding-top:5px;border-radius:3px">
                                        {{$data->title}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" >Final Price</label>
                                    <div class="col-md-9" style="background:#f5f5f5;height:30px;margin-top:-5px;padding-top:5px;border-radius:3px">
                                        {{$data->final_price}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="padding-top:10px">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="Proposal">Payment Terms</label>
                                    <div class="col-md-9" style="background:#f5f5f5;height:30px;margin-top:-5px;padding-top:5px;border-radius:3px">
                                        {{$data->payment_terms}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="Proposal">Delivery Agreement</label>
                                    <div class="col-md-9" style="background:#f5f5f5;height:30px;margin-top:-5px;padding-top:5px;border-radius:3px">
                                        {{$data->delivery_agreement}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="IsAccepted">Approve Date</label>
                                    <div class="col-md-9" style="background:#f5f5f5;height:30px;margin-top:-5px;padding-top:5px;border-radius:3px">
                                        <div class="input-group">
                                            {{$data->approve_date}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer"></div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>
@endsection
