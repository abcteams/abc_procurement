@extends('layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li><a href="{{asset('home')}}">Home</a></li>
        <li class="active">Models And Rates</li>
    </ul>
    <div class="page-title">
        <h2>Models And Rates </h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <form class="form-horizontal" method="POST" action="{{ url('boq/addmodelsandRates') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="boq_id" value="{{request('id')}}">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped table-actions" style="border:10px solid whitesmoke">
                                        <tr>
                                            <th>ID</th>
                                            <th>Description</th>
                                            <th>Size</th>
                                            <th>Quantity</th>
                                            <th>Model</th>
                                            <th>Rate</th>
                                        </tr>
                                        @foreach($data as $k => $val)
                                            <tr>
                                                <td>{{$k+1}}</td>
                                                <td>
                                                    {{$val->description}}
                                                </td>
                                                <td>{{$val->size.' '.$val->size_unit }}</td>
                                                <td>
                                                    {{$val->quantity - $val->rest_quantity.' '.$val->quantity_unit }}
                                                </td>
                                                <td>
                                                    <input type="hidden" value="{{$val->id}}" name="id[]"  class="form-control">
                                                    <input type="text" value="{{$val->model}}" name="model[]"  class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" value="{{$val->rate}}" name="rate[]"  class="form-control">
                                                </td>
                                            </tr>

                                                    @if(count($val->acc) > 0)
                                                            @foreach($val->acc as $k2 => $val2)
                                                                <tr>
                                                                    <td style="background: #aecaec">** {{$k+1}} . {{$k2+1}}</td>
                                                                    <td style="background: #aecaec">
                                                                        {{$val2->description}}
                                                                        <input type="hidden" name="id2[]" value="{{$val2->id}}">
                                                                        <input type="hidden" name="sub_materials_id2[]" value="{{$val->id}}">
                                                                    </td>
                                                                    <td style="background: #aecaec">-</td>
                                                                    <td style="background: #aecaec">{{$val2->quantity}} <input type="hidden" class="real_qu" value="{{$val2->quantity - $val2->rest_quantity}}"></td>
                                                                    <td style="background: #aecaec">
                                                                        <input type="text" value="{{$val2->model}}" name="model2[]" class="form-control">
                                                                    </td>
                                                                    <td style="background: #aecaec">
                                                                        <input type="text" value="{{$val2->rate}}" name="rate2[]"  class="form-control">
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                    @endif
                                            </tr>
                                        @endforeach

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <input style="margin-left:10px;padding:10px 30px" type="submit" value="Save" class="btn btn-success pull-right" />
                            <a href="{{ URL::previous() }}"  style="padding:10px 25px" class="btn btn-danger pull-right" >Cancel</a>
                        </div>
                        <br/><br/><br/><br/><br/>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/BOQ/main.js') }}"></script>
@endsection
