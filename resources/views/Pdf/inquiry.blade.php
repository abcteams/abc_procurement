<!DOCTYPE html>
<html>
<style type="text/css" media="all">
    .table tr td{
        border: 1px solid #000000;
        padding: 10px;
    }
    .table tr th{
        border: 1px solid #000000;
        padding: 10px;
    }
    .table{
        border: 1px solid #000000;
    }
</style>
<body>

<div class="page-container">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <img src="{{asset('img/abclogo.png')}}">
                            <h3 class="panel-title" style="text-align: center;width:100%">
                                <div>ADVANCE BUILDING CONSTRUCTION COMPANY L.L.C.</div>
                                <div>PURCHASE ORDER-SUBCONTRACT</div>
                                <div>{{$data[0]->work_zone}}</div>
                            </h3>
                            <table class="pull-left">
                                <tr><td width="100px">Ref</td><td>{{$data[0]->main_id}}</td></tr>
                                <tr><td width="100px">Supject</td><td>{{$data[0]->title}}</td></tr>
                            </table>
                            <table class="pull-right">
                                <tr><td width="100px">Name</td><td>{{$supplier->name}}</td></tr>
                                <tr><td width="100px">Email</td><td>{{$supplier->email}}</td></tr>
                            </table>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-8">
                                <table class="table">
                                    <tr>
                                        <td>SERIAL</td>
                                        <td style="font-size: 18px;width:270px">DESCRIPTION</td>
                                        <td style="font-size: 18px;width:140px">QUANTITY</td>
                                        <td style="font-size: 18px;">UNIT</td>
                                        <td style="font-size: 18px;width:120px">SIZE</td>
                                    </tr>
                                    @foreach($data as $k => $val)
                                        <tr>
                                            <td>{{$k+1}}</td>
                                            <td>
                                                @if($val->quantity_unit == '')
                                                    **
                                                @endif
                                                {{$val->description}}</td>
                                            <td>{{$val->quantity}}</td>
                                            <td>
                                                @if($val->quantity_unit == '')
                                                    -
                                                @else
                                                    {{$val->quantity_unit}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($val->quantity_unit == '')
                                                    -
                                                @else
                                                    {{$val->size.' '.$val->size_unit}}
                                                @endif
                                            </td>
                                        </tr>

                                    @endforeach
                                </table>
                                </center>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
                <br>
                <img src="{{asset('img/Stamp.png')}}" style="position: absolute;top: 800px;left: 205px;width: 120px">
                <img src="{{asset('img/Asim-Signature.jpg')}}" width="50px">

            </div>
        </div>
    </div>
</div>
</body>
</html>