@extends('layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Materials Inquiry </li>
        <li class="active">Replay to supplier decline</li>
    </ul>
    <div class="page-title">
        <h2>Replay to supplier decline</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div style="padding:10px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">List</h3>
                        </div>
                        <div class="panel-body panel-body-table">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-actions">
                                    <thead>
                                    <tr>
                                        <th width="20%">Subject</th>
                                        <th>Text</th>
                                        <th width="20%">Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($data) && count($data) > 0)
                                        @foreach($data as $k => $val)
                                            <tr>
                                                <td>{{$val->subject}}</td>
                                                <td>{{$val->body}}</td>
                                                <td>{{$val->date}}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3"> No Replies</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <form class="form-horizontal" method="POST" action="{{ url('materialinquiry/addDeclineReplay') }}"  enctype="multipart/form-data">
                             {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$id}}" >
                            <div class="panel-heading">
                                <h3 class="panel-title">Add Replay</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Email Subject</label>
                                            <div class="col-md-10">
                                                <div class="input-group" style="width: 100%">
                                                    <input type="text"  value="{{ old('subject') }}" class="form-control" name="subject" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name" class="col-md-2 control-label">Email Body</label>
                                            <div class="col-md-10">
                                                <div class="input-group"  style="width: 100%">
                                                    <textarea class="form-control" id="body" rows="7" name="description">{{ old('body') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="material_specs" class="col-md-2 control-label" style="line-height: 15px;">Attached file</label>
                                            <div class="col-md-10">
                                                <div class="input-group" style="width: 100%">
                                                    <input type="file" name="attachments"   />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br/>
                            <div class="panel-footer">
                                <input style="margin-left:10px;width:70px" type="submit" value="Send" class="btn btn-primary pull-right" />
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT -->
    </div>

    <script src="{{ asset('js/MTInquiry/main.js') }}"></script>
@endsection
