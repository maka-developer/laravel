@extends('layout.admin')

@section('u_name',$user['name'])

@section('u_headimg',$user['headimg'])

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
    <form name="form1" id="form1">
        <p>photo:<input type="file" name="photo" id="photo"></p>
        <p><input type="button" name="b1" value="submit" onclick="fsubmit()"></p>
    </form>
    <div id="result"></div>

    <script type="text/javascript">
        function fsubmit(){
            var data = new FormData($('#form1')[0]);
            $.ajax({
                url: '{{ url('api/uploadimg') }}?dir=exl',
                type: 'POST',
                data: data,
                processData: false,
                contentType: false
            }).done(function(ret){
                console.log(ret);
            });
            return false;
        }
    </script>
@stop