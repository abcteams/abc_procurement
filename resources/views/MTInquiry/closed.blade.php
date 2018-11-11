@extends('layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Closed Inquiry </li>
    </ul>

    <div class="page-title">
        <h2>Closed Inquiry</h2>
    </div>
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12" style="padding:10px">
                <div class="panel panel-default">
                    <br />
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <form method="GET" action="{{asset('materialinquiry/closed')}}">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Search</h3>
                                            </div>
                                            <div class="panel-body">
                                                <br />
                                                <div class="row">
                                                    <div class="col-md-1" style="text-align: center">
                                                        <label>Search</label></div>
                                                    <div class="col-md-10">
                                                        <input type="text" name="search" class="form-control" value="{{request()->search}}">
                                                    </div>
                                                    <div class="col-md-1"></div>
                                                </div>
                                                <br />
                                                <br />
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Work Zones</label>
                                                        <select class="form-control select2" onchange="getSubZone(this)" name="workzone">
                                                            <option value="0">Choose Work Zone</option>
                                                            @foreach($workzone as $val)
                                                                <option value="{{$val->id}}" {{request()->workzone == $val->id ? 'selected':''}}>{{$val->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>From</label>
                                                        <input type="text" class="form-control datepicker" name="from_date"  value="{{request()->from_date}}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>To</label>
                                                        <input type="text" class="form-control datepicker"  name="to_date"  value="{{request()->to_date}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-footer">
                                                <div class="pull-right"><button type="submit" class="btn btn-primary" >Search</button></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br /><br />
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Closed Inquiries</h3>
                                    </div>
                                    <div class="panel-body panel-body-table">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-actions">
                                                <thead>
                                                <tr>
                                                    <th width="150">Work Zone</th>
                                                    <th width="150">Gml</th>
                                                    <th width="150">Sub Gml</th>
                                                    <th>Date</th>
                                                    <th>Close Date</th>
                                                    <th>Description</th>
                                                    <th width="100">Details</th>
                                                    <th>Proposals</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($data as $k => $val)
                                                    <tr>
                                                        <td>{{$val->wztitle}}</td>
                                                        <td>{{$val->gml_title}}</td>
                                                        <td>{{$val->sub_gml_title}}</td>
                                                        <td>{{$val->date}}</td>
                                                        <td>{{$val->close_date}}</td>
                                                        <td>{{$val->description}}</td>
                                                        <td><a href="{{asset('materialinquiry/showInquirydetails/'.$val->work_zone_id.'/'.$val->sub_gml_id.'/'.$val->id)}}" class="btn btn-info">Details</a></td>
                                                        <td width="170px">
                                                            <a  href="{{asset('materialinquiry/showAccepted/'.$val->id)}}" class="btn btn-success" style="width: 130px">Show Accepted</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="pull-right">
                                            <?php echo $data->appends(
                                                [
                                                    'workzone'=>request('workzone') ,
                                                    'subzone'=>request('subzone') ,
                                                    'value'=>request('from_date'),
                                                    'to_date'=>request('to_date'),
                                                    'search'=>request('search')
                                                ])
                                            ?>
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
    <script src="{{ asset('js/MTInquiry/main.js') }}"></script>
@endsection
