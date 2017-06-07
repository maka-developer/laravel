@extends('layout.admin')
@section('u_name',$user['name'])
@section('u_headimg',$user['headimg'])
{{ $user['nav_active'] = 'git' }}
{{ $user['active'] = 'git_list' }}
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
                        项目列表
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>项目名</th>
                                    <th>状态</th>
                                    <th>提交次数</th>
                                    <th>最近提交</th>
                                    <th>添加时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $key=>$value)
                                    <tr class="gradeA">
                                        @if($value['url'] != '')
                                            <td><a href="{{ $value['url'] }}">{{ $value['name'] }}</a></td>
                                        @else
                                            <td>{{ $value['name'] }}</td>
                                        @endif
                                        <th>状态</th>
                                        <th>提交次数</th>
                                        <th>最近提交</th>
                                        <td>{{ $value['addtime'] }}</td>
                                        <td></td>
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

