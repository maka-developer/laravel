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
    <style>
        .headimg{
            width: 200px;
            height: 200px;
            display: none;
        }
    </style>
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        信息设置
                    </header>
                    <div class="panel-body">
                        <div class="col-lg-6 col-lg-offset-3">
                            <form role="form">
                                <div class="form-group">
                                    <label>姓名</label>
                                    <input type="text" class="form-control name" placeholder="名称">
                                </div>
                                <div class="form-group">
                                    <a class="pic-click">上传头像</a>
                                    <img class="headimg" src="" alt="">
                                </div>
                                <div class="text-center ">
                                    <a class="btn btn-info btn-lg"> 提交 </a>
                                    <a class="btn btn-default btn-lg" target="_blank" href="https://www.baidu.com"> 取消 </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <input type="file" name="photo" id="photo" style="display: none;">
    <script src="{{ url('public/asset') }}/js/jquery-1.10.2.min.js"></script>
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
        $('.pic-click').click(function(){
            $('#photo').click();
        })
    </script>
@stop

@extends('layout.link')