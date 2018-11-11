@extends('layouts.master')
@section('content')
    <?php
    $allnoti    =   new \App\Notifications();
    ?>
    <ul class="breadcrumb">
        <li><a href="{{asset('home')}}">Home</a></li>
        <li class="active">Notifications</li>
    </ul>

    <div class="page-title">
        <h2>All Notifications</h2>
    </div>
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <b class="panel-title">All Notifications</b>
                                <div class="text-right">
                                    <form action="{{asset('notification/markAllAsRead')}}" method="POST">
                                        {!! csrf_field() !!}
                                        <button class="btn btn-success btn-sm" style="color: white;">Mark all as Read</button>
                                    </form>

                                </div>

                            </div>
                            <div class="panel-body panel-body-table">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-actions">
                                        <thead>
                                        <tr>
                                            <th class="listHeader">Added at</th>
                                            <th class="listHeader">Notification</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $k => $val)
                                                <tr class="subMatItems">
                                                    <td onclick="gotoLink('{{$val->link}}')" style="{{$val->is_read ==0 ? 'background:#fff2e1;':''}}"><span class="fa fa-clock-o" style="padding-right:10px;">
                                                        </span>{{ \Carbon\Carbon::parse($val->created_at,'Asia/Dubai')->diffForHumans() }}
                                                    </td>
                                                    <td onclick="gotoLink('{{$val->link}}')" style="{{$val->is_read ==0 ? 'background:#fff2e1;':''}}">{{$val->description}}</td>
                                                    <input type="hidden" id="notification_id" value="{{$val->id}}">
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="panel-footer">
                                        <div class="pull-right">{{ $data->links() }}</div>
                                    </div>        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/Notification/main.js') }}"></script>
@endsection
