@extends('layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li><a href="{{asset('home')}}">Home</a></li>
        <li><a href="{{asset('boq/showsubboq/'.$data[0]->boq_id)}}">BOQ</a></li>
    </ul>
    <div class="page-title">
        <h2>Accessories & Fittings</h2><h4 style="padding-top:10px">&nbsp ->{{$data[0]->description}}</h4>
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
                                    <form class="form-horizontal" method="POST" action="{{ url('boq/addAccessories') }}" >
                                        {{ csrf_field() }}
                                        <input type="hidden" name="boq_id" value="{{$data[0]->boq_id}}">
                                        <input type="hidden" name="subBoqId" value="{{request()->id}}">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Accessories List</h3>
                                        </div>
                                        <div class="panel-body panel-body-table">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-actions" id="accessoriesList" style="border:10px solid whitesmoke">
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
                                                            <a class="btn btn-info" style="font-size: 25px;padding: 7px;width: 100px" onclick="addAccessories()">+</a>
                                                        </th>
                                                        @endif
                                                    </tr>
                                                    @foreach($accessories as $k => $val)
                                                        <tr>
                                                            <td>{{$val->description}}</td>
                                                            <td>{{$val->quantity}}</td>
                                                            <td>{{$val->model}}</td>
                                                            <td><a class="btn btn-danger btn-condensed" onclick="removeRow(this,{{$val->id}})"><i class="fa fa-remove"></i> </a> </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="pull-right" id="actionButtons">
                                                <input style="margin-left:10px;padding: 10px 50px" type="submit" value="{{'Save'}}" class="btn btn-success pull-right" />
                                                <a href="{{ URL::previous() }}" style="padding: 10px 40px;" class="btn btn-danger pull-right" >Cancel</a>
                                            </div>
                                        </div>
                                    </form>
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
