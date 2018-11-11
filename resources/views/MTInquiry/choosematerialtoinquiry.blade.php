@extends('layouts.master')
@section('content')
    <script type="text/javascript" >
        function readytoinquirylies(id) {
            window.location.href = "{{asset('materialinquiry/readytoinquirylist/'.request()->id)}}/"+id;
        }
    </script>
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="{{asset('workzone/showsub/'.request()->id)}}">Sub Work Zone</a></li> 
    <li class="active">Materials Ready to inquiry</li>
</ul>

<div class="page-title">
    <h2>Materials Ready to Inquiry</h2>
</div>
<!-- PAGE CONTENT WRAPPER -->
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Choose Material to Inquiry</h3>
                        </div>
                        <div class="panel-body panel-body-table">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-actions">
                                    <thead>
                                    <tr>
                                        <th width="100">Serial</th>
                                        <th width="250">GML</th>
                                        <th>Material</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $k => $val)
                                            <tr class="subMatItems">
                                                <td onclick="readytoinquirylies({{$val->id}})">{{$k+1}}</td>
                                                <td onclick="readytoinquirylies({{$val->id}})">{{$val->gml}}</td>
                                                <td onclick="readytoinquirylies({{$val->id}})">
                                                    {{$val->title}}
                                                    <span class="fa fa-chevron-circle-right pull-right" style="font-size: 40px;"></span>
                                                </td>
                                            </tr>
                                        @endforeach
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
@endsection
