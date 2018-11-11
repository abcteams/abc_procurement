@extends('layouts.master')
@section('content')

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Your Order
    </li>
</ul>

<div class="page-title">
    <h2>Your Order</h2>
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
                                        <th>Your Order On the List</th>
                                        <th>Your Proposal</th>
                                        <th>Your Total Price</th>
                                        <th>Details</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <td style="text-align: center;font-size: 27px;color: red;font-weight: bold">{{$data->number}}</td>
                                        <td>{{$data->proposal}}</td>
                                        <td>{{$data->total}}</td>
                                        <td><a href="#" class="btn btn-info" style="width: 120px">Details</a></td>
                                        <td>
                                            <a href="#" class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></a>
                                            <button class="btn btn-danger btn-rounded btn-condensed btn-sm" onclick="delete_sub('{{$data->id}}');">
                                                <span class="fa fa-times"></span>
                                            </button>
                                        </td>
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
