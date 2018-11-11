@extends('layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Supplier Proposal</li>
        <li class="active">Supplier Proposal Detalis</li>
    </ul>

    <div class="page-title">
        <h2>Supplier Proposal Detalis</h2>
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
                                            <th>Quantity</th>
                                            <th>Size</th>
                                            <th>Model Number</th>
                                            <th>Material Specs</th>
                                            <th>Budgetory Price</th>
                                            <th>Price</th>
                                            <th>Supplier Notes</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $k => $val)
                                            <tr>
                                                <td>{{$val->quantity.' '.$val->quantity_unit}}</td>
                                                <td>{{$val->size.' '.$val->size_unit}}</td>
                                                <td>{{$val->model_number}}</td>
                                                <td>
                                                    @if(file_exists('attachments/material_specs/'.$val->id))
                                                        @php($files = File::allFiles('attachments/material_specs/'.$val->id))
                                                        @foreach($files as $file=>$f)
                                                            <a href="{{asset($f->getPathname())}}">View Specs</a><br>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td style="color: white;background: #843939;width: 150px;">{{$val->budgetory_price.' AED'}}</td>
                                                <td style="color: white;background: #756d6d">{{$val->price.' AED'}}</td>
                                                <td>{{$val->description}}</td>
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
