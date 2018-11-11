@extends('layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li><a href="{{asset('home')}}">Home</a></li>
        <li ><a href="{{asset('gml/show')}}">Materials</a></li>
        <li class="active">Pending GML</li>
    </ul>

    <div class="page-title">
        <h2>Pending Material</h2>
    </div>

    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">List</h3>
                            </div>
                            <div class="panel-body panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-actions">
                                        <thead>
                                        <tr>
                                            <th>Added at</th>
                                            <th width="300">Item Name</th>
                                            <th>Description</th>
                                            <th width="380">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $k => $val)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($val->created_at,'Asia/Dubai')->diffForHumans() }}</td>
                                                <td>{{$val->title}}</td>
                                                <td>{{$val->description}}</td>
                                                @if($val->is_approved == 0)
                                                    @if($auth->can_approve == 1)
                                                        <td>
                                                            <a href="{{asset('gml/approveGmlPending/'.$val->id)}}" class="btn btn-success">Procurement Approval</a>
                                                            <button class="btn btn-danger" id="deleteUser" onclick="showDeleteModel({{$val->id}})">Procurement Reject</button>
                                                        </td>
                                                    @else
                                                        <td>Wait For Procurement Approve</td>
                                                    @endif
                                                @elseif($val->is_approved2 == 0)
                                                    @if($auth->can_approve2 == 1)
                                                        <td>
                                                            <a href="{{asset('gml/approve2GmlPending/'.$val->id)}}" class="btn btn-success">Technical Approval</a>
                                                            <button class="btn btn-danger" id="deleteUser" onclick="showDeleteModel({{$val->id}})">Technical Reject</button>
                                                        </td>
                                                    @else
                                                        <td>Wait For Technical Approve</td>
                                                    @endif

                                                @elseif($val->is_approved3 == 0)
                                                    @if($auth->can_approve3 == 1)
                                                        <td>
                                                            <a href="{{asset('gml/approve3GmlPending/'.$val->id)}}" class="btn btn-success">Project Manger Approval</a>
                                                            <button class="btn btn-danger" id="deleteUser" onclick="showDeleteModel({{$val->id}})">Project Manager Reject</button>
                                                        </td>
                                                    @else
                                                        <td>Wait For Project Manger Approve</td>
                                                    @endif
                                                @endif
                                            </tr>
                                        @endforeach
                                        @if(count($data)=="")
                                            <tr class="text-center">
                                                <td colspan="4" style="color: dimgray;">No Pending Requests Found !</td>
                                            </tr>
                                        @endif
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

    {{--Model for reason of rejection --}}
    <div class="modal" id="modal_reject" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <input type="hidden"  value="" name="gml_title">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModel()"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="defModalHead">Reason for Rejection</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label id="hidden" style="display: none">sdf</label>
                            <textarea class="form-control" rows="5" style="resize: none" name="reason" id="reason" autofocus></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a  class="btn btn-danger" id="reject" value="Reject" onclick="rejectGML()" >Reject </a>
                    <a class="btn btn-default" data-dismiss="modal" onclick="closeModel()">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{--MOdel ends here--}}
    <script src="{{ asset('js/Gml/main.js') }}"></script>
@endsection

