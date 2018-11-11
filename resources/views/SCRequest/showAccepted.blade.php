@extends('layouts.master')
@section('content')

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Accepted Proposal </li>
</ul>

<div class="page-title">
    <h2>Accepted Proposal</h2>
</div>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div style="padding:10px">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">list</h3>
                        <a style="width: 100px" href="{{asset('subcontractorrequest/proposalDetails/'.$data[0]->id)}}" class="btn btn-primary  pull-right">Details</a>
                    </div>
                    <div style="padding: 70px 0px 20px 0px; ">
                        <div class="row" >
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="FullName">Category</label>
                                    <div class="col-md-9" style="background:#f5f5f5;height:30px;margin-top:-5px;padding-top:5px;border-radius:3px">
                                        {{$data[0]->title}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="Inquiry_Material_Item_SubitemName">Proposal</label>
                                    <div class="col-md-9" style="background:#f5f5f5;height:30px;margin-top:-5px;padding-top:5px;border-radius:3px">
                                        {{$data[0]->proposal}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="padding-top:10px">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="Proposal">Name</label>
                                    <div class="col-md-9" style="background:#f5f5f5;height:30px;margin-top:-5px;padding-top:5px;border-radius:3px">
                                        {{$data[0]->name}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="Proposal">Total Price</label>
                                    <div class="col-md-9" style="background:#f5f5f5;height:30px;margin-top:-5px;padding-top:5px;border-radius:3px">
                                        {{$data[0]->price}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="IsAccepted">Email</label>
                                    <div class="col-md-9" style="background:#f5f5f5;height:30px;margin-top:-5px;padding-top:5px;border-radius:3px">
                                        <div class="input-group">
                                            {{$data[0]->email}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer">
                        @if(count($data[0]->agreement))
                            @if($data[0]->agreement[0]->is_approved)
                                @if($data[0]->agreement[0]->is_subcontractor_accepted)
                                    <a href="{{asset('subcontractorrequest/showAgreement/'.$data[0]->id)}}" class="btn btn-success pull-right">Show Agreement</a>
                                @else
                                <button class="alert alert-danger">Please wait for Subcontractor to accept the agreement</button>
                                @endif
                            @else
                                <a href="{{asset('subcontractorrequest/approveAgreement/'.$data[0]->id)}}" style="margin-left:10px;" class="btn btn-success pull-right">Approve Agreement</a>
                            @endif
                        @else
                            <a href="{{asset('subcontractorrequest/createAgreement/'.$data[0]->id)}}" style="margin-left:10px;" class="btn btn-success pull-right">Create Agreement</a>
                        @endif
                    </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>
@endsection
