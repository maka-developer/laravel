@extends('layout.admin')

@section('u_name',$user['name'])

@section('u_headimg',$user['headimg'])

@section('menu')
    <ul class="nav nav-pills nav-stacked custom-nav">
        @foreach($user['menu'] as $key=>$value)
            <li class="<?php if(!empty($value['list'])){echo 'menu-list';}if(isset($active) && $active == $key){echo ' active';}if(isset($nav_active) && $nav_active==$key){echo ' nav-active';} ?>"><a href="{{ url($value['url']) }}"><i class="{{ $value['fa'] }}"></i> <span>{{ $value['name'] }}</span></a>
                @if(!empty($value['list']))
                    <ul class="sub-menu-list">
                    @foreach($value['list'] as $k=>$v)
                        <li <?php if(isset($active) && $active == $k){echo 'class="active"';} ?>><a href="{{ url($v['url']) }}"> {{ $v['name'] }}</a></li>
                    @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
@stop