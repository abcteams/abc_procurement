<style>
    .trow_1:hover td{
        background:#33414e !important;
        color:white;
        cursor:pointer;
    }
    .panel-default{
        background: none;
        border: 0px !important;
    }
    option{

        padding:5px 0;
    }
    .head1{background:none !important;padding-bottom:40px !important;}
</style>

@extends('layouts.master')

@section('content')

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
</ul>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-3">
            <div class="widget widget-primary widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-user"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">20</div>
                    <div class="widget-title">Registred users</div>
                    <div class="widget-subtitle">On our app</div>
                </div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget widget-success widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-globe"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">200</div>
                    <div class="widget-title">Total visitors</div>
                    <div class="widget-subtitle">that visited our app</div>
                </div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
        </div>
        <div class="col-md-3">

            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-warning widget-item-icon" >
                <div class="widget-item-left">
                    <span class="fa fa-phone"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">C.U</div>
                    <div class="widget-title">Contact Us</div>
                    <div class="widget-subtitle">see our information</div>
                </div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
            <!-- END WIDGET REGISTRED -->

        </div>
        <div class="col-md-3">
            <div class="widget widget-danger widget-padding-sm">
                <div class="widget-big-int plugin-clock">00:00</div>
                <div class="widget-subtitle plugin-date">Loading...</div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
                <div class="widget-buttons widget-c3">
                    <div class="col">
                        <a href="#"><span class="fa fa-clock-o"></span></a>
                    </div>
                    <div class="col">
                        <a href="#"><span class="fa fa-bell"></span></a>
                    </div>
                    <div class="col">
                        <a href="#"><span class="fa fa-calendar"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="widget widget-default widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-list-ul"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">G.M.L</div>
                    <div class="widget-title">General Material List</div>
                    <div class="widget-subtitle">see the materials</div>
                </div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget widget-default widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-sitemap"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">W.Z</div>
                    <div class="widget-title">Work Zone</div>
                    <div class="widget-subtitle">see the work zone</div>
                </div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget widget-default widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-pencil-square-o"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">M.I</div>
                    <div class="widget-title">Material Inquiry</div>
                    <div class="widget-subtitle">see the inquiry</div>
                </div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget widget-default widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-user"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">SCL</div>
                    <div class="widget-title">Registred users</div>
                    <div class="widget-subtitle">on your website</div>
                </div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="widget widget-default widget-item-icon">
            <div class="widget-item-left">
                <span class="fa fa-users"></span>
            </div>
            <div class="widget-data">
                <div class="widget-int num-count">S.R</div>
                <div class="widget-title">Subcontractor</div>
                <div class="widget-subtitle">see subcontractor requist</div>
            </div>
            <div class="widget-controls">
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="widget widget-default widget-item-icon">
            <div class="widget-item-left">
                <span class="fa fa-shopping-cart"></span>
            </div>
            <div class="widget-data">
                <div class="widget-int num-count">C</div>
                <div class="widget-title">Cart</div>
                <div class="widget-subtitle">see your cart</div>
            </div>
            <div class="widget-controls">
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="widget widget-default widget-item-icon">
            <div class="widget-item-left">
                <span class="fa fa-cogs"></span>
            </div>
            <div class="widget-data">
                <div class="widget-int num-count">S</div>
                <div class="widget-title">Settings</div>
                <div class="widget-subtitle">change the settings form here</div>
            </div>
            <div class="widget-controls">
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">

        <!-- START SALES & EVENTS BLOCK -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title-box">
                    <h3>Sales &amp; Event</h3>
                    <span>Event "Purchase Button"</span>
                </div>
                <ul class="panel-controls" style="margin-top: 2px;">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="panel-body padding-0">
                <div class="chart-holder" id="dashboard-line-1" style="height: 200px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="200" version="1.1" width="408" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.2</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="24.046875" y="164" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: sans-serif;" font-size="10px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.5">0</tspan></text><path fill="none" stroke="#e5e5e5" d="M36.546875,164H383" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="24.046875" y="129.25" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: sans-serif;" font-size="10px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.5">5</tspan></text><path fill="none" stroke="#e5e5e5" d="M36.546875,129.25H383" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="24.046875" y="94.5" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: sans-serif;" font-size="10px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.5">10</tspan></text><path fill="none" stroke="#e5e5e5" d="M36.546875,94.5H383" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="24.046875" y="59.75" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: sans-serif;" font-size="10px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.5">15</tspan></text><path fill="none" stroke="#e5e5e5" d="M36.546875,59.75H383" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="24.046875" y="25" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: sans-serif;" font-size="10px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.5">20</tspan></text><path fill="none" stroke="#e5e5e5" d="M36.546875,25H383" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="325.2578125" y="176.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: sans-serif;" font-size="10px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,5.5)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.5">2014-10-15</tspan></text><text x="209.7734375" y="176.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: sans-serif;" font-size="10px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,5.5)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.5">2014-10-13</tspan></text><text x="94.2890625" y="176.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: sans-serif;" font-size="10px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,5.5)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.5">2014-10-11</tspan></text><path fill="none" stroke="#33414e" d="M36.546875,136.2C50.982421875,132.725,79.853515625,127.51249999999999,94.2890625,122.3C108.724609375,117.0875,137.595703125,95.36875,152.03125,94.5C166.466796875,93.63125,195.337890625,114.48124999999999,209.7734375,115.35C224.208984375,116.21875,253.080078125,105.79374999999999,267.515625,101.44999999999999C281.951171875,97.10624999999999,310.822265625,90.15625,325.2578125,80.6C339.693359375,71.04374999999999,368.564453125,38.9,383,25" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#3fbae4" d="M36.546875,150.1C50.982421875,146.625,79.853515625,140.54375,94.2890625,136.2C108.724609375,131.85625,137.595703125,116.21875,152.03125,115.35C166.466796875,114.48124999999999,195.337890625,128.38125,209.7734375,129.25C224.208984375,130.11875,253.080078125,125.775,267.515625,122.3C281.951171875,118.82499999999999,310.822265625,111.87499999999999,325.2578125,101.44999999999999C339.693359375,91.02499999999999,368.564453125,54.537499999999994,383,38.89999999999999" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="36.546875" cy="136.2" r="4" fill="#33414e" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="94.2890625" cy="122.3" r="4" fill="#33414e" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="152.03125" cy="94.5" r="4" fill="#33414e" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="209.7734375" cy="115.35" r="4" fill="#33414e" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="267.515625" cy="101.44999999999999" r="4" fill="#33414e" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="325.2578125" cy="80.6" r="4" fill="#33414e" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="383" cy="25" r="4" fill="#33414e" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="36.546875" cy="150.1" r="4" fill="#3fbae4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="94.2890625" cy="136.2" r="4" fill="#3fbae4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="152.03125" cy="115.35" r="4" fill="#3fbae4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="209.7734375" cy="129.25" r="4" fill="#3fbae4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="267.515625" cy="122.3" r="4" fill="#3fbae4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="325.2578125" cy="101.44999999999999" r="4" fill="#3fbae4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="383" cy="38.89999999999999" r="4" fill="#3fbae4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 0px; top: 31px; display: none;"><div class="morris-hover-row-label">2014-10-10</div><div class="morris-hover-point" style="color: #3FBAE4">
                            Sales:
                            2
                        </div><div class="morris-hover-point" style="color: #33414E">
                            Event:
                            4
                        </div></div></div>
            </div>
        </div>
        <!-- END SALES & EVENTS BLOCK -->

    </div>
    <div class="col-md-4">

        <!-- START USERS ACTIVITY BLOCK -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title-box">
                    <h3>Users Activity</h3>
                    <span>Users vs returning</span>
                </div>
                <ul class="panel-controls" style="margin-top: 2px;">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="panel-body padding-0">
                <div class="chart-holder" id="dashboard-bar-1" style="height: 200px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="200" version="1.1" width="408" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative; left: -0.65625px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.2</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="29.609375" y="164" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: sans-serif;" font-size="10px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.5">0</tspan></text><path fill="none" stroke="#e5e5e5" d="M42.109375,164H383" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="29.609375" y="129.25" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: sans-serif;" font-size="10px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.5">25</tspan></text><path fill="none" stroke="#e5e5e5" d="M42.109375,129.25H383" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="29.609375" y="94.5" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: sans-serif;" font-size="10px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.5">50</tspan></text><path fill="none" stroke="#e5e5e5" d="M42.109375,94.5H383" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="29.609375" y="59.750000000000014" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: sans-serif;" font-size="10px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.500000000000014">75</tspan></text><path fill="none" stroke="#e5e5e5" d="M42.109375,59.750000000000014H383" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="29.609375" y="25" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: sans-serif;" font-size="10px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.5">100</tspan></text><path fill="none" stroke="#e5e5e5" d="M42.109375,25H383" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="358.65066964285717" y="176.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: sans-serif;" font-size="10px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,5.5)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.5">Oct 16</tspan></text><text x="261.2533482142857" y="176.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: sans-serif;" font-size="10px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,5.5)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.5">Oct 14</tspan></text><text x="163.85602678571428" y="176.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: sans-serif;" font-size="10px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,5.5)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.5">Oct 12</tspan></text><text x="66.45870535714286" y="176.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: sans-serif;" font-size="10px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,5.5)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="3.5">Oct 10</tspan></text><rect x="48.196707589285715" y="59.750000000000014" width="16.761997767857142" height="104.24999999999999" r="0" rx="0" ry="0" fill="#33414e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="67.95870535714286" y="115.35" width="16.761997767857142" height="48.650000000000006" r="0" rx="0" ry="0" fill="#3fbae4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="96.89536830357144" y="75.04" width="16.761997767857142" height="88.96" r="0" rx="0" ry="0" fill="#33414e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="116.65736607142858" y="127.86" width="16.761997767857142" height="36.14" r="0" rx="0" ry="0" fill="#3fbae4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="145.59402901785717" y="55.58000000000001" width="16.761997767857142" height="108.41999999999999" r="0" rx="0" ry="0" fill="#33414e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="165.3560267857143" y="109.79" width="16.761997767857142" height="54.209999999999994" r="0" rx="0" ry="0" fill="#3fbae4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="194.29268973214286" y="50.02000000000001" width="16.761997767857142" height="113.97999999999999" r="0" rx="0" ry="0" fill="#33414e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="214.0546875" y="116.74000000000001" width="16.761997767857142" height="47.25999999999999" r="0" rx="0" ry="0" fill="#3fbae4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="242.99135044642858" y="44.46000000000001" width="16.761997767857142" height="119.53999999999999" r="0" rx="0" ry="0" fill="#33414e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="262.7533482142857" y="109.79" width="16.761997767857142" height="54.209999999999994" r="0" rx="0" ry="0" fill="#3fbae4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="291.6900111607143" y="33.34" width="16.761997767857142" height="130.66" r="0" rx="0" ry="0" fill="#33414e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="311.45200892857144" y="108.4" width="16.761997767857142" height="55.599999999999994" r="0" rx="0" ry="0" fill="#3fbae4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="340.388671875" y="30.560000000000002" width="16.761997767857142" height="133.44" r="0" rx="0" ry="0" fill="#33414e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="360.15066964285717" y="107.01" width="16.761997767857142" height="56.989999999999995" r="0" rx="0" ry="0" fill="#3fbae4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect></svg><div class="morris-hover morris-default-style" style="left: 1.95871px; top: 61px; display: none;"><div class="morris-hover-row-label">Oct 10</div><div class="morris-hover-point" style="color: #33414E">
                            New Users:
                            75
                        </div><div class="morris-hover-point" style="color: #3FBAE4">
                            Returned:
                            35
                        </div></div></div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title-box">
                    <h3>Visitors</h3>
                    <span>Visitors (last month)</span>
                </div>
                <ul class="panel-controls" style="margin-top: 2px;">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="panel-body padding-0">
                <div class="chart-holder" id="dashboard-donut-1" style="height: 200px;"><svg height="200" version="1.1" width="408" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative; left: -0.3125px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.2</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#33414e" d="M204,160A60,60,0,1,0,148.82297794171797,76.43103233529607" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#33414e" stroke="#ffffff" d="M204,163A63,63,0,1,0,146.06412683880387,75.25258395206087L121.23446691257698,64.64654850294411A90,90,0,1,1,204,190Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#3fbae4" d="M148.82297794171797,76.43103233529607A60,60,0,0,0,169.79715422682824,149.2967072025772" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#3fbae4" stroke="#ffffff" d="M146.06412683880387,75.25258395206087A63,63,0,0,0,168.08701193816967,151.76154256270607L155.54596848800668,169.8370018703177A85,85,0,0,1,125.83255208410047,66.61062914166943Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#fea223" d="M169.79715422682824,149.2967072025772A60,60,0,0,0,203.98115044438848,159.9999970391187" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#fea223" stroke="#ffffff" d="M168.08701193816967,151.76154256270607A63,63,0,0,0,203.9802079666079,162.99999689107466L203.97329646288367,184.99999580541817A85,85,0,0,1,155.54596848800668,169.8370018703177Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="204" y="90" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: 800; font-stretch: normal; font-size: 15px; line-height: normal; font-family: Arial;" font-size="15px" font-weight="800" transform="matrix(1.3636,0,0,1.3636,-74.1761,-36.7273)" stroke-width="0.7333333333333334"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="6">Returned</tspan></text><text x="204" y="110" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 14px; line-height: normal; font-family: Arial;" font-size="14px" transform="matrix(1.25,0,0,1.25,-51.0215,-25.5)" stroke-width="0.8"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="5">2,513</tspan></text></svg></div>
            </div>
        </div>
        <!-- END VISITORS BLOCK -->

    </div>
</div>
@endsection
