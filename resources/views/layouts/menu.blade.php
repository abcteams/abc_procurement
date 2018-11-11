<div class="page-sidebar">
    <ul class="x-navigation">
        <li class="x-navigation">
        <li class="xn-logo">
            <a href="index-2.html">ABC-GCC</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="{{asset('users/myProfile')}}" class="profile-mini">
                <img src="{{ asset('img/emptyProfilePic.jpg' )}}"/>
            </a>
            <div class="profile">
                <a href="{{asset('users/myProfile/'.auth()->user()->id)}}">
                    <div class="profile-image">
                        <img  src="{{ asset('img/emptyProfilePic.jpg' )}}" />
                    </div>
                </a>
                <div class="profile-data">
                    <div class="profile-data-name">{{auth()->user()->name}}</div>
                    <div class="profile-data-title">{{auth()->user()->email}}</div>
                </div>
            </div>
        </li>
        <li class="xn-title">Menu</li>
        <li class="">
            <a href="{{asset('home')}}">
                <span class="fa fa-home"></span>
                Home
            </a>
        </li>
        @if(isset($menu))
        @foreach($menu as $k =>$val)
            @if(count($val))
            <li class="xn-openable {{$val['Active']}}" title="{{$val['title']}}" >
                <a href="#">
                    <span class="{{$val['icon']}}" ></span>
                    <span class="xn-text">{{$val['text']}}</span>
                </a>
                @if(isset($val['details']) && count($val['details']))
                    <ul>
                        @foreach($val['details'] as $k2 => $val2)
                            <li class="{{$val2['Active']}}" >
                                <a href="{{$val2['link']}}"><span class="{{$val2['icon']}}"></span>{{$val2['text']}}</a>
                                @if(count($val2['details']))
                                    <ul>
                                        @foreach($val2['details'] as $k3 => $val3)
                                            <li class="{{$val3['Active']}}">
                                                <a href="{{$val3['link']}}">
                                                    <span class="{{$val3['icon']}}"></span>
                                                    {{$val3['text']}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
            @endif
        @endforeach
        @endif
    </ul>
</div>