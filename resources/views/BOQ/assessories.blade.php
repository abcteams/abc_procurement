@extends('layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li><a href="{{asset('home')}}">Home</a></li>
        <li class="active">BOQ</li>
    </ul>
    <div class="page-title">
        <h2>Accessories & Fittings</h2><h4 style="padding-top:10px">&nbsp -> Accessories</h4>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <br />
                        <div class="panel-body">
                        <br />
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Accessories List</h3>
                                        </div>
                                        <div class="panel-body panel-body-table">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-actions" id="assessoriesList" style="border:10px solid whitesmoke">
                                                    <tr>
                                                        <th class="listHeader" style="width: 45%">
                                                            Description
                                                        </th>
                                                        <th class="listHeader" >
                                                            Quantity
                                                        </th>
                                                        <th class="listHeader">
                                                            Model Number
                                                        </th>
                                                        @if($auth->can_edit)
                                                        <th class="listHeader" width="100px">
                                                            <button class="btn btn-info" style="font-size: 25px;padding: 7px;width: 100px">+</button>
                                                        </th>
                                                        @endif
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="pull-right">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/BOQ/main.js') }}"></script>
@endsection
