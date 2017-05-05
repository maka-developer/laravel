@extends('layout.admin')
@section('u_name',$user['name'])
@section('u_headimg',$user['headimg'])
{{ $user['nav_active'] = 'user' }}
{{ $user['active'] = 'user_list' }}

@section('menu')
    <ul class="nav nav-pills nav-stacked custom-nav">
        @foreach($user['menu'] as $key=>$value)
            <li class="<?php if(!empty($value['list'])){echo 'menu-list';}if(isset($user['active']) && $user['active'] == $key){echo ' active';}if(isset($user['nav_active']) && $user['nav_active']==$key){echo ' nav-active';} ?>"><a href="{{ url($value['url']) }}"><i class="{{ $value['fa'] }}"></i> <span>{{ $value['name'] }}</span></a>
                @if(!empty($value['list']))
                    <ul class="sub-menu-list">
                        @foreach($value['list'] as $k=>$v)
                            <li <?php if(isset($user['active']) && $user['active'] == $k){echo 'class="active"';} ?>><a href="{{ url($v['url']) }}"> {{ $v['name'] }}</a></li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
@stop

@section('content')
    <div class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        用户列表
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>用户名</th>
                                    <th>邮箱</th>
                                    <th>电话</th>
                                    <th>创建时间</th>
                                    @if($act == 'root')
                                        <th>操作</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $key=>$value)
                                    <tr class="gradeA">
                                        <td>{{ $value['id'] }}</td>
                                        <td>{{ $value['name'] }}</td>
                                        <td>{{ $value['email'] }}</td>
                                        <td>{{ $value['phone'] }}</td>
                                        <td>{{ $value['addtime'] }}</td>
                                        @if($act == 'root')
                                        <td><a href="{{ url('api/user/del') }}?id={{ $value['id'] }}" class="del">删除</a></td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@stop

