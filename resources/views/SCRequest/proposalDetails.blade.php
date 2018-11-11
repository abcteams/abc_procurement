@extends('layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Subcontractor Proposal</li>
        <li class="active">Subcontractor Proposal Detalis</li>
    </ul>

    <div class="page-title">
        <h2>Subcontractor Proposal Detalis</h2>
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
                                            <th>Budgetory Price</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $k => $val)
                                            <tr>
                                                <td>{{$val->quantity}}</td>
                                                <td style="color: white;background: #843939;width: 150px;">{{$val->budgetory_price}}</td>
                                                <td style="color: white;background: #756d6d">{{$val->price}}</td>
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
@endsection
