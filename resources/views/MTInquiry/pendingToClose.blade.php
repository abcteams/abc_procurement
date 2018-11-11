@extends('layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Pending Inquiry</li>
        <li class="active">Pending To Close</li>
    </ul>

    <div class="page-title">
        <h2>Pending To Close</h2>
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
                                            <th>Name</th>
                                            <th>Period</th>
                                            <th>Datasheets</th>
                                            <th>Quotations</th>
                                            <th>Our Price</th>
                                            <th>Supplier Price</th>
                                            <th>Compliance</th>
                                            <th>Contact Person</th>
                                            <th>Contact Email</th>
                                            <th>Approve</th>
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
                                                    @if($val->is_approved )
                                                        @if($auth->can_approve3)
                                                            <td>
                                                                <a href="{{asset('materialinquiry/approve3Proposal/'.$val->id)}}" class="btn btn-success ">Approve By Operations Manger </a>
                                                            </td>
                                                        @else
                                                            <td><label>wait for Operations Manger Approve</label></td>
                                                        @endif
                                                    @else
                                                        @if($auth->can_approve2)
                                                            <td>
                                                                <a  href="{{asset('materialinquiry/approve2Proposal/'.$val->id)}}" class="btn btn-success ">Approve By Commercial</a>
                                                            </td>
                                                        @else
                                                            <td><label>wait for commercial Approve</label></td>
                                                        @endif
                                                    @endif
                                            </tr>
                                        @endforeach
                                        @if(count($data)=="")
                                            <tr class="text-center">
                                                <td colspan="10" style="color: dimgray;">No Pending Inquiries to Close !</td>
                                            </tr>
                                        @endif
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
