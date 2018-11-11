<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Procurement</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" id="theme"  href="{{ asset('css/theme-default.css') }}"/>
    <link rel="stylesheet" type="text/css" id="theme"  href="{{ asset('css/select2.css') }}"/>

    <script type="text/javascript" src="{{ asset('js/plugins/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sweetalert.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/select2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/Forms/main.js') }}"></script>

</head>
<body>

<div class="page-container" style="height: 100%;">
    <div class="page-sidebar" style="padding: 1px;float: left;">
        <div style="text-align: center;background: #33414e;padding: 50px 0px">
            <img style="width: 130px;padding-bottom: 14%" src="{{asset('img/abclogo.png')}}">


            <div style="padding: 15px;border-left: 2px solid #faee05;margin: 10px;text-align: center">
                <span style="color: white;font-size: 20px;font-family: Andalus">{{strtoupper('Project Name ')}}</span><br />
                <span  style="color:#faee05;font-size: 20px;font-family: Andalus">{{strtoupper($data[0]->work_zone)}}</span>
            </div>
            <div style="padding: 15px;border-left: 2px solid #faee05;margin: 10px;;text-align: center">
                <span style="color: white;font-size: 20px;font-family: Andalus">{{strtoupper('Project Status ')}}</span><br />
                <span  style="color: #faee05;font-size: 20px;font-family: Andalus">{{strtoupper('Job In hand')}}</span>
            </div>
        </div>
    </div>
    <div class="page-content" style="padding-top: 30px">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="padding: 20px">
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
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Inquiry</h3>
                                <a href="{{asset('pdf/pdfInquiry/'.$data[0]->main_id.'/'.$supplier->id)}}" class="btn btn-primary  pull-right" style="width: 160px">
                                    <div class="pull-left">Download Inquiry </div>
                                    <span class="fa fa-download pull-right" style="margin-top:3px;color:#ffffff"></span>
                                </a>
                            </div>
                            <div class="panel-body">
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Description</th>
                                                <th>Quantity</th>
                                                <th>Unit</th>
                                                <th>Size</th>
                                                <th>Material Specs</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $k => $val)
                                                <tr>
                                                    <td class = "{{$val->size == 0 ?"changeBackground":'' }} ">
                                                        {{$k+1}}
                                                    </td>
                                                    <td class="{{$val->size == 0 ?"changeBackground":''}}" >
                                                        {{$val->quantity_unit == ''?'**':''}}
                                                        {{$val->description}}
                                                    </td>
                                                    <td class="{{$val->size == 0 ?"changeBackground":''}}" >
                                                        {{$val->quantity}}</td>
                                                    <td class="{{$val->size == 0 ?"changeBackground":''}}" >
                                                        {{$val->quantity_unit == ''?'-':$val->quantity_unit}}
                                                    </td>
                                                    <td class="{{$val->size == 0 ?"changeBackground":''}}" >
                                                        {{$val->size == 0?'-':$val->size.' '.$val->size_unit}}
                                                    </td>
                                                    <td class="{{$val->size == 0 ?"changeBackground":''}}" >
                                                        @if(file_exists('attachments/material_specs/'.$val->id))
                                                            @php($files = File::allFiles('attachments/material_specs/'.$val->id))
                                                            @foreach($files as $file=>$f)
                                                                <a href="{{asset($f->getPathname())}}">View Specs</a><br>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                 </tr>
                                               @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-10">
                                                <div class="errorMasseges" style="padding:10px 0px">
                                                    @foreach ($errors->all() as $error)
                                                        <li class="alert alert-danger">{{ $error }}</li>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Supplier Form</h3>
                            </div>
                            <div class="panel-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="cursor: pointer" onclick="showAccept()">
                                        <h3 class="panel-title" >
                                            <span class="fa fa-circle" style="color:#36bb36;font-size: 16px;" id="acceptIcon"></span>
                                            Accept
                                        </h3>
                                        <div style="padding: 7px">
                                            <span class="fa fa-chevron-circle-down pull-right" style="font-size: 20px;color:#333333"></span>
                                        </div>
                                    </div>
                                    <div class="panel-body" id="supplierAccept">
                                        @include('Forms.supplierAccept')
                                    </div>

                                    <div class="panel-heading"  style="cursor: pointer"  onclick="showDecline()">
                                        <h3 class="panel-title">
                                            <span class="fa fa-circle" style="color:#6b5f5f;font-size: 16px;" id="declineIcon"></span>
                                            Decline
                                        </h3>
                                        <div style="padding: 7px">
                                            <span class="fa fa-chevron-circle-down pull-right" style="font-size: 20px;color:#333333"></span>
                                        </div>
                                    </div>
                                    <div class="panel-body"  id="supplierDecline" style="display:none;">
                                        @include('Forms.supplierDecline')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <br /><br /><br />
            <br />
        </div>
    </div>
</div>
<!-- Scripts -->
<!-- END PLUGINS -->

<script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/actions.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins/bootstrap/bootstrap-datepicker.js') }}"></script>


</body>
</html>
