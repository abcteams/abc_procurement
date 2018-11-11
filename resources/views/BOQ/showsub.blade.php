@extends('layouts.master')

@section('content')
    <?php   $inquiryIsCreated   =   0; ?>
    <ul class="breadcrumb">
        <li><a href="{{asset('home')}}">Home</a></li>
        <li ><a href="{{asset('boq/show/'.$boq->work_zone_id)}}">BOQ</a></li>
        <li class="active">BOQ Sub Materials</li>
    </ul>
    <div class="page-title">
        <h2>{{$boq->title}} </h2><h4 style="padding-top:10px">&nbsp -> BOQ Sub Materials</h4>
    </div>

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{asset('boq/addboqsub/'.$id)}}">
                                <button class="btn btn-primary btn-condensed  pull-left">
                                    <span class="fa fa-plus"></span>
                                    Add Sub Material
                                </button>
                            </a>
                        </div>
                        <br />
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <br />
                                            <form method="GET" action="{{asset('boq/showsubboq/'.$id)}}" class="input-group" style="height:35px;">
                                                <div class="input-group-btn"  style="width:11%">
                                                    <select class="btn btn-default dropdown-toggle searchselect selectpicker" name="type" style="width: 120px" >
                                                        <option value="all" >All</option>
                                                    </select>
                                                </div><!-- /btn-group -->
                                                <input type="text" value="{{request('value')}}" class="form-control" style="height:35px;width: 85%" aria-label="..."  name="value">
                                                <button type="submit" class="input-group-addon" style="width:15%;line-height: 33px;cursor: pointer;">Search</button>
                                            </form>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                            </div>
                            <br /><br />
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">BOQ Items List</h3>
                                        </div>
                                        <div class="panel-body panel-body-table">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-actions" id="workzoneList" style="border:10px solid whitesmoke">
                                                    <tr>
                                                        <th class="listHeader">
                                                            Gml
                                                        </th>
                                                        <th class="listHeader">
                                                            Sub Gml
                                                        </th>
                                                        <th class="listHeader">
                                                            Description
                                                        </th>
                                                        <th class="listHeader">
                                                            Quantity
                                                        </th>
                                                        <th class="listHeader">
                                                            Size
                                                        </th>
                                                        <th class="listHeader" width="150px">
                                                            Material Specs
                                                        </th>
                                                        <th class="listHeader">
                                                            Model
                                                        </th>
                                                        <th class="listHeader">
                                                            Fittings & Accessories
                                                        </th>
                                                        @if($auth['boq']->can_edit)
                                                            <th class="listHeader" width="120">Actions</th>
                                                        @endif
                                                    </tr>
                                                    @foreach($data as $k => $val)
                                                        <?php $inquiryIsCreated = intval($val->inquiry_is_created)?>
                                                        <?php $status = intval($val->status)?>
                                                        <tr class="subMatItems">
                                                            <td>
                                                                <strong>
                                                                    {{$val->gml_title}}
                                                                </strong>
                                                            </td>
                                                            <td>
                                                                <strong>
                                                                    {{$val->sub_gml}}
                                                                </strong>
                                                            </td>
                                                            <td>
                                                                {{$val->description}}
                                                            </td>
                                                            <td>
                                                                <strong>
                                                                    {{$val->quantity.' '.$val->quantity_unit}}
                                                                </strong>
                                                            </td>
                                                            <td>
                                                                {{$val->size.' '.$val->size_unit}}
                                                            </td>
                                                            <td>
                                                                @if(file_exists('attachments/material_specs/'.$val->id))
                                                                    @php($files = File::allFiles('attachments/material_specs/'.$val->id))
                                                                    @foreach($files as $file=>$f)
                                                                        <a href="{{asset($f->getPathname())}}">View Specs</a><br>
                                                                    @endforeach
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{$val->model}}
                                                            </td>
                                                            <td>
                                                                <a href="{{asset('boq/accessories/'.$val->id)}}" class="btn btn-info" >Accessories & Fittings</a>
                                                            </td>
                                                            <td>
                                                                @if($auth['boq']->can_edit)
                                                                    <a href="{{asset('boq/addboqsub/'.$val->boq_id.'/'.$val->id)}}" class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"  title="edit"></span></a>
                                                                    <button class="btn btn-danger btn-rounded btn-condensed btn-sm" onclick="delete_row('{{$val->id}}');"  title="delete"><span class="fa fa-times"></span></button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="pull-right">
                                                <?php echo $data->appends(['type'=>request('type') , 'value'=>request('value')]) ?>
                                            </div>
                                            <br /><br /><br />
                                            @if(count($data) > 0)
                                                @if($inquiryIsCreated == 0)
                                                    @if($status == 1)
                                                        @if($auth['boq']->can_edit)
                                                            <a href="{{asset('boq/redayToInqire/'.$id)}}"class="btn btn-primary  pull-right" style="width: 150px;padding:10px;margin-left: 10px">Ready To Inquire</a>
                                                        @endif
                                                    @elseif($status == 2)
                                                        <div class="alert alert-danger" style="text-align: center">This Boq Is Ready to Inquire</div>
                                                    @endif
                                                @elseif($status != 4)
                                                    <div class="alert alert-danger" style="text-align: center">The Inquiry Currently under procurement </div>
                                                @else
                                                    @if($auth['boq']->can_edit)
                                                        <a href="{{asset('boq/modelsAndRate/'.$val->boq_id)}}" class="btn btn-primary pull-right"  style="padding: 15px;margin-left: 10px">Models & Rates</a>
                                                    @endif
                                                    <a href="{{asset('materialrequisition/add/'.$id)}}" class="btn btn-success pull-right" style="padding: 15px" >Create Requisition</a>
                                                @endif
                                            @else
                                                <div class="alert alert-danger" style="text-align: center">If You Want to Create Inquiry You Should add BOQ Sub Materials First</div>
                                            @endif
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
