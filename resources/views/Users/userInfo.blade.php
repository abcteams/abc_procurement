@extends('layouts.master')

@section('content')
    <style>
        .personalInfo{font-size: 13px;font-weight: bold; margin-top: 6px;}
    </style>
    <ul class="breadcrumb">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Users</li>
            <li class="active">User Info</li>
        </ul>
    </ul>
    <div class="page-title" style="padding:10px 0px 0px 20px">
        <h2>
            <span class="fa fa-user"></span>
                {{$data['main'][0]->name}}
            <br />
            <span style="font-size: 12px;padding-left: 35px;"></span>
        </h2>
    </div>
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-5">
                <form action="#" class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @if($data['main'][0]->active_status == 1)
                                <h3><span class="fa fa-circle" style="color:#0dd20d;font-size: 16px;"></span>&nbsp;
                                <span>Active</span></h3>
                            @else
                                <h3><span class="fa fa-circle" style="color:#d64543;font-size: 16px;"></span>&nbsp;
                                <span>InActive</span></h3>
                            @endif
                            <div class="text-center" id="user_image">
                                <img src="{{asset('img/emptyProfilePic.jpg')}}" class="img-thumbnail"/>
                            </div>
                        </div>
                        <div class="panel-body form-group-separated">

                            <div class="form-group">
                                <div class="col-md-12 col-xs-12">
                                    <a href="#" class="btn btn-primary btn-block btn-rounded" data-toggle="modal" data-target="#modal_change_photo">Change Photo</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">#ID</label>
                                <div class="col-md-9 col-xs-7">
                                    <input type="text" value="{{$data['main'][0]->id}}" class="form-control" disabled/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">E-mail</label>
                                <div class="col-md-9 col-xs-7">
                                    <input type="text" value="{{$data['main'][0]->email}}" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 col-xs-12">
                                    <a href="#" class="btn btn-danger btn-block btn-rounded" data-toggle="modal" data-target="#modal_change_password"  onclick="reset_password('{{$data['main'][0]->id}}');">Reset password</a>
                                </div>
                            </div>
                            @if(Auth::user()->id == $data['main'][0]->id)
                            @else
                                <div class="form-group">
                                    <div class="col-md-12 col-xs-12">
                                        <a href="" class="btn btn-danger btn-block btn-rounded" data-toggle="modal" data-target="#modal_change_password" onclick="delete_user('{{$data['main'][0]->id}}');">Delete User</a>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </form>

            </div>
            <div class="col-md-8 col-sm-8 col-xs-7">

                <form action="#" class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3><span class="fa fa-pencil"></span> Profile</h3>
                        </div>
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Full Name</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class="personalInfo"> {{isset($data['main'][0]->name)?$data['main'][0]->name:''}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Age</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class="personalInfo"> {{isset($data['genral'][0]->age)?$data['genral'][0]->age:''}} Year</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Country</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class="personalInfo">{{isset($data['genral'][0]->nicename)?$data['genral'][0]->nicename:''}} </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Gender</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class="personalInfo">{{isset($data['genral'][0]->gender)?$data['genral'][0]->gender:''}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Material Status:</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class="personalInfo">{{isset($data['genral'][0]->material_status)?$data['genral'][0]->material_status:''}}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Address</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class="personalInfo">{{isset($data['genral'][0]->address)?$data['genral'][0]->address:''}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Phone Number</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class="personalInfo">{{isset($data['genral'][0]->phone_number)?$data['genral'][0]->phone_number:''}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Email</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class="personalInfo">{{isset($data['main'][0]->email)?$data['main'][0]->email:''}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-xs-5">
                                    <a href="{{asset('users/add/'.$data['main'][0]->id)}}" class="btn btn-danger btn-rounded pull-right">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-md-3 col-sm-4 col-xs-5">
            </div>
            <div class="col-md-8 col-sm-8 col-xs-7">

                <form action="#" class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3><span class="fa fa-pencil"></span> Work Info</h3>
                        </div>
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Postion</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class="personalInfo">{{isset($data['work'][0]->title) ? $data['work'][0]->title: 'No Position'}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Status</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class="personalInfo">{{$data['main'][0]->active_status == 1 ? 'Active' : 'InActive'}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-xs-5">
                                    <a href="{{asset('users/add/'.$data['main'][0]->id)}}" class="btn btn-danger btn-rounded pull-right">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div style="height: 100px;"></div>

    </div>
    <script src="{{ asset('js/User/main.js') }}"></script>
@endsection
