@extends('layout.admin')
@section('u_name'){{ $user['name'] }}@stop
@section('u_headimg'){{ $user['headimg'] }}@stop
<?php $user['active'] = 'redis' ?>
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
                        Redis
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>Key</th>
                                    <th>Type</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $key=>$value)
                                    <tr class="gradeA">
                                        <td>{{ $value['key'] }}</td>
                                        <td>{{ $value['type'] }}</td>
                                        <td><a href="{{ url('api/delredis') }}?key={{ $value['key'] }}" class="del">删除</a></td>
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

