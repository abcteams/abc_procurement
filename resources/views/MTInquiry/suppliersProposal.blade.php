@extends('layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Pending Inquiry</li>
        <li class="active">Supplier Proposal</li>
    </ul>

    <div class="page-title">
        <h2>Under Pricing</h2>
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
                                <a href="{{asset('materialinquiry/addSupplierProposal/'.request()->id)}}" class="btn btn-success pull-right">Add Proposal</a>
                                <a  href="{{asset('materialinquiry/consideredItems/'.request()->id)}}" class="btn btn-warning  pull-right"  style="width: 130px;margin-right:10px;">Considered</a>
                            </div>
                            <div class="panel-body panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-actions">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Period</th>
                                            <th>Datasheets</th>
                                            <th>Quotations</th>
                                            <th>Our Price</th>
                                            <th>Supplier Price</th>
                                            <th>Compliance</th>
                                            <th>Contact Person</th>
                                            <th>Contact Email</th>
                                            <th>Consider</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $k => $val)
                                            <tr>
                                                <td>{{$val->name}}</td>
                                                <td>{{$val->delivery_period}}</td>
                                                <td>
                                                    @if(file_exists('datasheets/'.$val->id))
                                                        @php($files = File::allFiles('datasheets/'.$val->id))
                                                        @foreach($files as $file=>$f)
                                                            <a href="{{asset($f->getPathname())}}">Datasheet</a><br>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(file_exists('quotations/'.$val->id))
                                                        @php($files = File::allFiles('quotations/'.$val->id))
                                                        @foreach($files as $file=>$f)
                                                            <a href="{{asset($f->getPathname())}}">Quotation</a><br>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td style="color: white;background: #756d6d">{{$val->ourPrice.' AED'}}</td>
                                                <td style="color: white;background: #843939">{{$val->total_price.' AED'}}</td>
                                                <td>{{$val->compliance}}</td>
                                                <td>{{$val->contact_person}}</td>
                                                <td>{{$val->email}}</td>
                                                <td>
                                                    @if($val->consider)
                                                        <span>Considered</span>
                                                    @else
                                                        <a style="width: 100px" href="{{asset('materialinquiry/considerItem/'.$val->id)}}" class="btn btn-warning">Consider</a>
                                                    @endif
                                                        <a style="width: 100px" href="{{asset('materialinquiry/proposalReply/'.$val->id)}}" class="btn btn-info">Reply</a>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/Supplier/main.js') }}"></script>
@endsection
