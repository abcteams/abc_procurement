@extends('layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Pending Inquiry</li>
        <li class="active">Consider</li>
    </ul>

    <div class="page-title">
        <h2>Consider</h2>
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
                                                <td>
                                                    <a style="width: 100px" href="{{asset('materialinquiry/approveProposal/'.$val->id)}}" class="btn btn-success ">Approve</a>
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
